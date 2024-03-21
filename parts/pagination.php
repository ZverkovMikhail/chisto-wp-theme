<?php
/**
 * Title: Sofa Clean Expert pagination
 */
$page = $args['page'] ?? '';
$pages = $args['pages'] ?? '';
$container_id = $args['container_id'] ?? '';
?>
<div class="pagination">
    <?php
    echo paginate_links(array(
        'type' => '', //format of the returned value
        'format' => 'page/%#%/#'. $container_id,
        'prev_text' => '<svg class="pagination__icon pagination__icon_prev" xmlns="http://www.w3.org/2000/svg" height="52" width="52" viewBox="0 0 52 52" fill="#43b4bc">
                    <path d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                          stroke="none"/>
                </svg>',
        'next_text' => '<svg class="pagination__icon" xmlns="http://www.w3.org/2000/svg" height="52" width="52" viewBox="0 0 52 52" fill="#43b4bc">
                    <path d="M35.992 24.4488C36.849 25.3059 36.849 26.6978 35.992 27.5548L22.8276 40.7193C21.9705 41.5763 20.5786 41.5763 19.7216 40.7193C18.8645 39.8622 18.8645 38.4703 19.7216 37.6133L31.3364 25.9984L19.7284 14.3835C18.8714 13.5265 18.8714 12.1346 19.7284 11.2776C20.5855 10.4205 21.9774 10.4205 22.8344 11.2776L35.9988 24.442L35.992 24.4488Z"
                          stroke="none"/>
                </svg>',
        'mid_size' => 1,
        'current' => $page,
        'total' => $pages
    )); ?>
</div>