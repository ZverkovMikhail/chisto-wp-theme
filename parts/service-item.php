<?php
$post_id = get_the_ID();
$title = get_the_title();
?>
<button data-id="<?php echo $post_id; ?>" class="service__button">
    <div class="service__button-img-wrap">
        <?php
        $icon = get_field('service_post_icon', $post_id);
        if ($icon) {
            echo '<img src="' . $icon . '" class="service__button-img" width="52" height="52" alt="Display the'. $title .' block">';
        }
        ?>
    </div>
    <div class="service__button-text"><?php echo $title ?></div>
</button>
<div data-id="<?php echo $post_id; ?>" class="service__content-item">
    <?php
    $image = get_field('post_cart_img', $post_id);
    if ($image) {
        echo wp_get_attachment_image($image, array(560, 376), false, array('class' => 'service__content-item-img'));
    }
    ?>
    <div class="service__content-item-text">
        <?php the_field('post_cart_text', $post_id); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="service__content-item-button" aria-label="Read more about <?php echo $title ?>">
        <svg class="service__content-item-button-icon" xmlns="http://www.w3.org/2000/svg" height="52" width="52" viewBox="0 0 52 52" fill="#43b4bc">
            <path d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                  stroke="none"/>
        </svg>
    </a>
</div>