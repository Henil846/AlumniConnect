<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? 'Alumni Connect' ?></title>
  <link rel="stylesheet" href="/assets/css/styles.css" />
  <link rel="stylesheet" href="/assets/css/auth.css" />
</head>
<body class="auth-page">

  <?= $content ?? '' ?>

  <!-- Toast -->
  <div class="toast" id="toast" role="alert" aria-live="polite">
    <div class="toast-icon">
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span id="toastMsg"></span>
  </div>

  <script src="/assets/js/auth.js"></script>
  <?php if (isset($extraScript)): ?>
    <script src="<?= $extraScript ?>"></script>
  <?php endif; ?>

</body>
</html>
