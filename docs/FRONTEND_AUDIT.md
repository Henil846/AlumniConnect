# Frontend Audit

## Current State
All original HTML, CSS, and JS files are currently sitting at the root directory of the project (`c:\Users\HENIL\OneDrive\Desktop\WT Project\Alumni-Connect-master`). 

There is currently NO `resources/views` directory, and NO files have been converted to PHP views yet.

## Plan for Cleanup
1. Create `resources/views/layouts/app.php` and `resources/views/partials/` for shared components (navbar, sidebar, footer).
2. Port each root-level HTML file into `resources/views/pages/{module}/`.
3. Extract logic to JS modules and CSS into `public/assets/`.
4. Delete the original root-level `.html`, `.css`, `.js` files, and `serve.py`.
