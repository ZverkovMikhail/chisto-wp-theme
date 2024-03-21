<?php
/**
 * The template for image on top for decoration blocks
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */
$image_top = wp_get_attachment_image_src(get_field('block_image_top'), 'full');
$image_src_top = ($image_top) ? $image_top[0] : false;
if (get_field('example_img_src') !== null){
$image_src_top = get_field('example_img_src');
}
 if ($image_src_top): ?>
    <picture class="block-image block-image_top">
        <source media="(min-width:1281px)"
                srcset="">
        <source media="(max-width:1280px)"
                srcset="<?php echo $image_src_top ?>">
        <img class="block-image__img block-image__img_top" src="<?php echo $image_src_top ?>" alt="">
    </picture>
<?php endif; ?>
