<?php
/**
 * The template for displaying all pages
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
			<!-- Main Content (Full width for pages) -->
			<div class="col-lg-8 mx-auto">
				<?php
				while (have_posts()):
					the_post();

					get_template_part('template-parts/content', 'page');

					// If comments are open or we have at least one comment, load comments template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile;
				?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
