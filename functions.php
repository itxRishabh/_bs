<?php
/**
 * _bs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _bs
 */

if (!defined('_BS_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_BS_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function _bs_setup()
{
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain('_bs', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Register navigation menus.
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary Menu', '_bs'),
			'footer' => esc_html__('Footer Menu', '_bs'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'_bs_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);

	// Add support for full and wide align images.
	add_theme_support('align-wide');

	// Add support for responsive embedded content.
	add_theme_support('responsive-embeds');

	// Add support for block styles.
	add_theme_support('wp-block-styles');

	// Add support for editor styles.
	add_theme_support('editor-styles');

	// Add editor stylesheet.
	add_editor_style('dist/css/editor-style.css');
}
add_action('after_setup_theme', '_bs_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _bs_content_width()
{
	$GLOBALS['content_width'] = apply_filters('_bs_content_width', 720);
}
add_action('after_setup_theme', '_bs_content_width', 0);

/**
 * Register widget area.
 */
function _bs_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', '_bs'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', '_bs'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 1', '_bs'),
			'id' => 'footer-1',
			'description' => esc_html__('First footer widget area.', '_bs'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 2', '_bs'),
			'id' => 'footer-2',
			'description' => esc_html__('Second footer widget area.', '_bs'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer 3', '_bs'),
			'id' => 'footer-3',
			'description' => esc_html__('Third footer widget area.', '_bs'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action('widgets_init', '_bs_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function _bs_scripts()
{
	// Main theme styles (compiled from SCSS).
	wp_enqueue_style('_bs-style', get_template_directory_uri() . '/dist/css/main.css', array(), _BS_VERSION);
	wp_style_add_data('_bs-style', 'rtl', 'replace');

	// Bootstrap Icons.
	wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/dist/css/bootstrap-icons.css', array(), '1.11.3');

	// Custom CSS (for user customizations - loads last to override everything).
	wp_enqueue_style('_bs-custom', get_template_directory_uri() . '/assets/css/custom.css', array('_bs-style'), _BS_VERSION);

	// Theme JavaScript (with Bootstrap bundled).
	wp_enqueue_script('_bs-scripts', get_template_directory_uri() . '/dist/js/main.js', array(), _BS_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', '_bs_scripts');

/**
 * Load Bootstrap Nav Walker.
 */
require get_template_directory() . '/inc/class-bs-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Add Bootstrap classes to comment form fields.
 */
function _bs_comment_form_fields($fields)
{
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$html_req = ($req ? " required='required'" : '');

	$fields['author'] = sprintf(
		'<div class="comment-form-author mb-3"><label for="author" class="form-label">%s%s</label><input id="author" name="author" type="text" class="form-control" value="%s" maxlength="245"%s /></div>',
		esc_html__('Name', '_bs'),
		($req ? ' <span class="required">*</span>' : ''),
		esc_attr($commenter['comment_author']),
		$html_req
	);

	$fields['email'] = sprintf(
		'<div class="comment-form-email mb-3"><label for="email" class="form-label">%s%s</label><input id="email" name="email" type="email" class="form-control" value="%s" maxlength="100" aria-describedby="email-notes"%s /></div>',
		esc_html__('Email', '_bs'),
		($req ? ' <span class="required">*</span>' : ''),
		esc_attr($commenter['comment_author_email']),
		$html_req
	);

	$fields['url'] = sprintf(
		'<div class="comment-form-url mb-3"><label for="url" class="form-label">%s</label><input id="url" name="url" type="url" class="form-control" value="%s" maxlength="200" /></div>',
		esc_html__('Website', '_bs'),
		esc_attr($commenter['comment_author_url'])
	);

	return $fields;
}
add_filter('comment_form_default_fields', '_bs_comment_form_fields');

/**
 * Add Bootstrap class to comment textarea.
 */
function _bs_comment_form_defaults($defaults)
{
	$defaults['comment_field'] = sprintf(
		'<div class="comment-form-comment mb-3"><label for="comment" class="form-label">%s</label><textarea id="comment" name="comment" class="form-control" rows="5" required="required"></textarea></div>',
		esc_html__('Comment', '_bs')
	);

	$defaults['submit_button'] = '<button type="submit" name="%1$s" id="%2$s" class="btn btn-primary %3$s">%4$s</button>';
	$defaults['class_submit'] = 'submit';

	return $defaults;
}
add_filter('comment_form_defaults', '_bs_comment_form_defaults');

/**
 * Add Bootstrap classes to search form.
 */
function _bs_search_form($form)
{
	$form = '<form role="search" method="get" class="search-form d-flex gap-2" action="' . esc_url(home_url('/')) . '">
		<label class="visually-hidden" for="s">' . esc_html__('Search for:', '_bs') . '</label>
		<input type="search" id="s" class="search-field form-control" placeholder="' . esc_attr__('Search...', '_bs') . '" value="' . get_search_query() . '" name="s" />
		<button type="submit" class="search-submit btn btn-primary"><i class="bi bi-search"></i><span class="visually-hidden">' . esc_html__('Search', '_bs') . '</span></button>
	</form>';

	return $form;
}
add_filter('get_search_form', '_bs_search_form');
