# MAQTA Lab 02 — Atlas Volt

Atlas Volt is a fictional solar-energy and electrical-solutions company website built as a PHP learning and portfolio project by MAQTA STUDIO.

## Stack
- PHP 8+
- HTML5
- CSS3
- Vanilla JavaScript

## Core architecture
- Reusable PHP header and footer includes
- PHP arrays as a lightweight content/data layer
- Dynamic project pages using query-string slugs
- Custom 404 handling for invalid project slugs
- Responsive desktop and full-screen mobile navigation
- JavaScript solar estimator

## Backend / security concepts
- Server-side form validation
- Output escaping with `htmlspecialchars`
- CSRF token validation
- Honeypot spam protection
- Secure session-cookie flags where supported
- Input-length limits and server-side project-type whitelist
- Post/Redirect/Get after successful submission so browser refresh does not repeat the POST
- Basic response security headers

## Pages
- `index.php` — Home
- `services.php` — Services
- `projects.php` — Project archive
- `project.php?slug=...` — Dynamic project detail
- `about.php` — Company story
- `quote.php` — Quote request + estimator

## Run with XAMPP on Windows
1. Place the project folder inside `C:\xampp\htdocs\atlas-volt`.
2. Start Apache from XAMPP Control Panel.
3. Open `http://localhost/atlas-volt/`.

GitHub Pages is not used for this project because GitHub Pages does not execute PHP.

## QA
See [`TESTING.md`](TESTING.md) for the manual test checklist.

## Case study
See [`CASE-STUDY.md`](CASE-STUDY.md) for the portfolio-ready project summary.

## Important
Atlas Volt is a fictional company created for learning and portfolio use. Contact data, project metrics and energy estimates are sample content and are not engineering advice. The quote form does not send email or store submissions in a database.

## Portfolio credit
Created by [MAQTA STUDIO](https://maqtastudio.com).
