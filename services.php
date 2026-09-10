<?php
$pageTitle = 'Services — Atlas Volt';
$pageDescription = 'Explore Atlas Volt residential solar, commercial solar, electrical systems and EV charging services.';
$currentPage = 'services';
$services = require __DIR__ . '/data/services.php';
require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="inner-hero">
    <div class="shell inner-hero-grid">
      <div>
        <p class="eyebrow">Services</p>
        <h1 class="display">Power systems<br>with a plan.</h1>
      </div>
      <p class="lead">The service list is deliberately focused. Each category begins with assessment and ends with a system that can be understood, maintained and expanded.</p>
    </div>
  </section>

  <section class="section">
    <div class="shell services-grid">
      <?php foreach ($services as $service): ?>
        <article class="service-card">
          <span class="service-number"><?= e($service['number']) ?></span>
          <div>
            <h3><?= e($service['title']) ?></h3>
            <p><?= e($service['description']) ?></p>
            <ul>
              <?php foreach ($service['features'] as $feature): ?>
                <li><?= e($feature) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="section band-dark">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">Design principle</p>
        <h2 class="section-title">No generic system sizing.</h2>
      </div>
      <div class="rich-copy">
        <p>Two buildings with the same electricity bill can need very different solutions. One may consume power mainly during the day, another at night. One may have abundant roof area, another a limited service connection.</p>
        <p>That is why every Atlas Volt proposal starts with the operating pattern before equipment is selected. The goal is not to sell the largest possible system. The goal is to make the system match the site.</p>
        <p>For portfolio purposes, the technical values on this website are illustrative rather than engineering advice for a real installation.</p>
      </div>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell cta-panel">
      <h2>Not sure which service fits your site?</h2>
      <a class="btn btn-dark" href="quote.php">Describe your project ↗</a>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
