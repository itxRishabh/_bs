# _bs Theme Documentation

> **The Complete Guide to Building WordPress Themes with Bootstrap 5**

Welcome to _bs — a modern WordPress starter theme built for Bootstrap 5 development. This guide covers everything from installation to advanced customization.

---

## Table of Contents

1. [What is _bs?](#what-is-_bs)
2. [Who is This For?](#who-is-this-for)
3. [⚠️ You DON'T Need npm!](#️-important-you-dont-need-npm-to-use-this-theme)
4. [🟢 Simple Path (No npm)](#-simple-path-just-download-and-use-no-npm)
5. [🔵 Advanced Path (With npm)](#-advanced-path-with-npm-for-customization)
6. [Quick Start (npm users)](#quick-start-5-minutes)
7. [Detailed Setup Guide](#detailed-setup-guide)
8. [File Structure](#understanding-the-file-structure)
9. [Customizing Your Theme](#customizing-your-theme)
10. [Working with Templates](#working-with-templates)
11. [Adding WooCommerce](#adding-woocommerce)
12. [Build Commands](#build-commands-reference)
13. [Troubleshooting](#troubleshooting)
14. [FAQ](#faq)

---

## What is _bs?

**_bs** (Underscore Bootstrap) is a WordPress starter theme — a foundation for building custom WordPress themes. 

Think of it like a house blueprint:
- You don't build from scratch
- You start with a solid structure
- You customize to fit your needs

### Why use _bs instead of building from scratch?

| Starting from scratch | Using _bs |
|----------------------|-----------|
| Days of setup | Minutes to start |
| Figure out best practices | Best practices built-in |
| Write Bootstrap integration | Bootstrap ready to go |
| Debug WordPress quirks | Already solved |
| 🕐 Weeks | 🚀 Hours |

### What's included?

- ✅ **Bootstrap 5.3** — CSS framework with grid, components, utilities
- ✅ **Bootstrap Icons** — 1,800+ free icons
- ✅ **Vite build system** — Fast development with hot reload
- ✅ **SCSS architecture** — Organized, maintainable styles
- ✅ **Responsive navigation** — Mobile menu included
- ✅ **Block editor support** — Gutenberg-ready
- ✅ **WooCommerce ready** — Shop pages pre-styled
- ✅ **Accessibility** — WCAG compliant base

---

## Who is This For?

### 👶 Beginners
- Learning WordPress theme development
- Coming from HTML/CSS, new to WordPress
- Want to build client websites

### 👨‍💻 Intermediate
- Familiar with WordPress but new to modern tooling
- Want to use Bootstrap in WordPress properly
- Building themes for clients

### 🧙 Advanced
- Professional theme developers
- Need a solid, customizable starting point
- Building themes for sale or agencies

---

## ⚠️ IMPORTANT: You DON'T Need npm to Use This Theme!

**Don't be scared by the npm/build commands!** This section is CRUCIAL for beginners.

### The Truth About npm

Many beginners see `npm install` and `npm run build` and think:
- *"This is too complicated"*
- *"I don't know what npm is"*
- *"I just want to build a WordPress theme"*

**Here's the good news:** You can use this theme WITHOUT npm!

### Two Ways to Use _bs

| Path | Who it's for | npm needed? |
|------|--------------|-------------|
| **🟢 Simple Path** | Beginners, quick projects | ❌ No |
| **🔵 Advanced Path** | Those who want to customize SCSS | ✅ Yes |

---

## 🟢 Simple Path: Just Download and Use (No npm!)

**This is the easiest way.** Perfect if you:
- Are new to WordPress theme development
- Just want to start building
- Don't want to learn new tools right now
- Want to edit PHP and CSS files directly

### How it Works

The theme comes with **pre-compiled CSS and JS** in the `dist/` folder. This means:

```
✅ dist/css/style.css  ← Bootstrap + theme styles (READY TO USE)
✅ dist/js/main.js     ← JavaScript (READY TO USE)
✅ dist/fonts/         ← Icons (READY TO USE)
```

**You don't need to compile anything!**

### Step-by-Step: Simple Path

#### Step 1: Download the Theme
Download the _bs theme as a ZIP file.

#### Step 2: Extract and Rename
1. Extract the ZIP
2. Rename the folder to your theme name (e.g., `my-client-theme`)

#### Step 3: Upload to WordPress
**Option A: Via FTP/File Manager**
1. Upload the theme folder to `wp-content/themes/`

**Option B: Via WordPress Admin**
1. ZIP your renamed theme folder
2. Go to **Appearance → Themes → Add New → Upload Theme**
3. Upload the ZIP
4. Click **Install Now**

#### Step 4: Activate
1. Go to **Appearance → Themes**
2. Find your theme
3. Click **Activate**

#### Step 5: Start Building!
Now you can:
- Edit PHP files (`header.php`, `footer.php`, etc.)
- Add custom CSS in WordPress Customizer
- Create new page templates
- Add plugins

### Adding Custom CSS (Simple Path)

**Without touching any files:**
1. Go to **Appearance → Customize → Additional CSS**
2. Add your CSS:
```css
/* Change primary color */
:root {
    --bs-primary: #6f42c1;
}

/* Your custom styles */
.my-section {
    padding: 4rem 0;
}
```

### What You CAN Do (Simple Path)
- ✅ Edit all PHP template files
- ✅ Add custom CSS via Customizer
- ✅ Create new page templates
- ✅ Use all Bootstrap classes in your HTML
- ✅ Add widgets, menus, plugins
- ✅ Build complete websites

### What You CANNOT Do (Simple Path)
- ❌ Change Bootstrap's default colors (need npm for this)
- ❌ Use SCSS features (need npm for this)
- ❌ Use hot-reload development (need npm for this)

**But that's okay!** Most projects don't need these.

---

## 🔵 Advanced Path: With npm (For Customization)

**Use this path if you:**
- Want to customize Bootstrap colors/fonts at the source
- Like working with SCSS
- Want hot-reload during development
- Are building a theme for distribution

### What is npm?

**npm** (Node Package Manager) is a tool that:
- Downloads code libraries (like Bootstrap)
- Runs build scripts (compiles SCSS to CSS)
- Provides development tools

Think of it like the App Store for developer tools.

### Why Would I Use npm?

**Scenario 1: Change the primary color**

*Without npm:*
```css
/* Have to override Bootstrap's color everywhere */
.btn-primary { background-color: purple !important; }
.text-primary { color: purple !important; }
/* ...50 more overrides... */
```

*With npm:*
```scss
// Just change one variable, everything updates
$primary: purple;
```

**Scenario 2: Development workflow**

*Without npm:*
1. Edit file
2. Save
3. Switch to browser
4. Refresh page
5. See changes
6. Repeat...

*With npm:*
1. Edit file
2. Changes appear instantly in browser (hot reload!)

### When to Use Each Path

| Situation | Recommended Path |
|-----------|------------------|
| First WordPress theme | 🟢 Simple |
| Client project with tight deadline | 🟢 Simple |
| Learning the basics | 🟢 Simple |
| Want to deeply customize Bootstrap | 🔵 Advanced |
| Building a theme for sale | 🔵 Advanced |
| Working on a long-term project | 🔵 Advanced |

---

## 🟢 Simple Path: Quick Start

> **Use this if you just want to start building NOW.**

### What You Need
- WordPress installed (locally or on a server)
- A code editor (VS Code, Sublime, or even Notepad++)
- That's it!

### Steps (5 Minutes)

1. **Download** the _bs theme ZIP
2. **Extract** to `wp-content/themes/`
3. **Rename** the folder to your theme name
4. **Activate** in WordPress Admin
5. **Start editing** PHP files!

**No terminal. No commands. No build tools.**

---

## Quick Start (5 Minutes)

For those who just want to get going:

### Prerequisites
- WordPress installed locally (Local, MAMP, XAMPP, etc.)
- Node.js 18+ installed ([download here](https://nodejs.org/))
- Code editor (VS Code recommended)

### Steps

```bash
# 1. Navigate to your themes folder
cd /path/to/wordpress/wp-content/themes/

# 2. Clone or copy _bs theme
# (rename _bt to your theme name, e.g., "my-theme")

# 3. Go into the theme folder
cd my-theme

# 4. Install dependencies
npm install

# 5. Build the theme
npm run build

# 6. Activate in WordPress Admin → Appearance → Themes
```

**That's it!** Your theme is now active with Bootstrap styling.

---

## Detailed Setup Guide

### Step 1: Install Required Software

#### Node.js (Required)
Node.js runs the build tools that compile your SCSS and JavaScript.

**Check if installed:**
```bash
node --version
# Should show v18.x.x or higher
```

**If not installed:**
1. Go to [nodejs.org](https://nodejs.org/)
2. Download the LTS version
3. Run the installer
4. Restart your terminal

#### Local WordPress Environment (Required)
You need WordPress running on your computer.

**Recommended options:**
- [Local](https://localwp.com/) — Easiest, recommended for beginners
- [MAMP](https://www.mamp.info/) — Mac/Windows
- [XAMPP](https://www.apachefriends.org/) — Cross-platform
- [Docker](https://www.docker.com/) — For advanced users

#### Code Editor (Recommended)
- [VS Code](https://code.visualstudio.com/) — Free, most popular
- Extensions to install:
  - PHP Intelephense
  - SCSS IntelliSense
  - WordPress Snippets

### Step 2: Get the Theme Files

**Option A: Download ZIP**
1. Download the _bs theme ZIP
2. Extract to `wp-content/themes/`
3. Rename folder to your theme name

**Option B: Git Clone**
```bash
cd wp-content/themes/
git clone https://github.com/your-repo/_bs.git my-theme
```

### Step 3: Rename Your Theme

**Important:** Before starting development, rename the theme to your project's name.

#### Find & Replace (all files)

| Find | Replace with | Example |
|------|--------------|---------|
| `'_bs'` | `'your-theme'` | `'client-theme'` |
| `_bs_` | `your_theme_` | `client_theme_` |
| `Text Domain: _bs` | `Text Domain: your-theme` | `Text Domain: client-theme` |
| ` _bs` | ` Your_Theme` | ` Client_Theme` |
| `_bs-` | `your-theme-` | `client-theme-` |
| `_BS_` | `YOUR_THEME_` | `CLIENT_THEME_` |

**Files to update:**
- `style.css` — Theme name, author, description
- All PHP files — Function names
- `package.json` — Project name

### Step 4: Install Dependencies

```bash
cd your-theme-folder
npm install
```

This downloads:
- Bootstrap 5 source files
- Vite build tool
- SCSS compiler
- And other tools

**This only needs to be done once** per project.

### Step 5: Build the Theme

```bash
npm run build
```

This creates the `dist/` folder with:
- `dist/css/style.css` — Compiled CSS
- `dist/js/main.js` — Compiled JavaScript
- `dist/fonts/` — Bootstrap Icons

### Step 6: Activate the Theme

1. Go to WordPress Admin
2. Navigate to **Appearance → Themes**
3. Find your theme
4. Click **Activate**

🎉 **Done!** Your Bootstrap-powered WordPress theme is now live.

---

## Understanding the File Structure

```
your-theme/
│
├── 📁 dist/                    ← Compiled files (don't edit!)
│   ├── css/style.css
│   ├── js/main.js
│   └── fonts/
│
├── 📁 src/                     ← Source files (edit these!)
│   ├── 📁 scss/
│   │   ├── main.scss           ← Main entry point
│   │   ├── _variables.scss     ← Colors, fonts, sizes
│   │   ├── 📁 components/      ← Header, footer, nav, etc.
│   │   ├── 📁 templates/       ← Page-specific styles
│   │   ├── 📁 wordpress/       ← Block editor styles
│   │   └── 📁 plugins/         ← WooCommerce styles
│   └── 📁 js/
│       ├── main.js             ← Main JavaScript
│       └── navigation.js       ← Mobile menu
│
├── 📁 inc/                     ← PHP includes
│   ├── class-bs-navwalker.php  ← Bootstrap nav menu
│   ├── template-tags.php       ← Helper functions
│   ├── template-functions.php  ← Theme functions
│   ├── customizer.php          ← Customizer options
│   └── woocommerce.php         ← WooCommerce integration
│
├── 📁 template-parts/          ← Reusable template pieces
│   ├── content.php             ← Post/page content
│   ├── content-single.php      ← Single post content
│   └── content-search.php      ← Search result item
│
├── 📄 style.css                ← Theme header (metadata only)
├── 📄 functions.php            ← Theme setup
├── 📄 header.php               ← Site header
├── 📄 footer.php               ← Site footer
├── 📄 index.php                ← Main template
├── 📄 single.php               ← Single post
├── 📄 page.php                 ← Single page
├── 📄 archive.php              ← Category/tag archives
├── 📄 search.php               ← Search results
├── 📄 404.php                  ← Error page
├── 📄 sidebar.php              ← Widget area
│
├── 📄 theme.json               ← Block editor settings
├── 📄 package.json             ← npm dependencies
├── 📄 vite.config.js           ← Build configuration
└── 📄 README.md                ← Quick reference
```

### Key Concepts

#### Source (`src/`) vs Compiled (`dist/`)
- **src/** — Files you edit
- **dist/** — Auto-generated, don't edit
- Changes to `src/` → run build → updates `dist/`

#### PHP Template Hierarchy
WordPress loads templates in a specific order:

```
Specific ────────────────────────────────► Generic

single-post.php → single.php → singular.php → index.php
page-about.php → page.php → singular.php → index.php
category-news.php → category.php → archive.php → index.php
```

---

## Customizing Your Theme

### Changing Colors

**File:** `src/scss/_variables.scss`

```scss
// Find these lines and change the values:
$primary:       #0d6efd;  // Change to your brand color
$secondary:     #6c757d;
$success:       #198754;
$danger:        #dc3545;
$warning:       #ffc107;
$info:          #0dcaf0;
$dark:          #212529;
$light:         #f8f9fa;
```

**Example — Blue to Purple:**
```scss
$primary: #6f42c1;  // Purple
```

After changing, run:
```bash
npm run build
```

### Changing Fonts

**File:** `src/scss/_variables.scss`

```scss
// Find this line:
$font-family-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, ...;

// Change to Google Fonts:
$font-family-sans-serif: 'Inter', sans-serif;
```

**Add Google Font in `header.php`:**
```php
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Changing the Logo Size

**File:** `src/scss/components/_header.scss`

```scss
.custom-logo-link img {
    max-height: 50px;  // Change this value
    width: auto;
}
```

### Adding Custom CSS

**File:** `src/scss/main.scss`

Add at the bottom:
```scss
// Your custom styles
.my-custom-section {
    padding: 4rem 0;
    background-color: $light;
}
```

---

## Working with Templates

### Creating a Custom Page Template

**Step 1:** Create a new PHP file in the theme root

**File:** `template-full-width.php`

```php
<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main py-5">
    <div class="container-fluid px-4">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
```

**Step 2:** Use in WordPress
1. Edit a page
2. In the sidebar, find "Template"
3. Select "Full Width"
4. Publish

### Modifying the Header

**File:** `header.php`

The header uses Bootstrap's navbar component. Key areas:

```php
<!-- Logo area -->
<div class="site-branding">
    <?php the_custom_logo(); ?>
</div>

<!-- Navigation menu -->
<nav id="site-navigation" class="collapse navbar-collapse">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'navbar-nav ms-auto',
        'walker'         => new BS_Nav_Walker(),
    ));
    ?>
</nav>
```

### Modifying the Footer

**File:** `footer.php`

Footer has 3 widget areas in a Bootstrap grid:
- `footer-1`
- `footer-2`
- `footer-3`

Add widgets in **Appearance → Widgets**.

---

## Adding WooCommerce

### Installation

1. Install WooCommerce plugin
2. Run the setup wizard
3. **That's it!** — Theme automatically styles WooCommerce

### What Gets Styled Automatically

- ✅ Shop/archive pages
- ✅ Single product pages
- ✅ Cart page
- ✅ Checkout page
- ✅ My Account pages
- ✅ Product widgets
- ✅ Mini cart in header

### Adding Mini Cart to Header

**File:** `header.php`

Add before the closing `</nav>`:

```php
<?php if ( class_exists( 'WooCommerce' ) ) : ?>
    <?php _bs_woocommerce_header_cart(); ?>
<?php endif; ?>
```

### Customizing WooCommerce Styles

**File:** `src/scss/plugins/_woocommerce.scss`

```scss
// Example: Change product card style
.product-card {
    border-radius: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
```

---

## Build Commands Reference

| Command | Purpose | When to Use |
|---------|---------|-------------|
| `npm install` | Download dependencies | Once, at start |
| `npm run dev` | Start dev server with HMR | During active development |
| `npm run build` | Compile for production | Before deploying |
| `npm run watch` | Watch files, rebuild on change | Alternative to dev |

### Development Workflow

```bash
# Start working
npm run dev

# Make changes to src/ files
# Browser auto-refreshes

# When done, build for production
npm run build

# Upload to live site
```

---

## Troubleshooting

### "npm: command not found"
**Cause:** Node.js not installed
**Solution:** Install from [nodejs.org](https://nodejs.org/)

### Build fails with errors
**Solution:**
```bash
# Delete node_modules and reinstall
rm -rf node_modules
npm install
npm run build
```

### Styles not updating
**Cause:** Browser cache
**Solutions:**
1. Hard refresh: `Ctrl/Cmd + Shift + R`
2. Clear browser cache
3. Try incognito window

### Menu not showing Bootstrap dropdowns
**Cause:** Menu not assigned
**Solution:**
1. Go to **Appearance → Menus**
2. Create a menu
3. Assign to "Primary Menu" location
4. Create child items for dropdowns

### WooCommerce pages look unstyled
**Cause:** WooCommerce installed before theme activation
**Solution:**
1. Deactivate WooCommerce
2. Activate _bs theme
3. Reactivate WooCommerce

---

## FAQ

### Do I need to know PHP?
**Beginners:** Not much — most customization is CSS/SCSS
**Intermediate:** Basic PHP helps for template modifications
**Advanced:** Yes, for adding functionality

### Can I use this for client projects?
**Yes!** The GPL license allows commercial use. Just do the find/replace to rename the theme.

### How do I update Bootstrap version?
```bash
npm update bootstrap
npm run build
```

### Can I remove Bootstrap and use something else?
Yes, but that defeats the purpose. Consider using plain `_s` instead.

### How do I add JavaScript?
Edit `src/js/main.js`:
```javascript
document.addEventListener('DOMContentLoaded', () => {
    // Your code here
});
```

### Where do I add Google Analytics?
In `header.php` before `<?php wp_head(); ?>`:
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y"></script>
```

### How do I create a child theme?
For extensive customizations, create a child theme:

1. Create folder: `your-theme-child/`
2. Create `style.css`:
```css
/*
Theme Name: Your Theme Child
Template: your-theme
*/
```
3. Create `functions.php`:
```php
<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/dist/css/style.css');
});
```

---

## Getting Help

- **Bootstrap Docs:** [getbootstrap.com/docs](https://getbootstrap.com/docs/5.3/)
- **WordPress Theme Handbook:** [developer.wordpress.org/themes](https://developer.wordpress.org/themes/)
- **WooCommerce Docs:** [woocommerce.com/documentation](https://woocommerce.com/documentation/)

---

## Credits

- Based on [Underscores (_s)](https://underscores.me/) by Automattic
- Inspired by [_tw](https://underscoretw.com/)
- Built with [Bootstrap 5](https://getbootstrap.com/)
- Build system: [Vite](https://vitejs.dev/)

---

**Happy theming!** 🚀
