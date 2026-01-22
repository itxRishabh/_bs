<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-4 pb-4 border-bottom'); ?>>
	<?php _bs_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if (is_singular()):
			the_title('<h1 class="entry-title">', '</h1>');
		else:
			the_title('<h2 class="entry-title h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()):
			?>
			<div class="entry-meta">
				<?php
				_bs_posted_on();
				_bs_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if (is_singular()):
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="visually-hidden"> "%s"</span>', '_bs'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', '_bs'),
					'after' => '</div>',
				)
			);
		else:
			the_excerpt();
			?>
			<a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
				<?php esc_html_e('Read More', '_bs'); ?>
				<i class="bi bi-arrow-right ms-1"></i>
			</a>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer mt-3">
		<?php _bs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->