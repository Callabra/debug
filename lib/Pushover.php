<?php
namespace Debug;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\PushoverHandler;



class Pushover {

	public static function error(string $message, array $context)
	{
		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler(PUSHOVER_KEY,PUSHOVER_USER,PUSHOVER_TITLE,Level::Warning) );
		$Logger->error("ERROR: " . $message );
	}

	public static function warn($message)
	{

		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler(PUSHOVER_KEY,PUSHOVER_USER,PUSHOVER_TITLE,Level::Warning) );
		$Logger->warning("WARNING: " . $message );
		
	}

	public static function info($message)
	{

		$Logger = new Logger('pushover');
		$Logger->pushHandler( new PushoverHandler(PUSHOVER_KEY,PUSHOVER_USER,PUSHOVER_TITLE,Level::Info) );
		$Logger->info("INFO: " . $message );

	}

	
} // end class



?>