<?php
/**
 * Title: Sofa Clean Expert Call to action block
 */
?>
<?php $position = get_field('call_button_block_position'); ?>
<?php if ($position): ?>
<div class="call-button__wrap center call-button__wrap_<?php echo get_field('call_button_block_position'); ?>">
    <?php endif; ?>
    <?php
    $data = get_field('call_button');
    if ($data['link'] || $data['icon']):
        ?>
        <a class="call-button" href="<?php echo $data['link'] ?>">
            <?php if ($data['icon']): ?>
                <img src="<?php echo($data['icon']) ?>" class="call-button__icon" width="24" height="24" alt="">
            <?php endif; ?>
            <?php echo $data['text'] ?>
        </a>
    <?php endif; ?>
    <?php if ($position): ?>
</div>
<?php endif; ?>


