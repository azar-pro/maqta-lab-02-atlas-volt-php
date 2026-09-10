# Atlas Volt — Manual QA Checklist

Use this checklist after downloading the latest repository version into XAMPP.

## Navigation
- Desktop navigation opens every page.
- Mobile menu covers the full viewport and keeps text readable.
- Escape closes the mobile menu.
- Resizing back to desktop resets the menu state.

## Dynamic projects
- Every project card opens its matching `project.php?slug=...` page.
- Project title, image, metrics and text change according to the slug.
- An unknown slug returns the custom Project not found screen with HTTP 404.

## Solar estimator
- Moving the electricity-bill slider updates the bill amount.
- Indicative kWp updates live.
- Estimated grid offset updates live.
- The hidden estimate field updates with the same values.

## Quote form
- Empty or invalid fields show server-side validation errors.
- Entered values remain populated after a failed submission.
- Invalid project types are rejected server-side.
- Too-short and overly long input is rejected.
- A valid submission redirects to `quote.php?sent=1` and shows the success message.
- Refreshing after success does not resubmit the POST request.
- No enquiry data is emailed or stored in a database in this learning version.

## Responsive / visual
- Test approximately 390 px, 768 px, 1024 px and desktop widths.
- Check the quote form, estimator, project cards and footer at every size.
- Confirm the MAQTA STUDIO footer credit opens `maqtastudio.com` in a new tab.

## PHP syntax
Run from the project folder when PHP is available:

```bash
php -l index.php
php -l services.php
php -l projects.php
php -l project.php
php -l about.php
php -l quote.php
php -l includes/header.php
php -l includes/footer.php
php -l includes/functions.php
php -l data/services.php
php -l data/projects.php
```
