<?php
/**
 * The template for social block
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */
?>

<div class="social">
    <?php
    if (have_rows('social_data', 'option')):
        while (have_rows('social_data', 'option')) : the_row();
            $title = get_sub_field('social_aria_label');
            $icon_id = get_sub_field('social_icon');
            $link = get_sub_field('social_link');
            ?>
            <a class="social-link" href="<?php echo $link; ?>" aria-label="<?php echo 'Link to our '.$title; ?>">
                <?php echo get_svg($icon_id, 'social-icon') ?>
            </a>
        <?php
        endwhile;
    endif;
    ?>
</div>