<?php
/**
 * Template part for displaying contacts
 * @package WordPress
 * @subpackage Sofa_Clean_Expert
 * @since Sofa Clean Expert 1.0
 */

?>
<div class="contact">
    <?php
    if (have_rows('contact_phones_data', 'option')):
        while (have_rows('contact_phones_data', 'option')) :
            the_row();
            $city = get_sub_field('contact_city_title');
            echo
                '<div class="contact__item"><span class="contact__text">' . $city . '</span>
                        <svg class="contact__icon" width="24" height="24" viewBox="0 0 24 24" fill="#eb1c22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 12,0.5 C 5.6547,0.50006 0.50006,5.6547 0.5,12 0.5,18.345 5.6547,23.5 12,23.5 18.345,23.5 23.5,18.345 23.5,12 23.5,5.6547 18.345,0.5 12,0.5 Z M 12,1.5 C 17.805,1.5 22.5,6.1951 22.5,12 22.5,17.805 17.805,22.5 12,22.5 6.1951,22.5 1.5,17.805 1.5,12 1.5001,6.1952 6.1952,1.5001 12,1.5 Z"/>
                            <path d="M9.50898 5.6723C9.29844 5.1637 8.74336 4.893 8.21289 5.03792L5.80664 5.69417C5.33086 5.82542 5 6.25745 5 6.74964C5 13.5145 10.4852 18.9996 17.25 18.9996C17.7422 18.9996 18.1742 18.6688 18.3055 18.193L18.9617 15.7867C19.1066 15.2563 18.8359 14.7012 18.3273 14.4907L15.7023 13.3969C15.2566 13.211 14.7398 13.3395 14.4363 13.7141L13.3316 15.0621C11.4066 14.1516 9.84805 12.593 8.9375 10.668L10.2855 9.56605C10.6602 9.2598 10.7887 8.74573 10.6027 8.30003L9.50898 5.67503V5.6723Z"/>
                        </svg>
                   <div class="contact__item-phones-block">';
            while (have_rows('contact_city_phone_numbers')) : the_row();
                $number = get_sub_field('contact_city_phone_number');
                $link = get_sub_field('contact_city_phone_number_link');
                echo '<a class="contact__item-link" href="' . $link . '">' . $number . '</a>';
            endwhile;
            echo '</div></div>';
        endwhile;
    endif;
    ?>
</div>