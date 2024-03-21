<?php
/**
 * Title: Sofa Clean Expert banner
 * Categories: banner
 * Keywords: banner
 */
?>
<?php $section_id = get_field('section_id'); ?>
<style>
    .banner__curtain:after {
        content: url("<?php echo get_template_directory_uri() . '/assets/images/icons/banner-bg.svg' ?>");
    }
</style>

<section class="banner" <?php if($section_id) { echo 'id="' . $section_id . '"';} ?>>
    <div class="banner__content">
        <picture class="banner__img">
            <source media="(max-width: 480px)"
                    srcset=" <?php echo wp_get_attachment_image_src(get_field('banner_bg_image_s', false, false))[0]; ?>">
            <source media="(max-width: 800px)" srcset="<?php the_field('banner_bg_image_s'); ?>">
            <source media="(max-width: 1600px)" srcset="<?php the_field('banner_bg_image_m'); ?>">
            <img src="<?php the_field('banner_bg_image_l'); ?>" alt="">
        </picture>
        <div class="banner__curtain banner__curtain_left"></div>
        <div class="banner__curtain banner__curtain_right"></div>
        <div class="banner__content-top center">
            <div class="banner__opening-hours-block">
                <?php get_template_part('parts/opening-hours'); ?>
                <?php get_template_part('parts/social'); ?>
            </div>
            <?php get_template_part('parts/contacts'); ?>
            <?php get_template_part('parts/call-button') ?>
            <div class="banner__service">
                <?php
                if (have_rows('banner_service')):
                    while (have_rows('banner_service')) :
                        the_row();
                        $icon_url = get_sub_field('banner_service_icon');
                        $text = get_sub_field('banner_service_text');

                        echo '<div class="banner__service-item" ><img src = "' . $icon_url . '" alt = "" width="32" height="32">' . $text . '</div >';
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>

    <?php
    $advantages = get_field('banner_advantage');
    if ($advantages) {
    ?>
    <div class="banner__advantage center">
        <?php foreach ($advantages as $key => $advantage) { ?>
            <div class="banner__advantage-item">
                <div class="banner__advantage-text"><?php echo $advantage['banner_advantage_text'] ?></div>
                <img class="banner__advantage-img" src="<?php echo $advantage['banner_advantage_icon'] ?>"
                     alt="Qualified">
                <?php
                if ($key != array_key_last($advantages)) {
                    echo '<div class="banner__advantage-item-arrow"></div>';
                }
                ?>

            </div>
            <?php
        }
        }
        ?>
    </div>
</section>