<?php
$pageTitle = 'Projects — Atlas Volt';
$pageDescription = 'Explore fictional Atlas Volt solar and electrical project case studies across Morocco.';
$currentPage = 'projects';
$projects = require __DIR__ . '/data/projects.php';
require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="inner-hero">
    <div class="shell inner-hero-grid">
      <div>
        <p class="eyebrow">Projects</p>
        <h1 class="display">Different sites.<br>Different answers.</h1>
      </div>
      <p class="lead">Three fictional case studies demonstrate how the same design process changes when the building, load profile and commercial goal change.</p>
    </div>
  </section>

  <section class="section">
    <div class="shell projects-grid">
      <?php foreach ($projects as $project): ?>
        <article class="project-card">
          <div class="project-image" style="background-image:url('<?= e($project['image']) ?>')"></div>
          <div class="project-body">
            <div class="project-meta">
              <span><?= e($project['location']) ?></span>
              <span><?= e($project['year']) ?></span>
            </div>
            <h3><?= e($project['title']) ?></h3>
            <p><?= e($project['summary']) ?></p>
            <div class="project-meta" style="margin:22px 0 18px">
              <span><?= e($project['type']) ?></span>
              <span><?= e($project['capacity']) ?></span>
            </div>
            <a class="project-link" href="project.php?slug=<?= urlencode($project['slug']) ?>">View full case study ↗</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell cta-panel">
      <h2>Your site will have its own constraints.</h2>
      <a class="btn btn-dark" href="quote.php">Start an estimate ↗</a>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
