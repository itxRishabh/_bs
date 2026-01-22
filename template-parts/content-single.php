<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mb-4">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta text-muted">
            <?php
            _bs_posted_on();
            _bs_posted_by();
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <?php _bs_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', '_bs'),
                'after' => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php _bs_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->