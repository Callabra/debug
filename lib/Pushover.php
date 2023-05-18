<?php
###########################################################################################
### For use with the pushover app. https://pushover.net/
### Once signed up you'll need to define PUSHOVER_KEY, PUSHOVER_USER with keys from their
### website. PUSHOVER_ENVIRONMENT is used to group alerts inside the app.
###########################################################################################

namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\PushoverHandler;


class Pushover {

	public static function error(string $message, $context = null)
	{

		// if Pushover isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('Pushover', 'DEBUG_ERROR_CHANNELS') !== true) {
			return false;
		}

		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler($_SERVER['PUSHOVER_KEY'],$_SERVER['PUSHOVER_USER'],$_SERVER['PUSHOVER_ENVIRONMENT'],Level::Error) );
		$Logger->error("ERROR: " . $message );
	}

	public static function warn(string $message, $context = null)
	{

		// if Pushover isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('Pushover', 'DEBUG_WARNING_CHANNELS') !== true) {
			print "false";
			return false;
		}

		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler($_SERVER['PUSHOVER_KEY'],$_SERVER['PUSHOVER_USER'],$_SERVER['PUSHOVER_ENVIRONMENT'],Level::Warning) );
		$Logger->warning("WARNING: " . $message );
		
	}

	public static function info($message, $context = null)
	{

		// if Pushover isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('Pushover', 'DEBUG_INFO_CHANNELS') !== true) {
			return false;
		}		

		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler($_SERVER['PUSHOVER_KEY'],$_SERVER['PUSHOVER_USER'],$_SERVER['PUSHOVER_ENVIRONMENT'],Level::Info) );
		$Logger->info("INFO: " . $message );

	}

	
} // end class