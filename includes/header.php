<?php
require_once __DIR__ . '/functions.php';

$pageTitle = $pageTitle ?? 'Atlas Volt — Solar & Electrical Solutions';
$pageDescription = $pageDescription ?? 'Atlas Volt designs modern solar and electrical systems for homes and businesses in Morocco.';
$currentPage = $currentPage ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="theme-color" content="#151718">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
