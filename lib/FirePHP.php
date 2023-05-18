<?php
namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\WildfireFormatter;


class FirePHP {


	public static function init() 
	{

		$Logger = new \Monolog\Logger('firephp');
		$Handler = new \Monolog\Handler\FirePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\WildfireFormatter() );
		$Logger->pushHandler( $Handler );

		return $Logger;
	
	}


	public static function error( string $message, $context = null)
	{

		$Logger = self::init();

		$Logger->error($message, $context);

	}

	public static function warn( string $message, $context = null)
	{

		$Logger = self::init();

		$Logger->warning($message, $context);
		
	}

	public static function info( string $message, $context = null)
	{

		$Logger = self::init();

		$Logger->info($message, (array) $context);

	}	



	
} // end class