<?php
/**
 * The template for displaying all pages
 * Template Name: page
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

get_header();
get_template_part('parts/second-header');
?>
<main class="page"><?php the_content() ?></main>
<?php
get_footer();


