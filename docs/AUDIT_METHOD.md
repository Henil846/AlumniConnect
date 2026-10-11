# Alumni Connect — Audit Methodology & Verification Standards

**Document Purpose:** Defines the strict criteria for what constitutes a "passing" versus "defective" element in the Alumni Connect automated audit engine (`tools/audit_inventory.php`).

---

## 1. What Counts as "Passing" by Element Type

### A. Links (`<a>`)
A link counts as **PASS** if and only if all of the following conditions are met:
1. **Valid Non-Placeholder Target:** The `href` is not `#`, `""`, `javascript:void(0)`, `javascript:;`, or a dummy fragment.
2. **Reachable HTTP Status:** Sending a GET request to the target URI returns **HTTP 200 OK** or **HTTP 302 Found** (redirecting to a legitimate authenticated or landing route, not a redirect loop).
3. **No 404 / 500 Responses:** The target route is registered in `routes/web.php` and does not return HTTP 404 (Not Found) or 500 (Internal Server Error).
4. **Clean Body Payload (Zero PHP Warnings/Notices):** The rendered body must contain zero occurrences of:
   - `Fatal error` / `Parse error`
   - `Warning:` / `Notice:` / `Deprecated:`
   - `Undefined variable` / `Undefined array key` / `Undefined index`
5. **Non-Empty Content Body:** The destination view must contain real rendered markup and not an empty viewport or blank container.

### B. Forms (`<form>`)
A form counts as **PASS** if and only if:
1. **Valid Action Target:** The `action` attribute resolves to a route registered in `routes/web.php` matching the form's HTTP method (`GET` or `POST`).
2. **CSRF Protection on Mutations:** For all `POST` forms, a hidden input with `name="csrf_token"` must be present inside the form or validated via cookie/session.
3. **Target Handler Existence:** The controller and action handling the form submission exist in the codebase.

### C. Buttons (`<button>`)
A button counts as **PASS** if and only if:
1. **Form Submission:** It has `type="submit"` (or default submit behavior) and is nested inside a valid `<form>` with a valid target action; OR
2. **Active Click Handler:** It has an explicit, non-empty `onclick` attribute pointing to a functional JavaScript handler, navigation call (`window.location.href`), or modal trigger; OR
3. **Data Action Binding:** It has a defined `data-action` or `data-bs-toggle` attribute wired to active DOM behavior.
4. **Not Inert:** A button with no handler, or an inert dummy button, is marked as a **Defect**.

### D. Inline Fetch & XHR Endpoints (`fetch()`, `XMLHttpRequest`)
A client-side API call counts as **PASS** if and only if:
1. **Registered Route:** The requested URL matches an active route in `routes/web.php`.
2. **Method Match:** The HTTP verb matches the route definition.
3. **Active Controller Response:** The endpoint returns valid JSON (`{"success": true, ...}`) rather than HTML 404 or uncaught exceptions.

### E. Dynamic Content & Hardcoded Metrics
A page's content counts as **PASS** if:
1. **Zero Hardcoded Dummy Statistics:** No hardcoded numbers or currency strings (such as `12,450`, `$98,240`, `85%`, `3.9/4.0`, or placeholder personas `Marcus Vance`, `Elena Rostova`) exist in view templates.
2. **Database Sourced:** All counts, lists, names, avatars, and metrics are computed dynamically from SQLite queries via the controller.
3. **Mutation Sensitivity:** Modifying a database record alters the rendered output accordingly.

---

## 2. Self-Test Engine (`php tools/audit_inventory.php --selftest`)

The audit script includes an automated self-test harness that injects 7 distinct known defect classes:
1. Injected dead link (`href="/test-nonexistent-dead-link-404"`) -> Must trigger `HTTP 404` defect.
2. Injected placeholder link (`href="#"`) -> Must trigger `Placeholder / Dead link` defect.
3. Injected inert button (`<button type="button">Inert</button>`) -> Must trigger `Inert button` defect.
4. Injected form targeting missing route -> Must trigger `Action route not in web.php` defect.
5. Injected POST form missing CSRF token -> Must trigger `Missing CSRF input` defect.
6. Injected hardcoded placeholder metric -> Must trigger `Hardcoded Placeholder` defect.
7. Injected link returning PHP notice or empty content -> Must trigger `PHP error or empty body` defect.

If any injected defect is missed, the self-test terminates with exit code `1`.
