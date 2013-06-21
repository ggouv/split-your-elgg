<?php
/**
 * Form to enter url for new iframe
 *
 * @package Split-your-elgg
 */

?>
<div>

	<div>
		<label><?php echo elgg_echo('split-your-elgg:url:title'); ?></label><br />
		<?php echo elgg_view('input/text', array('name' => 'url', 'value' => $title, 'class' => 'mvm ')); ?>
	</div>

	<div>
		<label><?php echo elgg_echo('split-your-elgg:size'); ?></label><br />
		<?php echo elgg_view('input/text', array('name' => 'widthB', 'value' => '50', 'class' => 'mvm ')); ?>
	</div>

	<?php echo elgg_view('input/submit', array('value' => elgg_echo("open"), 'class' => 'elgg-button elgg-button-submit noajaxified')); ?>

</div>