# Atlas Volt — PHP Business Website Case Study

## Overview
Atlas Volt is a fictional solar-energy and electrical-solutions company created as MAQTA Lab Project 02. The goal was to build a professional service-business website that looks credible on the front end while introducing real PHP concepts behind the interface.

## Challenge
Project 01 focused on a static café experience built with HTML, CSS and JavaScript. Project 02 needed to prove a different capability: reusable server-rendered pages, dynamic project content, server-side form validation and basic security practices without relying on a framework.

## Direction
The visual system uses a technical editorial language: charcoal, white and solar amber; strong geometric typography; large performance metrics; modular cards; clear grid structures; and engineering-oriented imagery. This deliberately avoids the warm luxury café aesthetic of the first MAQTA Lab project.

## Build
- PHP 8+ reusable includes for the shared header and footer
- PHP arrays as a lightweight content/data layer
- Dynamic project detail pages using `project.php?slug=...`
- Real HTTP 404 response for unknown project slugs
- Server-side quote-form validation
- CSRF token protection
- Honeypot spam protection
- Secure session-cookie settings
- Post/Redirect/Get flow after successful form submission
- Output escaping with `htmlspecialchars`
- Responsive full-screen mobile navigation
- JavaScript solar estimator connected to the quote form
- Accessibility improvements including skip links, ARIA state and associated error messages
- Per-page metadata plus Open Graph and Twitter Card tags
- Basic response security headers
- Custom favicon

## Result
The finished concept behaves like a small real-world PHP business site rather than a collection of duplicated static pages. Shared components are maintained in one place, project pages are data-driven, invalid dynamic URLs return a proper 404, and successful form submissions cannot be accidentally repeated by refreshing the browser.

The project remains intentionally fictional: contact information, energy figures and project metrics are demonstration content and must not be treated as engineering advice.

## Stack
PHP 8+, HTML5, CSS3 and Vanilla JavaScript.

## Portfolio credit
Created by [MAQTA STUDIO](https://maqtastudio.com).
