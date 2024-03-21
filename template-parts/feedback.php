<?php
/**
 * Title: Sofa Clean Expert feedback block
 */

?>
<?php $section_id = get_field('section_id'); ?>
<section class="feedback block" id="feedback" <?php if($section_id) { echo 'id="' . $section_id . '"';} ?>>
    <?php get_template_part('parts/block-image-top', null, array('block_name' => 'feedback')) ?>
    <h2 class="feedback__title content__title content__title_align-center"><?php echo get_field('block_title') ?></h2>
    <div class="feedback__content center">
        <?php get_template_part('parts/contact-form'); ?>
        <div class="feedback__img-wrap" <?php echo (is_admin()) ? 'style="margin-top:64px;"' : '' ?>>
            <?php get_template_part('parts/block-image-side', null, array('block_name' => 'feedback')) ?>
        </div>
    </div>
</section>
