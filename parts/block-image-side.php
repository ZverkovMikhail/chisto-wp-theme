<?php
/**
 * The template for image on side for decoration blocks
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

$image_side = wp_get_attachment_image_src(get_field('block_image_side'), 'full');
$image_src_side = ($image_side) ? $image_side[0] : false;
if ($image_src_side): ?>
    <picture class="block-image block-image_side">
        <source media="(min-width:1281px)"
                srcset="<?php echo $image_src_side; ?>">
        <source media="(max-width:1280px)"
                srcset="">
        <img class="block-image__img block-image__img_side" src="<?php echo $image_src_side; ?>" alt="">
    </picture>
<?php endif; ?>
