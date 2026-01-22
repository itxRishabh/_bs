<?php
/**
 * The main template file
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
			<!-- Main Content -->
			<div class="col-lg-8">
				<?php
				if (have_posts()):

					if (is_home() && !is_front_page()):
						?>
						<header class="page-header mb-4">
							<h1 class="page-title"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					?>

					<div class="posts-list">
						<?php
						/* Start the Loop */
						while (have_posts()):
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 */
							get_template_part('template-parts/content', get_post_type());

						endwhile;
						?>
					</div>

					<?php
					// Pagination.
					the_posts_pagination(
						array(
							'mid_size' => 2,
							'prev_text' => '<i class="bi bi-chevron-left"></i> ' . esc_html__('Previous', '_bs'),
							'next_text' => esc_html__('Next', '_bs') . ' <i class="bi bi-chevron-right"></i>',
							'class' => 'pagination-wrapper',
						)
					);

				else:

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>

			<!-- Sidebar -->
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
