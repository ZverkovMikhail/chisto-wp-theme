<?php
/**
 * Title: Sofa Clean Expert team block
 */
?>


<?php
if (have_rows('team_members', 'option')):
    $section_id = get_field('section_id');
    echo '<section class="team block"' . (($section_id) ? ' id="' . $section_id . '"' : '') . '>';
    if (get_field('block_title')) {
        echo '<h2 class="content__title content__title_align-center">' . get_field('block_title') . '</h2>';
    }
    echo '<div class="team__content center">
            <div class="team__items-wrap">';

    while (have_rows('team_members', 'option')) : the_row();
        $image = get_sub_field('team_member_img');
        $text = get_sub_field('team_member_text');
        ?>
        <div class="team__item">
            <div class="team__img-wrap">
                <img class="team__img" src="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>"
                     alt="">
            </div>
            <div class="team__text"><?php echo $text; ?></div>
        </div>
    <?php
    endwhile;
    echo '</div></div></section>';
endif;
?>

