<?php defined('SYSPATH') or die('No direct script access.'); ?>

<script type="text/javascript">
	var RecaptchaOptions = {
		<?php if (reCaptcha::config('custom_translations')) : ?>
		custom_translations : {
			instructions_context:"<?php echo __('Type the words in the boxes:') ?>",
			instructions_visual : "<?php echo __('Type the two words') ?>",
			instructions_audio : "<?php echo __('Type what you hear') ?>",
			play_again : "<?php echo __('Play sound again') ?>",
			cant_hear_this : "<?php echo __('Download sound as MP3') ?>",
			visual_challenge : "<?php echo __('Get a visual challenge') ?>",
			audio_challenge : "<?php echo __('Get an audio challenge') ?>",
			refresh_btn : "<?php echo __('Get a new challenge') ?>",
			help_btn : "<?php echo __('Help') ?>",
			incorrect_try_again : "<?php echo __('Incorrect. Try again.') ?>",
		},
		<?php endif ?>
		lang : '<?php echo reCaptcha::config('lang') ?>',
		<?php if (reCaptcha::config('theme') === 'custom') : ?>
		custom_theme_widget : '<?php echo reCaptcha::config('custom_theme_widget') ?>',		
		<?php endif ?>
		theme : '<?php echo reCaptcha::config('theme') ?>'
	};
</script>
