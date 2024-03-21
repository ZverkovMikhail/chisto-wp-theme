<a href="<?php the_permalink(); ?>" class="blog-cart">
    <div class="blog-cart__content">
    <?php
    $post_id = get_the_ID();
    echo '<div class="blog-cart__img-wrap">' .
            wp_get_attachment_image(get_field('post_cart_img', $post_id), 'post_cart', false, array('class' => 'blog-cart__img')) .
        '</div>';
    ?>
    <h2 class="blog-cart__title"><?php the_title(); ?></h2>
    <p class="blog-cart__text">
        <?php echo wp_trim_words(get_field('post_cart_text', $post_id), 40); ?>
    </p>
    </div>
    <div class="blog-cart__footer">
        <div class="blog-cart__date"><?php echo get_the_date(); ?></div>
        <div class="blog-cart__more-link">
            <svg class="blog-cart__icon" xmlns="http://www.w3.org/2000/svg" height="52" width="52"
                 viewBox="0 0 52 52" fill="#347c80">
                <path
                    d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                    stroke="none"/>
            </svg>
        </div>
    </div>
</a>
