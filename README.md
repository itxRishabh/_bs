# _bs - WordPress Starter Theme for Bootstrap 5

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.4-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)
![License](https://img.shields.io/badge/license-GPL--2.0+-blue.svg)

A modern WordPress starter theme optimized for Bootstrap 5 development. Fork of the legendary `_s` (Underscores) theme with first-class Bootstrap support.

## ✨ Features

- **Bootstrap 5.3** - Full Bootstrap integration with SCSS customization
- **Vite Build System** - Modern, fast development with HMR
- **Bootstrap Nav Walker** - WordPress menus with Bootstrap dropdowns
- **Block Editor Support** - theme.json with Bootstrap color palette
- **Bootstrap Icons** - 1,800+ free icons included
- **Responsive Templates** - All templates use Bootstrap grid
- **WooCommerce Ready** - Bootstrap-styled shop templates
- **Accessibility** - WCAG compliant with Bootstrap utilities

## 🚀 Quick Start

### Requirements

- [Node.js](https://nodejs.org/) (v18+)
- [Composer](https://getcomposer.org/) (for PHP linting)
- WordPress 6.0+

### Installation

1. Clone or download this theme to your `wp-content/themes/` directory
2. Rename the folder to your theme name
3. Run find & replace (see below)
4. Install dependencies and build:

```bash
npm install
npm run build
```

5. Activate the theme in WordPress

### Development

```bash
# Start development server with hot reload
npm run dev

# Watch for changes
npm run watch

# Production build
npm run build

# Lint SCSS
npm run lint:scss

# Lint JavaScript
npm run lint:js
```

## 🔧 Find & Replace

After downloading, run a global find & replace on the following:

| Search | Replace | Description |
|--------|---------|-------------|
| `'_bs'` | `'your-theme'` | Text domain |
| `_bs_` | `your_theme_` | Function prefixes |
| `Text Domain: _bs` | `Text Domain: your-theme` | style.css |
| ` _bs` | ` Your_Theme` | DocBlocks |
| `_bs-` | `your-theme-` | Prefixed handles |
| `_BS_` | `YOUR_THEME_` | Constants |

## 📁 Project Structure

```
_bs/
├── dist/                    # Compiled assets (git-ignored)
│   ├── css/main.css
│   └── js/main.js
├── src/
│   ├── scss/
│   │   ├── main.scss        # Entry point
│   │   ├── _variables.scss  # Bootstrap overrides
│   │   ├── components/      # Theme components
│   │   ├── templates/       # Page-specific styles
│   │   └── wordpress/       # Block editor styles
│   └── js/
│       ├── main.js          # Theme JavaScript
│       └── navigation.js    # Mobile menu
├── inc/
│   ├── class-bs-navwalker.php  # Bootstrap nav walker
│   ├── template-tags.php
│   └── ...
├── template-parts/
├── vite.config.js
├── package.json
├── theme.json              # Block editor config
├── style.css               # Theme header
└── functions.php
```

## 🎨 Customization

### Bootstrap Variables

Override Bootstrap defaults in `src/scss/_variables.scss`:

```scss
// Colors
$primary: #0d6efd;
$secondary: #6c757d;

// Typography
$font-family-sans-serif: 'Inter', sans-serif;

// Spacing
$spacer: 1rem;

// Components
$border-radius: 0.5rem;
```

### Adding Custom Fonts

1. Import fonts in `src/scss/main.scss`
2. Update `$font-family-sans-serif` in variables

### Block Editor Colors

Edit `theme.json` to match your color palette with the block editor.

## 📖 Documentation

- [Bootstrap 5 Docs](https://getbootstrap.com/docs/5.3/)
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [Vite Documentation](https://vitejs.dev/)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

GPL-2.0-or-later. See [LICENSE](LICENSE) for details.

Based on [Underscores](https://underscores.me/), (C) 2012-2020 Automattic, Inc.
