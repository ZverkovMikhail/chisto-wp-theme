<?php
/**
 * The footer.
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */
?>
<footer class="footer">
    <div class="footer__content center">
        <?php get_template_part('parts/social', null, array('container_class' => 'footer__social')); ?>
        <?php get_template_part('parts/contacts', null, array('container_class' => 'footer__contact')); ?>
        <p class="footer__quote">
            <?php the_field('quote_in_footer', 'options'); ?>
        </p>
        <div class="footer__contact footer__links-wrap">
            <?php get_template_part('parts/email'); ?>

            <div class="footer__links-wrap-row">
                <a class="footer__link" href="#">Personal data policy.</a>
                <a class="footer__link" href="#">&copy; <?php echo date('Y') ?> <?php bloginfo('name') ?>. All rights
                    reserved.</a>
                <a class="footer__link" href="#">Created by chesdev.</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>