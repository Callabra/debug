<?php
namespace Debug;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Formatter\ChromePHPFormatter;


class ChromePHP {


	public function init() 
	{

		$Logger = new \Monolog\Logger('chrome');
		$Handler = new \Monolog\Handler\ChromePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\ChromePHPFormatter() );
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