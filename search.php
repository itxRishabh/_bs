<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _bs
 */

get_header();
?>

	<main id="primary" class="site-main py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<?php if ( have_posts() ) : ?>

						<header class="search-header">
							<h1 class="search-title">
								<?php
								printf(
									/* translators: %s: search query. */
									esc_html__( 'Search Results for: %s', '_bs' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
							</h1>
							<p class="search-results-count">
								<?php
								printf(
									/* translators: %d: number of results. */
									esc_html( _n( '%d result found', '%d results found', $wp_query->found_posts, '_bs' ) ),
									$wp_query->found_posts
								);
								?>
							</p>
						</header><!-- .search-header -->

						<div class="search-results">
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'search' );

							endwhile;
							?>
						</div>

						<?php
						the_posts_pagination(
							array(
								'mid_size'  => 2,
								'prev_text' => '<i class="bi bi-chevron-left"></i> ' . esc_html__( 'Previous', '_bs' ),
								'next_text' => esc_html__( 'Next', '_bs' ) . ' <i class="bi bi-chevron-right"></i>',
							)
						);

					else :

						get_template_part( 'template-parts/content', 'none' );

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
