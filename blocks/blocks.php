<?php

function plugin_dependencies_warning(): void
{
    $notice = '<div class="notice notice-error">
<p class="admin__notice-error">'. __('This site using "Advanced Custom Fields" and "Advanced Custom Fields: Image Aspect Ratio Crop" plugins, they should be installed and activated!') . '</p></div>';

    echo $notice;

}

function add_custom_class_to_blocks($block_content, $block)
{
    $block_content = new WP_HTML_Tag_Processor($block_content);
    $block_content->next_tag();
    if ('core/paragraph' === $block['blockName']) {
        $block_content->add_class('content__text');
    }
    if ('core/image' === $block['blockName']) {
        $block_content->add_class('content__img');
    }
     if ('core/video' === $block['blockName']) {
        $block_content->add_class('content__video-player');
    }
    $block_content->get_updated_html();
    return $block_content;
}

add_filter('block_categories_all', function ($categories) {

    // Adding a new category.
    array_unshift($categories, array(
        'slug' => 'sofacleanexpert',
        'title' => 'Sofacleanexpert'
    ));

    return $categories;
});


add_filter('render_block', 'add_custom_class_to_blocks', 10, 2);

$active_plugins = get_option('active_plugins');
if (!(in_array('acf-image-aspect-ratio-crop/acf-image-aspect-ratio-crop.php', $active_plugins) &&
    (in_array('advanced-custom-fields-pro/acf.php', $active_plugins) ||
        in_array('advanced-custom-fields/acf.php', $active_plugins)))) :

    add_action('admin_notices', 'plugin_dependencies_warning');
else:
    function sofacleanexpert_blocks_init()
    {
        register_block_type(__DIR__ . '/content');
        register_block_type(__DIR__ . '/about-numbers');
        register_block_type(__DIR__ . '/banner');
        register_block_type(__DIR__ . '/gallery');
        register_block_type(__DIR__ . '/price');
        register_block_type(__DIR__ . '/price-with-image');
        register_block_type(__DIR__ . '/services');
        register_block_type(__DIR__ . '/team');
        register_block_type(__DIR__ . '/blog');
        register_block_type(__DIR__ . '/feedback');
        register_block_type(__DIR__ . '/contacts-block');
        register_block_type(__DIR__ . '/gallery-full-page');
        register_block_type(__DIR__ . '/call-button');
        register_block_type(__DIR__ . '/button');
    }

    add_action('init', 'sofacleanexpert_blocks_init');
endif;
