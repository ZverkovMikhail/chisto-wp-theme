<?php
/**
 * Sofa Clean Expert functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

include ('blocks/blocks.php');


/**
 * Get an SVG file from the imgs/ folder in the theme, update its attributes if necessary and return it as a string.
 *
 * @param string $filename The name of the SVG file to get.
 * @param array $attributes (optional) An array of attributes to add/modify to the SVG file.
 * @param string $directory (optional) The directory to look for the SVG file in, defaults to 'imgs'.
 * @return string|WP_Error The SVG file as a string or a WP_Error object if there was an error.
 * @author Aurooba Ahmed
 * @see https://aurooba.com/inline-svgs-in-your-wordpress-code-with-this-helper-function/
 *
 */
function get_svg($id, $class='')
{
    $svg = file_get_contents(get_attached_file($id));
    $update_svg = new WP_HTML_Tag_Processor( $svg );
    $update_svg->next_tag( 'svg' );
    $update_svg->add_class( $class );
    return $update_svg->get_updated_html();
}

if (!function_exists('sofacleanexpert_support')) :
    function sinatra_meta_viewport() {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    }
    add_action( 'wp_head', 'sinatra_meta_viewport', 1 );
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @return void
     * @since Sofa Clean Expert 1.0
     *
     */
    function sofacleanexpert_support()
    {

        // Add support for block styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style(get_template_directory_uri() . '/admin/css/style-editor.css',);
    }

endif;


register_nav_menus(
    array(
        'head_menu' => 'Меню в шапке сайта'
    )
);


/**
 * Function for `admin_init` action-hook.
 *
 * @return void
 */
function sofacleanexpert_admin_init_action()
{

}


if (!function_exists('sofacleanexpert_styles')) :

    /**
     * Enqueue styles.
     *
     * @return void
     * @since Sofa Clean Expert
     *
     */
    function sofacleanexpert_styles()
    {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get('Version');

        $version_string = is_string($theme_version) ? $theme_version : false;
        wp_register_style(
            'sofacleanexpert-style',
//            get_template_directory_uri() . '/assets/css/main.min.css',
            get_template_directory_uri() . '/assets/css/main.css',
            array(),
            $version_string
        );
        wp_register_script('sofacleanexpert-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array(),
            $version_string, [
                'strategy' => 'defer'
            ]);


        wp_enqueue_style('sofacleanexpert-style');
        wp_enqueue_script('sofacleanexpert-script');
    }

endif;
if (!function_exists('sofacleanexpert_admin_styles')) :
    function sofacleanexpert_admin_styles()
    {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get('Version');

        $version_string = is_string($theme_version) ? $theme_version : false;
        wp_register_style(
            'sofacleanexpert-admin-style',
            get_template_directory_uri() . '/admin/css/admin-style.css',
            array(),
            $version_string
        );
        wp_register_style(
            'sofacleanexpert-style',
            get_template_directory_uri() . '/assets/css/main.css',
            array(),
            $version_string
        );
        wp_register_script('sofacleanexpert-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array(),
            $version_string, [
                'strategy' => 'defer'
            ]);

        wp_enqueue_media();
        wp_enqueue_style('sofacleanexpert-style');
        wp_enqueue_style('sofacleanexpert-admin-style');
      wp_enqueue_script('sofacleanexpert-script');
    }

endif;
function get_gallery_images()
{
    if (have_rows('gallery_works', 'option')) {
        return array_reverse(get_field('gallery_works', 'option'));
    } else {
        return false;
    }
}

function get_gallery_image($img_before_id, $img_after_id)
{
    $img_before = wp_get_attachment_image_src($img_before_id, 'full');
    $img_after = wp_get_attachment_image_src($img_after_id, 'full');
    if ($img_before && $img_after){
        return '<div class="gallery-img__block">
                <div class="gallery-img__wrap gallery-img__wrap_before">
                    <h3 class="gallery-img__text">BEFORE</h3>
                    <img class="gallery-img__img" src="' . $img_before[0] . '" alt="before">
                </div>
                <div class="gallery-img__wrap gallery-img__wrap_after">
                    <h3 class="gallery-img__text">AFTER</h3>
                    <img class="gallery-img__img" src="' . $img_after[0] . '" alt="after">
                </div>
            </div>';
    }
    return '';

}

function gallery_slides_api(WP_REST_Request $request)
{
    try {
        $quantity = 10; // number of images returned
        $index = intval($request['i']);
        $row = get_gallery_images();
        $size = count($row);
        $data = array();
        $count = 0;
        $last_index = (($index + $quantity - 1) < $size) ? $index + $quantity - 1 : $size - 1;
        for ($i = $index; $i <= $last_index; $i++) {
            $img_before = $row[$i]['gallery_works_img_before'];
            $img_after = $row[$i]['gallery_works_img_after'];
            $data[$count++] = get_gallery_image($img_before, $img_after);
        }

        return array(
            'last_index' => $last_index < $size - 1 ? $last_index : -1,
            'gallery_images' => $data,
            '$size' => $size,
            '$last_index' => $last_index,
        );
    } catch (Exception $e) {
        return array(
            'error' => 'Caught exception: ', $e->getMessage(), "\n"
        );
    }
}

add_action('rest_api_init', function () {
    register_rest_route(
        'gallery/v1',  // namespace
        '/next/(?P<i>\d+)', // route
        array(       // options
            'methods' => 'GET',
            'callback' => 'gallery_slides_api',
            'permission_callback' => '__return_true',
            'args' => array(
                'i' => array(
                    'default' => 0
                ),
            ),
        ),
    );
});
function sofacleanexpert_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'half_content' => __('Half content', 'sofacleanexpert'),
        'full_content' => __('full content', 'sofacleanexpert'),
    ));
}

function sofacleanexpert_post_queries( $query ) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()){

        // alter the query for the home and category pages

        if(is_home()){
            $query->set('posts_per_page', get_field('posts_per_page', 'options'));
        }
    }
}

add_action( 'pre_get_posts', 'sofacleanexpert_post_queries' );

add_action('admin_init', 'sofacleanexpert_admin_init_action');
add_action('after_setup_theme', 'sofacleanexpert_support');
add_action('wp_enqueue_scripts', 'sofacleanexpert_styles');
add_action('admin_enqueue_scripts', 'sofacleanexpert_admin_styles');


add_theme_support('title-tag');
add_theme_support('custom-logo');

add_image_size('price_icon', 200, 32, true);
add_image_size('second_header_large', 1280, 480, array('center', 'center'));
add_image_size('second_header_medium', 800, 340, array('center', 'center'));
add_image_size('second_header_small', 430, 340, array('center', 'center'));
add_image_size('team_member_small', 250, 250, array('center', 'center'));
add_image_size('post_cart', 368, 247, array('center', 'center'));
add_image_size('half_content', 560, 364, array('center', 'center'));
add_image_size('full_content', 1136, 738, array('center', 'center'));

add_filter('image_size_names_choose', 'sofacleanexpert_custom_sizes');


show_admin_bar(false);