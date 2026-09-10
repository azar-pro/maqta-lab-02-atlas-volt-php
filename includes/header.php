<?php
require_once __DIR__ . '/functions.php';

$pageTitle = $pageTitle ?? 'Atlas Volt — Solar & Electrical Solutions';
$pageDescription = $pageDescription ?? 'Atlas Volt designs modern solar and electrical systems for homes and businesses in Morocco.';
$pageImage = $pageImage ?? 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1200&h=630&q=84';
$currentPage = $currentPage ?? '';

if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('X-Frame-Options: SAMEORIGIN');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta name="theme-color" content="#151718">
    <meta name="author" content="MAQTA Studio">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Atlas Volt">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:image" content="<?= e($pageImage) ?>">
    <meta property="og:image:alt" content="Atlas Volt solar and electrical solutions concept">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($pageImage) ?>">

    <title><?= e($pageTitle) ?></title>
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://images.unsplash.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile-menu.css">
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header" id="siteHeader">
    <div class="shell header-inner">
        <a class="brand" href="index.php" aria-label="Atlas Volt home">
            <img src="assets/logo.svg" alt="Atlas Volt" width="184" height="44">
        </a>

        <button class="menu-toggle" id="menuToggle" type="button" aria-expanded="false" aria-controls="mainNav" aria-label="Open navigation">
            <span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav" aria-label="Main navigation">
            <a class="<?= active_nav('home', $currentPage) ?>" href="index.php">Home</a>
            <a class="<?= active_nav('services', $currentPage) ?>" href="services.php">Services</a>
            <a class="<?= active_nav('projects', $currentPage) ?>" href="projects.php">Projects</a>
            <a class="<?= active_nav('about', $currentPage) ?>" href="about.php">Company</a>
            <a class="nav-cta<?= active_nav('quote', $currentPage) ?>" href="quote.php">Request a quote <span>↗</span></a>
        </nav>
    </div>
</header>
