<?php
namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Formatter\ChromePHPFormatter;


class ChromePHP {


	public static function init(string $channels) 
	{

		// if ChromePHP isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('ChromePHP', $channels) !== true) {
			return false;
		}

		// otherwise we initialize the logger
		$Logger = new \Monolog\Logger('chrome');
		$Handler = new \Monolog\Handler\ChromePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\ChromePHPFormatter() );
		$Logger->pushHandler( $Handler );

		return $Logger;

	}

	public static function error( string $message, $context = null)
	{

		$Logger = self::init('DEBUG_ERROR_CHANNELS');

		$Logger ? $Logger->error($message, (array) $context) : false;
	
	}

	public static function warn( string $message, $context = null)
	{

		$Logger = self::init('DEBUG_WARNING_CHANNELS');

		$Logger ? $Logger->warning($message, (array) $context) : false;
		
	}

	public static function info( string $message, $context = null)
	{

		$Logger = self::init('DEBUG_INFO_CHANNELS');

		$Logger ? $Logger->info($message, (array) $context) : false;

	}	


	
} // end class