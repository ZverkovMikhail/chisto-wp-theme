<?php
/**
 * Title: Sofa Clean Expert services
 */
?>
<?php
$service_posts = get_posts([
    'numberposts' => 4,
    'offset' => 0,
    'orderby' => 'date',
    'category_name' => 'services'
]);
global $post;

if ($service_posts) {
    $section_id = get_field('section_id');
    ?>
    <section class="service block center" <?php if($section_id) { echo 'id="' . $section_id . '"';} ?>>
        <h2 class="content__title content__title_align-center"><?php echo get_field('block_title') ?></h2>
        <div class="service__content ">
            <?php
            foreach ($service_posts as $post) {
                setup_postdata($post);
                get_template_part('parts/service-item');
            }
            ?>
            <div class="service__content-line"></div>
        </div>
    </section>
    <?php
}

wp_reset_postdata();