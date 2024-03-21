<?php
/**
 * Title: Sofa Clean Expert blog block
 */

?>
<div class="blog block" id="content">
    <div class="blog__carts center" id="blog-carts">
        <?php
        $posts_per_page = get_field('posts_per_page', 'options');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $pages = ceil(wp_count_posts()->publish / $posts_per_page);
        $args = array(
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
        );
        query_posts($args);
        ?>
        <?php if (have_posts()): ?>
            <?php while (have_posts()) {
                the_post();
                get_template_part('parts/blog-cart');
            }

        else: ?>
            <div id="post-404" class="noposts">
                <p><?php _e('Page not found.', 'sofacleanexpert'); ?></p>
            </div><!-- /#post-404 -->
        <?php endif;
        wp_reset_query(); ?>
    </div>
    <?php get_template_part('parts/pagination', null, array('page' => $paged, 'pages' => $pages, 'container_id'=>'blog-carts')); ?>
</div>