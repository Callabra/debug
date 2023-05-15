<?php
namespace Debug;


class Rollbar {


	public static function init()
	{
		$config = array(
		    // required
		    'access_token' => $_SERVER['ROLLBAR_TOKEN'],
		    // optional - environment name. any string will do.
		    'environment' => $_SERVER['ROLLBAR_ENVIRONMENT'],
		    // optional - path to directory your code is in. used for linking stack traces.
		    'root' => $_SERVER['DOCUMENT_ROOT'],
		    // optional - the code version. e.g. git commit SHA or release tag
		    'code_version' => '27f47021038a159c5aa9bbb9f98ce47e55914404'
		);

		\Rollbar\Rollbar::init($config, false, false);   		
	}


	public static function error( string $message, array $context)
	{

		self::init();

	    \Rollbar\Rollbar::log(\Rollbar\Payload\Level::ERROR, $message, $context);

	}

	public static function warn( string $message, array $context)
	{

		self::init();

	    \Rollbar\Rollbar::log(\Rollbar\Payload\Level::WARNING, $message, $context);
		
	}

	public static function info( string $message, array $context)
	{

		self::init();

	    \Rollbar\Rollbar::log(\Rollbar\Payload\Level::INFO, $message, $context);

	}	



	
} // end class



?>