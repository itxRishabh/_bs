# _bs - WordPress Starter Theme for Bootstrap 5

A modern WordPress starter theme built for Bootstrap 5 development. Based on `_s` (Underscores) with complete Bootstrap integration.

**Created by:** [Rishabh](https://rishabhdev.site/)

---

## What is this?

_bs is my personal WordPress starter theme that I use as a foundation for building custom WordPress themes. Instead of starting from scratch every time, I start with _bs which already has Bootstrap 5 properly integrated.

## Features

- **Bootstrap 5.3** — Full integration with SCSS customization
- **Vite Build System** — Fast development with hot reload
- **Bootstrap Nav Walker** — WordPress menus with dropdowns
- **Block Editor Support** — theme.json for Gutenberg
- **Bootstrap Icons** — 1,800+ icons included
- **WooCommerce Ready** — Shop pages pre-styled
- **Responsive** — Mobile-first templates

---

## How to Use

### Simple Way (No npm needed)

1. Download this theme
2. Upload to `wp-content/themes/`
3. Activate in WordPress
4. Start building!

### With Build Tools (For SCSS customization)

```bash
npm install
npm run build
```

**Development:**
```bash
npm run dev    # Start dev server
npm run watch  # Watch for changes
npm run build  # Production build
```

---

## Project Structure

```
_bs/
├── dist/               # Compiled CSS/JS (auto-generated)
├── src/
│   ├── scss/           # SCSS source files
│   └── js/             # JavaScript source
├── inc/                # PHP includes
├── template-parts/     # Reusable template pieces
├── assets/css/         # custom.css for overrides
├── vite.config.js
├── theme.json          # Block editor config
└── functions.php
```

---

## Customization

### Change Colors
Edit `src/scss/_variables.scss`:
```scss
$primary: #your-color;
```

### Add Custom CSS
Edit `assets/css/custom.css` — no build needed!

### Full Documentation
See [DOCS.md](DOCS.md) for complete guide.

---

## Tech Stack

- WordPress 6.x
- Bootstrap 5.3
- Vite
- SCSS

---

## Credits

Based on [Underscores (_s)](https://underscores.me/) by Automattic.
