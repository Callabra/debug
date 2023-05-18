<?php
namespace Debug;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class File {



	public static function error(string $message, $context = null, $filename='ERRORS')
	{

		// if File isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('File', 'DEBUG_ERROR_CHANNELS') !== true) {
			return false;
		}	

		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler($_SERVER['DEBUG_FILE_PATH'] . $filename . '.log', Level::Error));
		$Logger->error("",array($message => $context));

	}

	public static function warn(string $message, $context = null, $filename='WARNINGS')
	{

		// if File isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('File', 'DEBUG_WARNING_CHANNELS') !== true) {
			return false;
		}	

		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler($_SERVER['DEBUG_FILE_PATH'] . $filename . '.log', Level::Warning));
		$Logger->warning("",array($message => $context));

	}

	
	public static function info(string $message, $context = null, $filename='INFO')
	{
		
		// if File isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('File', 'DEBUG_INFO_CHANNELS') !== true) {
			return false;
		}	

		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler($_SERVER['DEBUG_FILE_PATH'] . $filename . '.log', Level::Info));
		$Logger->info("",array($message => $context));
	}


} // end class



?>