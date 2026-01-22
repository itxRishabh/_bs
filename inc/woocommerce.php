<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package _bs
 */

/**
 * WooCommerce setup function.
 */
function _bs_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 300,
			'single_image_width' => 600,
			'product_grid' => array(
				'default_rows' => 3,
				'min_rows' => 1,
				'default_columns' => 4,
				'min_columns' => 1,
				'max_columns' => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', '_bs_woocommerce_setup');

/**
 * Disable the default WooCommerce stylesheet.
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add Bootstrap classes to WooCommerce wrapper.
 */
function _bs_woocommerce_wrapper_before()
{
	?>
	<main id="primary" class="site-main py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-<?php echo (is_active_sidebar('sidebar-shop') && !is_product()) ? '9' : '12'; ?>">
					<?php
}
add_action('woocommerce_before_main_content', '_bs_woocommerce_wrapper_before');

function _bs_woocommerce_wrapper_after()
{
	?>
				</div>
				<?php if (is_active_sidebar('sidebar-shop') && !is_product()): ?>
					<div class="col-lg-3">
						<aside class="widget-area shop-sidebar">
							<?php dynamic_sidebar('sidebar-shop'); ?>
						</aside>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</main>
	<?php
}
add_action('woocommerce_after_main_content', '_bs_woocommerce_wrapper_after');

/**
 * Remove default WooCommerce sidebar.
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Register shop sidebar.
 */
function _bs_woocommerce_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Shop Sidebar', '_bs'),
			'id' => 'sidebar-shop',
			'description' => esc_html__('Sidebar for WooCommerce pages.', '_bs'),
			'before_widget' => '<div id="%1$s" class="widget card mb-3 %2$s"><div class="card-body">',
			'after_widget' => '</div></div>',
			'before_title' => '<h5 class="widget-title card-title">',
			'after_title' => '</h5>',
		)
	);
}
add_action('widgets_init', '_bs_woocommerce_widgets_init');

/**
 * Change number of products per row.
 */
function _bs_woocommerce_loop_columns()
{
	return 3;
}
add_filter('loop_shop_columns', '_bs_woocommerce_loop_columns');

/**
 * Change products per page.
 */
function _bs_woocommerce_products_per_page()
{
	return 12;
}
add_filter('loop_shop_per_page', '_bs_woocommerce_products_per_page');

/**
 * Add Bootstrap classes to product loop.
 */
function _bs_woocommerce_product_loop_start()
{
	echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
}
add_action('woocommerce_before_shop_loop', '_bs_woocommerce_product_loop_start', 40);

function _bs_woocommerce_product_loop_end()
{
	echo '</div>';
}
add_action('woocommerce_after_shop_loop', '_bs_woocommerce_product_loop_end', 5);

/**
 * Wrap each product in a column.
 */
function _bs_woocommerce_before_shop_loop_item()
{
	echo '<div class="col">';
}
add_action('woocommerce_before_shop_loop_item', '_bs_woocommerce_before_shop_loop_item', 5);

function _bs_woocommerce_after_shop_loop_item()
{
	echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', '_bs_woocommerce_after_shop_loop_item', 15);

/**
 * Product card wrapper.
 */
function _bs_woocommerce_before_shop_loop_item_title()
{
	echo '<div class="card h-100 product-card">';
	echo '<div class="card-img-top product-thumbnail">';
}
add_action('woocommerce_before_shop_loop_item_title', '_bs_woocommerce_before_shop_loop_item_title', 5);

function _bs_woocommerce_shop_loop_item_title()
{
	echo '</div><div class="card-body">';
}
add_action('woocommerce_before_shop_loop_item_title', '_bs_woocommerce_shop_loop_item_title', 15);

function _bs_woocommerce_after_shop_loop_item_title()
{
	echo '</div></div>';
}
add_action('woocommerce_after_shop_loop_item', '_bs_woocommerce_after_shop_loop_item_title', 10);

/**
 * Add to cart button classes.
 */
function _bs_woocommerce_loop_add_to_cart_args($args)
{
	$args['class'] = str_replace('button', 'btn btn-primary btn-sm', $args['class']);
	return $args;
}
add_filter('woocommerce_loop_add_to_cart_args', '_bs_woocommerce_loop_add_to_cart_args');

/**
 * Single product button classes.
 */
function _bs_woocommerce_single_add_to_cart_args($args)
{
	$args['class'] = 'btn btn-primary btn-lg single_add_to_cart_button';
	return $args;
}
add_filter('woocommerce_single_add_to_cart_args', '_bs_woocommerce_single_add_to_cart_args');

/**
 * Quantity input classes.
 */
function _bs_woocommerce_quantity_input_classes($classes)
{
	$classes[] = 'form-control';
	return $classes;
}
add_filter('woocommerce_quantity_input_classes', '_bs_woocommerce_quantity_input_classes');

/**
 * Cart table classes.
 */
function _bs_woocommerce_cart_table_classes()
{
	return 'table table-bordered shop_table cart';
}
add_filter('woocommerce_cart_table_class', '_bs_woocommerce_cart_table_classes');

/**
 * Form field classes.
 */
function _bs_woocommerce_form_field_args($args, $key, $value)
{
	if (in_array($args['type'], array('text', 'email', 'tel', 'password', 'number', 'url'), true)) {
		$args['input_class'][] = 'form-control';
	}
	if ('textarea' === $args['type']) {
		$args['input_class'][] = 'form-control';
	}
	if ('select' === $args['type']) {
		$args['input_class'][] = 'form-select';
	}
	if ('checkbox' === $args['type']) {
		$args['input_class'][] = 'form-check-input';
		$args['label_class'][] = 'form-check-label';
	}
	return $args;
}
add_filter('woocommerce_form_field_args', '_bs_woocommerce_form_field_args', 10, 3);

/**
 * Breadcrumb defaults.
 */
function _bs_woocommerce_breadcrumb_defaults($defaults)
{
	$defaults['delimiter'] = ' <span class="breadcrumb-separator mx-2">/</span> ';
	$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb mb-4" aria-label="Breadcrumb"><ol class="breadcrumb mb-0">';
	$defaults['wrap_after'] = '</ol></nav>';
	$defaults['before'] = '<li class="breadcrumb-item">';
	$defaults['after'] = '</li>';
	return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', '_bs_woocommerce_breadcrumb_defaults');

/**
 * Pagination args.
 */
function _bs_woocommerce_pagination_args($args)
{
	$args['prev_text'] = '<i class="bi bi-chevron-left"></i>';
	$args['next_text'] = '<i class="bi bi-chevron-right"></i>';
	return $args;
}
add_filter('woocommerce_pagination_args', '_bs_woocommerce_pagination_args');

/**
 * Review form args.
 */
function _bs_woocommerce_product_review_comment_form_args($args)
{
	$args['class_form'] = 'comment-form';
	$args['class_submit'] = 'btn btn-primary';
	return $args;
}
add_filter('woocommerce_product_review_comment_form_args', '_bs_woocommerce_product_review_comment_form_args');

/**
 * Sale badge.
 */
function _bs_woocommerce_sale_flash($html, $post, $product)
{
	return '<span class="badge bg-danger position-absolute top-0 start-0 m-2 onsale">' . esc_html__('Sale!', '_bs') . '</span>';
}
add_filter('woocommerce_sale_flash', '_bs_woocommerce_sale_flash', 10, 3);

/**
 * Mini cart in header.
 */
function _bs_woocommerce_header_cart()
{
	if (!class_exists('WooCommerce')) {
		return;
	}
	?>
	<div class="header-cart nav-item dropdown">
		<a class="nav-link dropdown-toggle position-relative" href="<?php echo esc_url(wc_get_cart_url()); ?>"
			id="headerCart" data-bs-toggle="dropdown" aria-expanded="false">
			<i class="bi bi-cart3"></i>
			<span class="cart-count badge bg-primary rounded-pill position-absolute top-0 start-100 translate-middle">
				<?php echo esc_html(WC()->cart->get_cart_contents_count()); ?>
			</span>
		</a>
		<div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;" aria-labelledby="headerCart">
			<h6 class="dropdown-header"><?php esc_html_e('Your Cart', '_bs'); ?></h6>
			<?php the_widget('WC_Widget_Cart', 'title='); ?>
		</div>
	</div>
	<?php
}

/**
 * Update cart count via AJAX.
 */
function _bs_woocommerce_add_to_cart_fragments($fragments)
{
	$fragments['.cart-count'] = '<span class="cart-count badge bg-primary rounded-pill position-absolute top-0 start-100 translate-middle">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', '_bs_woocommerce_add_to_cart_fragments');

/**
 * Related products args.
 */
function _bs_woocommerce_related_products_args($args)
{
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}
add_filter('woocommerce_output_related_products_args', '_bs_woocommerce_related_products_args');

/**
 * Checkout button class.
 */
function _bs_woocommerce_proceed_to_checkout()
{
	remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
	?>
	<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="checkout-button btn btn-primary btn-lg w-100">
		<?php esc_html_e('Proceed to checkout', '_bs'); ?>
	</a>
	<?php
}
add_action('woocommerce_proceed_to_checkout', '_bs_woocommerce_proceed_to_checkout', 20);

/**
 * Update cart button class.
 */
function _bs_woocommerce_cart_update_button($button)
{
	return str_replace('button', 'btn btn-outline-secondary', $button);
}
add_filter('woocommerce_cart_item_remove_link', '_bs_woocommerce_cart_update_button');

/**
 * Coupon form button.
 */
function _bs_woocommerce_coupon_button_class()
{
	return 'btn btn-outline-secondary';
}
add_filter('woocommerce_coupon_apply_button_class', '_bs_woocommerce_coupon_button_class');

/**
 * Order button class.
 */
function _bs_woocommerce_order_button_html($html)
{
	return str_replace('class="button', 'class="btn btn-success btn-lg w-100', $html);
}
add_filter('woocommerce_order_button_html', '_bs_woocommerce_order_button_html');

/**
 * My Account navigation classes.
 */
function _bs_woocommerce_account_menu_item_classes($classes, $endpoint)
{
	$classes[] = 'list-group-item';
	$classes[] = 'list-group-item-action';
	return $classes;
}
add_filter('woocommerce_account_menu_item_classes', '_bs_woocommerce_account_menu_item_classes', 10, 2);
