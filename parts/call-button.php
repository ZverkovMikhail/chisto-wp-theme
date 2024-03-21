<?php
/**
 * Title: Sofa Clean Expert call button
 */
$data = get_field('call_button');
if ($data['link'] || $data['icon']):
?>
<a class="call-button" href="<?php echo $data['link'] ?>">
    <?php if ($data['icon']):?>
        <img src="<?php echo ($data['icon']) ?>" class="call-button__icon" width="24" height="24" alt="">
    <?php endif; ?>
    <?php echo $data['text'] ?>
</a>
<?php endif; ?>