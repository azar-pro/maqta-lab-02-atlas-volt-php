<?php
$pageTitle = 'Atlas Volt — Solar & Electrical Solutions';
$pageDescription = 'Atlas Volt designs modern solar, electrical and EV charging systems for homes and businesses in Morocco.';
$currentPage = 'home';
$services = require __DIR__ . '/data/services.php';
$projects = require __DIR__ . '/data/projects.php';
require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="hero">
    <div class="shell hero-grid">
      <div class="hero-copy">
        <p class="eyebrow">Solar + Electrical · Morocco</p>
        <h1 class="display">Energy built<br>for the real world.</h1>
        <p>Atlas Volt designs solar and electrical systems around how a space actually consumes power—so the solution is clear, efficient and ready to grow.</p>
        <div class="hero-actions">
          <a class="btn btn-dark" href="quote.php">Estimate your system <span>↗</span></a>
          <a class="btn btn-light" href="projects.php">View projects</a>
        </div>
      </div>

      <div class="hero-visual" aria-label="Solar panels on a modern property">
        <div class="hero-photo"></div>
        <div class="energy-card">
          <div class="sun-dot">↗</div>
          <span class="metric">68%</span>
          <small>Estimated annual grid reduction on our Riad Residence concept.</small>
        </div>
      </div>
    </div>

    <div class="shell stat-strip" aria-label="Atlas Volt company metrics">
      <div class="stat"><strong>4</strong><span>Core energy services</span></div>
      <div class="stat"><strong>24.8</strong><span>kWp largest concept</span></div>
      <div class="stat"><strong>3</strong><span>Project studies</span></div>
      <div class="stat"><strong>1</strong><span>Integrated approach</span></div>
    </div>
  </section>

  <section class="section">
    <div class="shell">
      <div class="section-head">
        <div>
          <p class="eyebrow">What we design</p>
          <h2 class="section-title">One energy partner.<br>Four core systems.</h2>
        </div>
        <p>From a single home to a growing commercial site, the same principle applies: measure first, design second, install with clarity.</p>
      </div>

      <div class="services-grid">
        <?php foreach ($services as $service): ?>
          <article class="service-card">
            <span class="service-number"><?= e($service['number']) ?></span>
            <div>
              <h3><?= e($service['title']) ?></h3>
              <p><?= e($service['short']) ?></p>
              <ul>
                <?php foreach ($service['features'] as $feature): ?>
                  <li><?= e($feature) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section band-dark">
    <div class="shell">
      <p class="eyebrow">How we work</p>
      <h2 class="section-title">Engineering clarity<br>from first question to final plan.</h2>
      <div class="process-grid">
        <article class="process-step"><span>01</span><h3>Measure</h3><p>We start with bills, loads, roof area, electrical capacity and real operating habits.</p></article>
        <article class="process-step"><span>02</span><h3>Model</h3><p>We translate that information into a practical system size and realistic performance target.</p></article>
        <article class="process-step"><span>03</span><h3>Design</h3><p>Equipment, protection, layout and expansion paths are documented before installation begins.</p></article>
        <article class="process-step"><span>04</span><h3>Deliver</h3><p>The finished system should be understandable, maintainable and easy to monitor.</p></article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell">
      <div class="section-head">
        <div>
          <p class="eyebrow">Selected studies</p>
          <h2 class="section-title">Projects shaped<br>around the load.</h2>
        </div>
        <p>Each case study starts with a different constraint: visual sensitivity, industrial demand or EV charging capacity.</p>
      </div>

      <div class="projects-grid">
        <?php foreach (array_slice($projects, 0, 3) as $project): ?>
          <article class="project-card">
            <div class="project-image" style="background-image:url('<?= e($project['image']) ?>')"></div>
            <div class="project-body">
              <div class="project-meta"><span><?= e($project['location']) ?></span><span><?= e($project['capacity']) ?></span></div>
              <h3><?= e($project['title']) ?></h3>
              <p><?= e($project['summary']) ?></p>
              <a class="project-link" href="project.php?slug=<?= urlencode($project['slug']) ?>">Open case study ↗</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell cta-panel">
      <h2>Start with your monthly energy bill.</h2>
      <a class="btn btn-dark" href="quote.php">Try the estimator ↗</a>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
