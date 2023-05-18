<?php
namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;


class Console {


	public function init() 
	{

		$Logger = new \Monolog\Logger('console');
		$Handler = new \Monolog\Handler\BrowserConsoleHandler(\Psr\Log\LogLevel::INFO);
		$Logger->pushHandler( $Handler );

		return $Logger;
	
	}


	public function error( string $message, array $context)
	{
		$Logger = self::init();

		$Logger->error($message, $context);

	}

	public function warn( string $message, array $context)
	{
		$Logger = self::init();

		$Logger->warning($message, $context);
		
	}

	public function info( string $message, array $context)
	{

		$Logger = self::init();

		$Logger->info($message,$context);

	}

	
} // end class