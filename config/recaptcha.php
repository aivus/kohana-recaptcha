<?php defined('SYSPATH') or die('No direct script access.');

return array(	
	/*
	 * Detailed info at http://code.google.com/apis/recaptcha/docs/customization.html
	 *
	 * The following options are available for reCaptcha config:
	 *
	 * string   private_key          your reCaptcha private key
	 * string   public_key           your reCaptcha public key
	 * string   theme                reCaptcha theme, availible: red, white, blackglass, clean, custom
	 * string   custom_theme_widget  html and css id for custom widget wrapper when theme is custom
	 * string   lang                 default language for labels and audio challenge, availible:
	 *                               en, nl, fr, de, pt, ru, es, tr
	 * bool     custom_translations  overrides labels language and use Kohana::I18n library for 
	 *                               translations. This do not overrides audio language. 
	 */
	'private_key' => FALSE,
	'public_key' => FALSE,
	'theme' => 'red',
	'custom_theme_widget' => FALSE,
	'lang' => 'en',	
	'custom_translations' => FALSE,
);
