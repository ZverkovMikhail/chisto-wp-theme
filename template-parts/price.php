<?php
/**
 * Title: Sofa Clean Expert price block
 */
?>
<?php
if (have_rows('price-group', 'option')) {
    get_template_part('parts/price-list');
}
?>