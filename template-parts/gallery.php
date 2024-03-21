<?php
/**
 * Title: Sofa Clean Expert gallery for front page block
 */

?>
<?php
$section_id = get_field('section_id');
$rows = get_gallery_images();
if ($rows):
    ?>
    <section class="gallery block" <?php if($section_id) { echo 'id="' . $section_id . '"';} ?>>
        <div class="gallery__content center">
            <h2 class="content__title content__title_align-center"><?php echo get_field('block_title') ?></h2>
            <div class="gallery__img-slider">
                <?php
                $numberImages = 3; // number of images displayed when the page is loaded
                $numberImages = ($numberImages < count($rows)) ? $numberImages : count($rows) - 1;
                for ($i = $numberImages - 1; $i >= 0; $i--) {
                    $img_before = $rows[$i]['gallery_works_img_before'];
                    $img_after = $rows[$i]['gallery_works_img_after'];
                    echo get_gallery_image($img_before, $img_after);
                }
                ?>

            </div>
            <div class="gallery__button-block">
                <button class="gallery__button gallery__button_prev" title="show previous image">
                    <svg class="gallery__button-icon" xmlns="http://www.w3.org/2000/svg" height="52" width="52"
                         viewBox="0 0 52 52" fill="#43b4bc">
                        <path
                            d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                            stroke="none"/>
                    </svg>
                </button>
                <button class="gallery__button gallery__button_next" title="show next image">
                    <svg class="gallery__button-icon" xmlns="http://www.w3.org/2000/svg" height="52" width="52"
                         viewBox="0 0 52 52" fill="#43b4bc">
                        <path
                            d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                            stroke="none"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>
<?php endif; ?>