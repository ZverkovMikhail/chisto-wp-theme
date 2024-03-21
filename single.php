<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package SofaCleanExpert
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

get_header();
get_template_part( 'parts/second-header');
?>
    <main class="blog-details__content center block">
        <?php the_content(); ?>
    </main>
<?php
get_footer();
