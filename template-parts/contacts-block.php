<?php
/**
 * Title: Sofa Clean Expert Contacts block
 */

?>
<div class="contacts-block">
    <div class="contacts-block__content center">
            <?php get_template_part('parts/opening-hours')?>
        <div class="contacts-block__exp contacts-block__exp_form">
            Fill in the enquiry form below, and one of our team will get back to you as soon as possible.
        </div>
        <div class="contacts-block__form">
            <?php get_template_part('parts/contact-form')?>
        </div>
        <div class="contacts-block__exp contacts-block__exp_contact">
            For all general enquires please call us on:
        </div>
        <div class="contacts-block__contacts">
            <?php get_template_part('parts/contacts')?>
            <?php get_template_part('parts/social')?>
            <?php get_template_part('parts/email')?>
        </div>
    </div>
</div>