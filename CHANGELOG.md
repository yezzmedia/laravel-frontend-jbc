# Changelog

All notable changes to `yezzmedia/laravel-frontend-jbc` will be documented in this file.

The format is based on Keep a Changelog and this package follows Semantic Versioning.

## [Unreleased]

## [0.1.0] - 2026-07-17

### Added

- Dedicated pages: Vita, Rating, Proofreading, Legal, Consent, Wishlist
- Dark/Light mode toggle with CSS variables and localStorage
- Language switcher (DE/EN) with locale persistence via session
- Consent preferences page themed with frontend-jbc design
- Wishlist: `WishlistBook` model, Amazon HTML importer, `import:wishlist` Artisan command, public and management pages
- Inquiries management page with legit/spam tabs, mark-as-read, delete, and detail view
- Proofreading contact form with honeypot spam protection, rate limiting, and `StoreSubmissionAction`
- Booklist redesign with stats, search, and grouped display
- Legal pages: privacy policy and imprint in German
- Addon-based URL blocking and page redirect enforcement via `ProjectAddon`
- Google Analytics integration with consent-aware loading script
- Team card component with photo and social links
- Footer and social-links Blade components

