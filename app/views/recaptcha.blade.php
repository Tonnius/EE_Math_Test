<?php AssetProcessor::add('recaptcha', '../app/assets/js/recaptchaOptions.js', ['group' => 'header']); ?>
<script type="text/javascript" src="//www.google.com/recaptcha/api/challenge?k={{ $public_key }}<?php echo (isset($lang) ? '&hl='.$lang : '') ?>"></script>
<noscript>
	<iframe src="//www.google.com/recaptcha/api/noscript?k={{ $public_key }}<?php echo (isset($lang) ? '&hl='.$lang : '') ?>" height="300" width="500"></iframe><br>
	<textarea name="recaptcha_challenge_field" rows="3" cols="40" placeholder="Vastuseks saadud kood"></textarea>
	<input type="hidden" name="recaptcha_response_field" value="manual_challenge">
</noscript>