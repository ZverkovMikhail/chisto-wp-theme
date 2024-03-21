<?php
/**
 * Title: Sofa Clean Expert full page gallery block
 */

if (get_query_var('paged')) {
    $page = get_query_var('paged');
} else {
    $page = 1;
}

// Variables
$images = get_field('gallery_works', 'option');

if ($images):

$images_per_page = get_field('image_per_gallery_page', 'option');;
$total = count($images);
$pages = ceil($total / $images_per_page);
$start_index = (($page * $images_per_page) - $images_per_page);
$max = ($start_index + $images_per_page) - 1;
$last_index = ($max < $total) ? $max : $total - 1;

if ($total > 0 && $start_index < $total) : ?>
    <div class="gallery-page block">
        <div class="gallery-page__images-container center" id="gallery-block">

            <?php for ($i = $start_index;
            $i <= $last_index;
            $i++):
            echo '<div class="gallery-page__img-wrap">';
            $img_before = $images[$i]['gallery_works_img_before'];
            $img_after = $images[$i]['gallery_works_img_after'];
            echo get_gallery_image($img_before, $img_after);
            ?>
        </div>
        <?php endfor; ?>
    </div>
<?php else: ?>
    <div style="display:flex; flex-direction: column;height: calc(100vh - 300px);align-items: center;justify-content: center">
        <p><?php echo __('Page not found.') ?></p>
        <a href="<?php the_permalink(); ?>"><?php echo __('Go to gallery') ?></a>
    </div>
<?php endif;
get_template_part('parts/pagination', null, array('page' => $page, 'pages' => $pages, 'container_id'=>'gallery-block'));
?>
</div>
<?php endif; ?>
