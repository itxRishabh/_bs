<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				while (have_posts()):
					the_post();

					get_template_part('template-parts/content', 'single');

					// Post navigation.
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle"><i class="bi bi-arrow-left"></i> ' . esc_html__('Previous:', '_bs') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', '_bs') . ' <i class="bi bi-arrow-right"></i></span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load comments template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile;
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
