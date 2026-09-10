<?php
$pageTitle = 'Company — Atlas Volt';
$pageDescription = 'Learn about the fictional Atlas Volt approach to practical solar and electrical system design in Morocco.';
$currentPage = 'about';
require __DIR__ . '/includes/header.php';
?>

<main id="main-content">
  <section class="inner-hero">
    <div class="shell inner-hero-grid">
      <div>
        <p class="eyebrow">Company</p>
        <h1 class="display">Technical work.<br>Clear communication.</h1>
      </div>
      <p class="lead">Atlas Volt is a fictional energy company concept built around one idea: good engineering should be understandable to the client who pays for it and lives with it.</p>
    </div>
  </section>

  <section class="section">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">01 · Why Atlas Volt</p>
        <h2 class="section-title">Designed to reduce uncertainty.</h2>
      </div>
      <div class="rich-copy">
        <p>Energy projects can quickly become a wall of equipment names, technical ratings and optimistic savings claims. Atlas Volt was imagined as the opposite: a technical company that explains the reasoning before the hardware.</p>
        <p>The fictional team combines solar design, electrical planning and EV charging so that connected systems are considered together instead of being added one by one without a wider plan.</p>
      </div>
    </div>
  </section>

  <section class="section band-dark">
    <div class="shell">
      <p class="eyebrow">02 · Principles</p>
      <h2 class="section-title">Three rules behind<br>every proposal.</h2>
      <div class="process-grid" style="grid-template-columns:repeat(3,1fr)">
        <article class="process-step"><span>01</span><h3>Evidence first</h3><p>Bills, load profiles and site constraints matter more than generic package sizes.</p></article>
        <article class="process-step"><span>02</span><h3>Explain the trade-offs</h3><p>Clients should understand why one option costs more, saves more or leaves more room to expand.</p></article>
        <article class="process-step"><span>03</span><h3>Build for maintenance</h3><p>A clean system is not only visually tidy; it is easier to diagnose, document and service later.</p></article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell content-grid">
      <div class="sticky-label">
        <p class="eyebrow">03 · Portfolio context</p>
        <h2 class="section-title">A PHP learning project.</h2>
      </div>
      <div class="rich-copy">
        <p>This website was created as MAQTA Lab Project 02 to demonstrate a different development approach from a static HTML/CSS/JavaScript website.</p>
        <p>Reusable header and footer components are rendered with PHP includes, project and service content comes from PHP arrays, individual case studies are generated dynamically from a URL slug, and the quote form performs server-side validation.</p>
      </div>
    </div>
  </section>

  <section class="section-sm">
    <div class="shell cta-panel">
      <h2>See the system logic in action.</h2>
      <a class="btn btn-dark" href="quote.php">Open the estimator ↗</a>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
