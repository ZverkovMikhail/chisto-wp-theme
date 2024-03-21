<?php
/**
 * The template for second header
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */
?>
<style>
    .second-header__curtain:after {
        content: url("<?php echo get_template_directory_uri() . '/assets/images/icons/banner-bg.svg' ?>");
    }
</style>
<div class="second-header">
    <div class="second-header__img-wrap">
        <img class="second-header__img <?php echo 'second-header__img_' . get_field('page_header_img_align'); ?>"
             src="<?php echo wp_get_attachment_image_src(get_field('page_header_img'), 'full')[0] ?>"
             alt=""
             srcset="<?php echo wp_get_attachment_image_src(get_field('page_header_img'), 'full')[0] ?> 2000w,
             <?php echo wp_get_attachment_image_src(get_field('page_header_img'), 'second_header_large')[0] ?> 1280w,
             <?php echo wp_get_attachment_image_src(get_field('page_header_img'), 'second_header_medium')[0] ?> 800w,
             <?php echo wp_get_attachment_image_src(get_field('page_header_img'), 'second_header_small')[0] ?> 430w">

    </div>
    <div class="second-header__curtain"></div>
    <div class="second-header__curtain second-header__curtain_right"></div>
    <div class="second-header__plate">
        <h1 class="second-header__title"><?php echo mb_strtoupper(single_post_title('', false), get_bloginfo('charset')); ?></h1>
        <ul class="breadcrumb">
            <li class="breadcrumb__item"><a class="breadcrumb__link"
                                            href="<?php echo site_url(); ?>"><?php echo get_the_title(get_option('page_on_front')); ?></a>
            </li>
            <?php
            if (is_single()) {
                echo '<li class="breadcrumb__item">/ <a class="breadcrumb__link" href="' . get_permalink(get_option('page_for_posts')) . '">' . get_the_title(get_option('page_for_posts')) . '</a></li>';
            }
            ?>
            <li class="breadcrumb__item"> /  <?php single_post_title(); ?></li>
<li></li>
        </ul>
    </div>
</div>