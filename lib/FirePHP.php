<?php
namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\WildfireFormatter;


class FirePHP {


	public static function init(string $channels) 
	{

		// if FirePHP isn't in the allowed channels we do nothing
		if(\Debug\Log::allowed('FirePHP', $channels) !== true) {
			return false;
		}

		$Logger = new \Monolog\Logger('firephp');
		$Handler = new \Monolog\Handler\FirePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\WildfireFormatter() );
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