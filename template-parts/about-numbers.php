<?php
/**
 * Title: Sofa Clean Expert about numbers block
 */
?>
<?php
$about_numbers = get_field('about_numbers', 'options');
$section_id = get_field('section_id');
if ($about_numbers):
?>
<div class="about-numbers block">
    <div class="about-numbers__content center" <?php if($section_id) { echo ('id="' . $section_id . '"');} ?>>
			<?php
    foreach ($about_numbers as $about_number):
        $is_greater_than = $about_number['is_display_greater_than_sign'];
        $number = $about_number['number'];
        $text = $about_number['text'];
        ?>
				<div class="about-numbers__item">
					<div class="about-numbers__number <?php if ($is_greater_than) {
        echo 'about-numbers__number_greater';
    } ?>">
						<?php echo $number; ?>
					</div>
					<div class="about-numbers__text"><?php echo $text; ?></div>
				</div>
			<?php
    endforeach;
    ?>
		</div>
	</div>
<?php
    endif;
    ?>
