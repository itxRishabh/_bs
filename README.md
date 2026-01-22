# _bs — Bootstrap 5 WordPress Starter Theme

[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/gpl-2.0)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)](https://getbootstrap.com/)
[![WordPress](https://img.shields.io/badge/WordPress-6.x-blue.svg)](https://wordpress.org/)

A modern WordPress starter theme with first-class Bootstrap 5 integration. Based on [Underscores (_s)](https://underscores.me/) by Automattic.

---

## ✨ Features

- **Bootstrap 5.3** — Full framework with SCSS customization
- **Vite Build System** — Lightning-fast development with HMR
- **Bootstrap Nav Walker** — WordPress menus with Bootstrap dropdowns
- **Block Editor Support** — theme.json for Gutenberg compatibility
- **Bootstrap Icons** — 1,800+ icons included
- **WooCommerce Ready** — Shop pages pre-styled with Bootstrap
- **Responsive** — Mobile-first design throughout
- **Accessibility** — WCAG-compliant markup

---

## 🚀 Quick Start

### Option 1: Simple (No build tools)

Perfect for beginners or quick projects:

1. [Download the latest release](https://github.com/itxRishabh/_bs/releases)
2. Upload to `wp-content/themes/`
3. Activate in WordPress → Appearance → Themes
4. Start building!

> 💡 The compiled CSS/JS is included — no npm required!

### Option 2: With Build Tools

For full SCSS customization:

```bash
# Clone the repo
git clone https://github.com/itxRishabh/_bs.git your-theme-name

# Install dependencies
cd your-theme-name
npm install

# Build for production
npm run build
```

**Development commands:**
```bash
npm run dev    # Start dev server with HMR
npm run watch  # Watch for changes
npm run build  # Production build
```

---

## 📁 Project Structure

```
_bs/
├── dist/               # Compiled CSS/JS (auto-generated)
├── src/
│   ├── scss/           # SCSS source files
│   │   ├── _variables.scss    # Bootstrap overrides
│   │   ├── components/        # Theme components
│   │   ├── wordpress/         # WP-specific styles
│   │   └── plugins/           # WooCommerce styles
│   └── js/             # JavaScript source
├── inc/                # PHP includes
│   ├── class-bs-navwalker.php # Bootstrap nav walker
│   └── woocommerce.php        # WooCommerce integration
├── template-parts/     # Reusable template pieces
├── assets/css/         # custom.css for quick overrides
├── theme.json          # Block editor config
└── functions.php
```

---

## 🎨 Customization

### Change Colors

Edit `src/scss/_variables.scss`:
```scss
$primary: #0d6efd;
$secondary: #6c757d;
$success: #198754;
// ... customize any Bootstrap variable
```

Then run `npm run build`.

### Quick CSS Overrides

Edit `assets/css/custom.css` — no build needed!

```css
/* Your custom styles here */
.site-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
```

### Full Documentation

📖 **[Read the full documentation →](DOCS.md)**

---

## 🛒 WooCommerce Support

_bs includes complete WooCommerce integration:

- ✅ Product grids with Bootstrap cards
- ✅ Styled cart and checkout
- ✅ My Account pages
- ✅ Product galleries
- ✅ Sale badges and pricing

No additional setup required — just install WooCommerce!

---

## 🤝 Contributing

Contributions are welcome! Please:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

See our [Code of Conduct](CODE_OF_CONDUCT.md) for community guidelines.

---

## 📄 License

This project is licensed under the GPL v2 or later — see the [LICENSE](LICENSE) file for details.

---

## 🙏 Credits

- Based on [Underscores (_s)](https://underscores.me/) by Automattic
- [Bootstrap](https://getbootstrap.com/) by the Bootstrap team
- [Bootstrap Icons](https://icons.getbootstrap.com/)

---

**Built with ❤️ by [Rishabh](https://rishabhdev.site/)**
