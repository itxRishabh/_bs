<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bs
 */

get_header();
?>

<main id="primary" class="site-main py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php if (have_posts()): ?>

					<header class="archive-header">
						<?php
						the_archive_title('<h1 class="archive-title">', '</h1>');
						the_archive_description('<div class="archive-description">', '</div>');
						?>
					</header><!-- .archive-header -->

					<div class="posts-list">
						<?php
						while (have_posts()):
							the_post();

							get_template_part('template-parts/content', get_post_type());

						endwhile;
						?>
					</div>

					<?php
					the_posts_pagination(
						array(
							'mid_size' => 2,
							'prev_text' => '<i class="bi bi-chevron-left"></i> ' . esc_html__('Previous', '_bs'),
							'next_text' => esc_html__('Next', '_bs') . ' <i class="bi bi-chevron-right"></i>',
						)
					);

				else:

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>

			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
