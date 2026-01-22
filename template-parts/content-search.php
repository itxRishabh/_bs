<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-3'); ?>>
	<div class="card-body">
		<header class="entry-header">
			<?php the_title(sprintf('<h2 class="entry-title h5"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

			<?php if ('post' === get_post_type()): ?>
				<div class="entry-meta small text-muted mb-2">
					<?php
					_bs_posted_on();
					_bs_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary text-muted">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
				<?php esc_html_e('Read More', '_bs'); ?>
			</a>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->