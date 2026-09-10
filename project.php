<?php
$projects = require __DIR__ . '/data/projects.php';
require_once __DIR__ . '/includes/functions.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
$project = find_project($projects, $slug);

if (!$project) {
    http_response_code(404);
    $pageTitle = 'Project not found — Atlas Volt';
    $pageDescription = 'The requested Atlas Volt project could not be found.';
    $currentPage = 'projects';
    require __DIR__ . '/includes/header.php';
    ?>
    <main id="main-content">
      <section class="inner-hero">
        <div class="shell">
          <p class="eyebrow">404</p>
          <h1 class="display">Project not found.</h1>
          <p class="lead">The case study you requested does not exist or the URL is incomplete.</p>
          <p style="margin-top:28px"><a class="btn btn-dark" href="projects.php">Back to projects</a></p>
        </div>
      </section>
    </main>
    <?php
    require __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = $project['title'] . ' — Atlas Volt Project';
$pageDescription = $project['summary'];
$currentPage = 'projects';
require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="project-detail-hero" style="background-image:url('<?= e($project['image']) ?>')">
    <div class="shell project-detail-content">
      <p class="eyebrow" style="color:rgba(255,255,255,.72)"><?= e($project['location']) ?> · <?= e($project['type']) ?></p>
      <h1><?= e($project['title']) ?></h1>
      <p><?= e($project['summary']) ?></p>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell project-metrics">
      <div class="project-metric"><span>System size</span><strong><?= e($project['capacity']) ?></strong></div>
      <div class="project-metric"><span>Estimated grid reduction</span><strong><?= e($project['saving']) ?></strong></div>
      <div class="project-metric"><span>Study year</span><strong><?= e($project['year']) ?></strong></div>
    </div>
  </section>

  <section class="section">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">01 · Challenge</p>
        <h2 class="section-title">Start with the constraint.</h2>
      </div>
      <div class="rich-copy">
        <p><?= e($project['challenge']) ?></p>
      </div>
    </div>
  </section>

  <section class="section band-dark">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">02 · Direction</p>
        <h2 class="section-title">Design around usage.</h2>
      </div>
      <div class="rich-copy">
        <p><?= e($project['solution']) ?></p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">03 · Result</p>
        <h2 class="section-title">A measurable target.</h2>
      </div>
      <div class="rich-copy">
        <p><?= e($project['result']) ?></p>
        <p><strong>Portfolio note:</strong> this project is fictional. The figures are illustrative and should not be used as engineering calculations for a real solar installation.</p>
      </div>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell cta-panel">
      <h2>Have a site with a different challenge?</h2>
      <a class="btn btn-dark" href="quote.php">Request a quote ↗</a>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
