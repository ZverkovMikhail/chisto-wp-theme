<?php
/**
 * The template for email block
 *
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */
?>

<?php
$text = get_field('email_text', 'option');
$link = get_field('email_link', 'option');

?>
<?php if ($text && $link): ?>
<a class="contact__item contact__item_email" href="<?php echo $link; ?>">
    <svg class="contact__icon contact__icon_email" width="32" height="32" viewBox="0 0 32 32" fill="#eb1c1c" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 4C1.34375 4 0 5.34375 0 7C0 7.94375 0.44375 8.83125 1.2 9.4L14.8 19.6C15.5125 20.1313 16.4875 20.1313 17.2 19.6L30.8 9.4C31.5562 8.83125 32 7.94375 32 7C32 5.34375 30.6562 4 29 4H3ZM0 11V24C0 26.2062 1.79375 28 4 28H28C30.2062 28 32 26.2062 32 24V11L18.4 21.2C16.975 22.2688 15.025 22.2688 13.6 21.2L0 11Z"/>
    </svg>
    <div class="contact__text"><?php echo $text ?></div>
</a>
<?php endif ?>