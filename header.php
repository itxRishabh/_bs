<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _bs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site d-flex flex-column min-vh-100">
		<a class="skip-link" href="#primary"><?php esc_html_e('Skip to content', '_bs'); ?></a>

		<header id="masthead" class="site-header navbar navbar-expand-lg navbar-light bg-light sticky-top">
			<div class="container">
				<!-- Site Branding -->
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()):
						?>
						<h1 class="site-title mb-0"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
								rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
					else:
						?>
						<p class="site-title mb-0"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
								rel="home"><?php bloginfo('name'); ?></a></p>
						<?php
					endif;
					$_bs_description = get_bloginfo('description', 'display');
					if ($_bs_description || is_customize_preview()):
						?>
						<p class="site-description visually-hidden">
							<?php echo $_bs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<!-- Mobile Toggle Button -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-menu"
					aria-controls="primary-menu" aria-expanded="false"
					aria-label="<?php esc_attr_e('Toggle navigation', '_bs'); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Primary Navigation -->
				<nav id="site-navigation" class="main-navigation collapse navbar-collapse">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
							'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
							'container' => false,
							'depth' => 2,
							'walker' => new BS_Nav_Walker(),
							'fallback_cb' => 'BS_Nav_Walker::fallback',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .container -->
		</header><!-- #masthead -->