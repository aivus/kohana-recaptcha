<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div id="<?php reCaptcha::config('custom_theme_widget') ?>">

   <div id="recaptcha_image"></div>
   <div class="recaptcha_only_if_incorrect_sol"><?php echo __('Incorrect. Try again.') ?></div>

   <span class="recaptcha_only_if_image"><?php echo __('Type the two words') ?></span>
   <span class="recaptcha_only_if_audio"><?php echo __('Type what you hear') ?></span>

   <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

   <div><a href="javascript:Recaptcha.reload()"><?php echo __('Get a new challenge') ?></a></div>
   <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><?php echo __('Get a audio challenge') ?></a></div>
   <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><?php echo __('Get a visual challenge') ?></a></div>

   <div><a href="javascript:Recaptcha.showhelp()"><?php echo __('Help') ?></a></div>

 </div>

 <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=<?php echo reCaptcha::config('public_key')?>">
 </script>
 <noscript>
   <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?php echo reCaptcha::config('public_key')?>"
        height="300" width="500" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
 </noscript>