<?php
$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

if (!headers_sent()) {
    header('Cache-Control: no-store, max-age=0');
}

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Request a Quote — Atlas Volt';
$pageDescription = 'Try the Atlas Volt solar estimator and submit a server-validated fictional project enquiry.';
$currentPage = 'quote';

$projectTypes = [
    'Residential Solar',
    'Commercial Solar',
    'Electrical Systems',
    'EV Charging',
    'Solar + EV Charging'
];

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$values = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'project_type' => '',
    'city' => '',
    'message' => '',
    'estimated_system' => ''
];
$errors = [];
$success = false;

if (isset($_GET['sent']) && !empty($_SESSION['quote_success'])) {
    $success = true;
    unset($_SESSION['quote_success']);
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    foreach ($values as $key => $unused) {
        $values[$key] = trim((string) ($_POST[$key] ?? ''));
    }

    $honeypot = trim((string) ($_POST['company_website'] ?? ''));
    $submittedToken = (string) ($_POST['csrf_token'] ?? '');

    if ($honeypot !== '') {
        $errors['form'] = 'The submission could not be processed.';
    } elseif ($submittedToken === '' || !hash_equals($_SESSION['csrf_token'], $submittedToken)) {
        $errors['form'] = 'Your session expired. Refresh the page and try again.';
    }

    $nameLength = text_length($values['name']);
    if ($nameLength < 2 || $nameLength > 80) {
        $errors['name'] = 'Enter a name between 2 and 80 characters.';
    }

    if (text_length($values['email']) > 160 || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address.';
    }

    if (!preg_match('/^[+0-9 ()-]{8,20}$/', $values['phone'])) {
        $errors['phone'] = 'Enter a valid phone number.';
    }

    if (!in_array($values['project_type'], $projectTypes, true)) {
        $errors['project_type'] = 'Choose a project type.';
    }

    $cityLength = text_length($values['city']);
    if ($cityLength < 2 || $cityLength > 100) {
        $errors['city'] = 'Enter a city between 2 and 100 characters.';
    }

    $messageLength = text_length($values['message']);
    if ($messageLength < 20 || $messageLength > 2000) {
        $errors['message'] = 'Enter project details between 20 and 2000 characters.';
    }

    if (!$errors) {
        $_SESSION['quote_success'] = true;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        session_regenerate_id(true);
        header('Location: quote.php?sent=1', true, 303);
        exit;
    }
}

require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="inner-hero">
    <div class="shell inner-hero-grid">
      <div>
        <p class="eyebrow">Quote + estimator</p>
        <h1 class="display">Start with<br>what you use.</h1>
      </div>
      <p class="lead">Move the energy-bill slider to see a rough system-size exercise, then use the form to test how PHP validates a submission on the server.</p>
    </div>
  </section>

  <section class="section">
    <div class="shell quote-layout">
      <aside class="estimator" aria-labelledby="estimatorTitle">
        <h2 id="estimatorTitle">Solar estimator</h2>
        <p>A simplified learning tool—not a real engineering quotation.</p>

        <div class="estimator-field">
          <label for="monthlyBill">Approximate monthly electricity bill</label>
          <input id="monthlyBill" type="range" min="300" max="6000" step="100" value="1500">
          <strong id="billOutput">1,500 DH / month</strong>
        </div>

        <div class="estimate-result">
          <small>Indicative system size</small>
          <strong id="systemOutput">8.2 kWp</strong>
        </div>
        <div class="estimate-result">
          <small>Possible annual grid offset</small>
          <strong id="savingOutput">Up to 63%</strong>
        </div>
        <p style="margin-top:28px;color:rgba(255,255,255,.46);font-size:11px;line-height:1.65">This deliberately uses a simple formula so we can learn JavaScript interaction. Real solar sizing requires site, tariff, production and load-profile analysis.</p>
      </aside>

      <form class="quote-form" method="post" action="quote.php" novalidate>
        <h2>Tell us about the site</h2>
        <p>The form is processed by PHP. No email or database is connected in this learning version.</p>

        <?php if ($success): ?>
          <div class="form-alert success" role="status" tabindex="-1">Success — PHP accepted the form after validating the fields and CSRF token. Refreshing this page will not resubmit the form, and no data was sent anywhere.</div>
        <?php elseif (isset($errors['form'])): ?>
          <div class="form-alert error" role="alert"><?= e($errors['form']) ?></div>
        <?php endif; ?>

        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
        <input type="hidden" id="estimatedSystem" name="estimated_system" value="<?= e($values['estimated_system']) ?>">

        <div class="honeypot" aria-hidden="true">
          <label for="companyWebsite">Leave this field empty</label>
          <input id="companyWebsite" name="company_website" type="text" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-grid">
          <div class="field">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" autocomplete="name" maxlength="80" value="<?= e($values['name']) ?>" aria-describedby="nameError" aria-invalid="<?= isset($errors['name']) ? 'true' : 'false' ?>" required>
            <p class="field-error" id="nameError"><?= e($errors['name'] ?? '') ?></p>
          </div>

          <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" autocomplete="email" maxlength="160" value="<?= e($values['email']) ?>" aria-describedby="emailError" aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>" required>
            <p class="field-error" id="emailError"><?= e($errors['email'] ?? '') ?></p>
          </div>

          <div class="field">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" maxlength="20" value="<?= e($values['phone']) ?>" placeholder="+212..." aria-describedby="phoneError" aria-invalid="<?= isset($errors['phone']) ? 'true' : 'false' ?>" required>
            <p class="field-error" id="phoneError"><?= e($errors['phone'] ?? '') ?></p>
          </div>

          <div class="field">
            <label for="city">Project city</label>
            <input id="city" name="city" type="text" autocomplete="address-level2" maxlength="100" value="<?= e($values['city']) ?>" placeholder="Fès" aria-describedby="cityError" aria-invalid="<?= isset($errors['city']) ? 'true' : 'false' ?>" required>
            <p class="field-error" id="cityError"><?= e($errors['city'] ?? '') ?></p>
          </div>

          <div class="field full">
            <label for="projectType">Project type</label>
            <select id="projectType" name="project_type" aria-describedby="projectTypeError" aria-invalid="<?= isset($errors['project_type']) ? 'true' : 'false' ?>" required>
              <option value="">Choose a service</option>
              <?php foreach ($projectTypes as $type): ?>
                <option value="<?= e($type) ?>" <?= $values['project_type'] === $type ? 'selected' : '' ?>><?= e($type) ?></option>
              <?php endforeach; ?>
            </select>
            <p class="field-error" id="projectTypeError"><?= e($errors['project_type'] ?? '') ?></p>
          </div>

          <div class="field full">
            <label for="message">Project details</label>
            <textarea id="message" name="message" minlength="20" maxlength="2000" placeholder="Tell us about the property, current energy use and what you want to achieve." aria-describedby="messageError" aria-invalid="<?= isset($errors['message']) ? 'true' : 'false' ?>" required><?= e($values['message']) ?></textarea>
            <p class="field-error" id="messageError"><?= e($errors['message'] ?? '') ?></p>
          </div>
        </div>

        <button class="btn btn-amber" type="submit">Validate with PHP ↗</button>
      </form>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
