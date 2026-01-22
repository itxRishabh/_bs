<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _bs
 */

get_header();
?>

<main id="primary" class="site-main py-5">
	<div class="container">
		<section class="error-404 not-found">
			<div class="error-code">404</div>

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Oops! Page not found', '_bs'); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e('The page you were looking for doesn\'t exist. It might have been moved or deleted.', '_bs'); ?>
				</p>

				<div class="error-actions">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
						<i class="bi bi-house me-2"></i><?php esc_html_e('Go Home', '_bs'); ?>
					</a>
					<button onclick="history.back()" class="btn btn-outline-secondary">
						<i class="bi bi-arrow-left me-2"></i><?php esc_html_e('Go Back', '_bs'); ?>
					</button>
				</div>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

			<div class="error-404-widgets">
				<h2><?php esc_html_e('Maybe try one of these?', '_bs'); ?></h2>
				<div class="row">
					<div class="col-md-6">
						<h3><?php esc_html_e('Recent Posts', '_bs'); ?></h3>
						<ul class="list-unstyled">
							<?php
							$recent_posts = wp_get_recent_posts(
								array(
									'numberposts' => 5,
									'post_status' => 'publish',
								)
							);
							foreach ($recent_posts as $post):
								?>
								<li class="mb-2">
									<a href="<?php echo esc_url(get_permalink($post['ID'])); ?>">
										<?php echo esc_html($post['post_title']); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-md-6">
						<h3><?php esc_html_e('Categories', '_bs'); ?></h3>
						<ul class="list-unstyled">
							<?php
							wp_list_categories(
								array(
									'orderby' => 'count',
									'order' => 'DESC',
									'show_count' => 1,
									'title_li' => '',
									'number' => 5,
								)
							);
							?>
						</ul>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->
	</div>
</main><!-- #main -->

<?php
get_footer();
