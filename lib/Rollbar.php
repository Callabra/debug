<?php
namespace Debug;


class Rollbar {


	public static function init()
	{

		$person = array();
		if(isset($_SERVER['ROLLBAR_PERSON_ID'])) { // ID IS REQUIRED BY ROLLBAR TO TRACK BY PERSON SO IT MUST BE SET IN ENVIRONMENT VARIABLES TO ENABLE

			// required
			if(isset($_SESSION[$_SERVER['ROLLBAR_PERSON_ID']])) {
				$person['id'] = $_SESSION[$_SERVER['ROLLBAR_PERSON_ID']];
			}

			// optional
			if(isset($_SESSION[$_SERVER['ROLLBAR_PERSON_USERNAME']])) {
				$person['username'] = $_SESSION[$_SERVER['ROLLBAR_PERSON_USERNAME']];
			}

			// optional
			if(isset($_SESSION[$_SERVER['ROLLBAR_PERSON_EMAIL']])) {
				$person['email'] = $_SESSION[$_SERVER['ROLLBAR_PERSON_EMAIL']];
			}

		}

		$config = array(
		    // required
		    'access_token' => $_SERVER['ROLLBAR_TOKEN'],
		    // optional - environment name. any string will do.
		    'environment' => $_SERVER['ROLLBAR_ENVIRONMENT'],
		    // optional - path to directory your code is in. used for linking stack traces.
		    'root' => $_SERVER['DOCUMENT_ROOT'],
		    // optional - the code version. e.g. git commit SHA or release tag
		    'code_version' => '27f47021038a159c5aa9bbb9f98ce47e55914404',
		    // optional - allows capture of email address
		    'capture_email' => true,
		    // optional - allows capture of username
		    'capture_username' => true,
			// optional - attaches people tracking to item report
		    'person' => $person    
		    
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