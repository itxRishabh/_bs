<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _bs
 */

?>

<footer id="colophon" class="site-footer mt-auto">
	<?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')): ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php if (is_active_sidebar('footer-1')): ?>
						<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
							<?php dynamic_sidebar('footer-1'); ?>
						</div>
					<?php endif; ?>

					<?php if (is_active_sidebar('footer-2')): ?>
						<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
							<?php dynamic_sidebar('footer-2'); ?>
						</div>
					<?php endif; ?>

					<?php if (is_active_sidebar('footer-3')): ?>
						<div class="col-lg-4 col-md-12">
							<?php dynamic_sidebar('footer-3'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="site-info py-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 text-center text-md-start">
					<p class="mb-0">
						<?php
						printf(
							/* translators: %1$s: Theme name, %2$s: Theme author link */
							esc_html__('&copy; %1$s %2$s. All rights reserved.', '_bs'),
							date('Y'),
							get_bloginfo('name')
						);
						?>
					</p>
				</div>
				<div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
					<?php
					if (has_nav_menu('footer')) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_class' => 'footer-menu nav justify-content-center justify-content-md-end',
								'container' => false,
								'depth' => 1,
								'link_before' => '<span class="nav-link px-2">',
								'link_after' => '</span>',
							)
						);
					}
					?>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="<?php esc_attr_e('Back to top', '_bs'); ?>">
	<i class="bi bi-arrow-up"></i>
</button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>