<?php
/**
 * The header.
 * This is the template that displays all of the <head> section and everything up until main.
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head() ?>
</head>
<body>
<?php get_template_part('parts/preloader'); ?>
<header class="header center">
         <?php the_custom_logo() ?>
    <input class="burger__checkbox" type="checkbox" name="menu" id="menu_id">
    <label class="burger" for="menu_id">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <div class="menu">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'head_menu',
            'depth' => 1,
            'container' => 'nav',
            'container_id' => 'menu',
            'menu_class' => 'menu__list'
        ) );
        ?>
        <?php get_template_part('parts/social'); ?>
        <?php get_template_part('parts/contacts'); ?>
    </div>

</header>