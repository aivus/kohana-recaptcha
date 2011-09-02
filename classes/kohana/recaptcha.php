<?php defined('SYSPATH') or die('No direct script access.');
/**
 * reCaptcha wrapper and helper class.
 *
 * @package    Kohana
 * @category   Security
 * @author     Karol Janyst
 * @copyright  (c) 2011 MaruCode
 * @license    http://kohanaframework.org/license
 */
class Kohana_reCaptcha {
	
	/**
	 * @var  array  variable to store config
	 */
	protected static $_config = array();

	/**
	 * @var  string  error returned from reCaptcha
	 */	
	protected static $_error = NULL;
	
	/**
	 * Loads config data and reCaptcha library.
	 *
	 * @return  void
	 */	
	protected static function _init()
	{
		if (empty(static::$_config))
		{
			static::$_config = Kohana::$config->load('recaptcha');
		}
		
		require_once Kohana::find_file('vendor', 'recaptcha/recaptchalib');
	}

	/**
	 * Return reCaptcha config value by name.
	 *
	 * @param   string   key for config value
	 * @return  string
	 */	
	public static function config($name)
	{
		static::_init();
		
		if (array_key_exists($name, static::$_config))
		{
			return static::$_config[$name];
		}
		return NULL;
	} 
	
	/**
	 * Renders a HTML for reCaptcha based on config.
	 *
	 * @return  string
	 * @uses    View::factory
	 * @uses    Request::$initial
	 */
	public static function get_html()
	{
		static::_init();
		
		$config = View::factory('recaptcha_config');
		
		if (static::config('theme') === 'custom')
		{
			$html = View::factory('recaptcha_custom');
		}
		else
		{
			$html = recaptcha_get_html(
				static::config('public_key'),
				static::$_error,
				(Request::$initial->protocol() === 'https')
			);
		}
		 
		return $config.$html;
	}

	/**
	 * Check that the given response matches the currently reCaptcha challenge.
	 *
	 *     if (reCaptcha::check())
	 *     {
	 *         // Pass
	 *     }
	 * 
	 * Or check it when using [Validation]:
	 *
	 *     $array->rules('recaptcha_challenge_field', array(
	 *         'not_empty'        => NULL,
	 *         'reCaptcha::check' => NULL,
	 *     ));
	 *
	 * @param   string   reCaptcha response field
	 * @param   string   reCaptcha challenge field
	 * @return  boolean
	 * @uses    Arr::get
	 * @uses    Request::$client_ip
	 */
	public static function check($challenge = NULL, $response = NULL)
	{
		static::_init();
		
		if ( ! $response)
		{
			$response = Arr::get($_POST, 'recaptcha_response_field', FALSE);
		}
		if ( ! $challenge)
		{
			$challenge = Arr::get($_POST, 'recaptcha_challenge_field', FALSE);
		}
                
		$result = recaptcha_check_answer(static::config('private_key'), Request::$client_ip, $challenge, $response);
		static::$_error = $result->error;
		return (bool) $result->is_valid;
	}
}
