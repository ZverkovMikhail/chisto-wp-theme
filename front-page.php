<?php
/**
 * The template for front page
 * template front-page
 * @package SofaCleanExpert
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

get_header();
if (get_the_content()):
    ?>
    <?php the_content(); ?>
<?php
endif;
get_footer();
?>
