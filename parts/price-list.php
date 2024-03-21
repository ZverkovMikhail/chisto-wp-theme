<?php
/**
 * Title: Sofa Clean Expert price list
 */
?>

<ul class="price-list">
    <?php
    while (have_rows('price-group', 'option')) :
        the_row();
        $explain_group = get_sub_field('price-group-explain');
        ?>
        <li class="price-list__block">
            <span class="price-list__block-text"><?php echo get_sub_field('price-group-title') ?></span>
            <span class="price-list__block-exp"><?php echo get_sub_field('price-group-explain') ?></span>
            <ul>
                <?php
                while (have_rows('price-item')) : the_row();
                    ?>
                    <li class="price-list__item">
                        <div
                            class="price-list__item-text <?php echo get_sub_field('price-item-first-letter') ? 'price-list__item-text_fl' : '' ?>"><?php echo get_sub_field('price-item-title') ?></div>
                        <div class="price-list__item-icon">
                            <?php echo wp_get_attachment_image(get_sub_field('price-item-icon'), array('auto', 28)) ?>
                        </div>
                        <span class="price-list__item-price"><?php echo get_sub_field('price-item-price') ?></span>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        </li>
    <?php
    endwhile;
    ?>
</ul>