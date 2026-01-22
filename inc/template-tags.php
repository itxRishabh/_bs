<?php
/**
 * Custom template tags for this theme
 *
 * @package _bs
 */

if (!function_exists('_bs_posted_on')):
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function _bs_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated visually-hidden" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url(get_permalink()),
			$time_string
		);

		echo '<span class="posted-on me-3"><i class="bi bi-calendar3 me-1"></i>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if (!function_exists('_bs_posted_by')):
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function _bs_posted_by()
	{
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			esc_html(get_the_author())
		);

		echo '<span class="byline me-3"><i class="bi bi-person me-1"></i>' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if (!function_exists('_bs_entry_footer')):
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _bs_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(', ');
			if ($categories_list) {
				echo '<span class="cat-links d-block mb-2"><i class="bi bi-folder me-1"></i>' . $categories_list . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', ', ');
			if ($tags_list) {
				echo '<span class="tags-links d-block mb-2"><i class="bi bi-tags me-1"></i>' . $tags_list . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link me-3"><i class="bi bi-chat me-1"></i>';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="visually-hidden"> on %s</span>', '_bs'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('<i class="bi bi-pencil me-1"></i>Edit<span class="visually-hidden"> %s</span>', '_bs'),
					array(
						'span' => array(
							'class' => array(),
						),
						'i' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link btn btn-sm btn-outline-secondary">',
			'</span>'
		);
	}
endif;

if (!function_exists('_bs_post_thumbnail')):
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function _bs_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()):
			?>

			<div class="post-thumbnail mb-4">
				<?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
			</div><!-- .post-thumbnail -->

		<?php else: ?>

			<a class="post-thumbnail d-block mb-3" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'medium_large',
					array(
						'class' => 'img-fluid rounded',
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')):
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;

if (!function_exists('_bs_comments_number')):
	/**
	 * Display comments count with proper formatting.
	 */
	function _bs_comments_number()
	{
		$comments_number = get_comments_number();

		if ($comments_number === 0) {
			$output = __('No comments', '_bs');
		} elseif ($comments_number === 1) {
			$output = __('1 comment', '_bs');
		} else {
			$output = sprintf(
				/* translators: %s: Number of comments */
				__('%s comments', '_bs'),
				number_format_i18n($comments_number)
			);
		}

		echo '<span class="comments-count"><i class="bi bi-chat-dots me-1"></i>' . esc_html($output) . '</span>';
	}
endif;

if (!function_exists('_bs_reading_time')):
	/**
	 * Display estimated reading time for a post.
	 */
	function _bs_reading_time()
	{
		$content = get_post_field('post_content', get_the_ID());
		$word_count = str_word_count(strip_tags($content));
		$reading_time = ceil($word_count / 200); // Assuming 200 words per minute

		if ($reading_time < 1) {
			$reading_time = 1;
		}

		printf(
			'<span class="reading-time me-3"><i class="bi bi-clock me-1"></i>%s %s</span>',
			esc_html($reading_time),
			esc_html(_n('min read', 'mins read', $reading_time, '_bs'))
		);
	}
endif;
