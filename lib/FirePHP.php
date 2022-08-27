<?php
namespace Debug;



use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\WildfireFormatter;


class FirePHP {


	public $Logger;


	public function __construct() 
	{

		$this->Logger = new \Monolog\Logger('firephp');
		$Handler = new \Monolog\Handler\FirePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\WildfireFormatter() );
		$this->Logger->pushHandler( $Handler );
	
	}


	public function error( string $message, array $context)
	{

		$this->Logger->error($message, $context);
	

	}

	public function warn( string $message, array $context)
	{

		$this->Logger->warning($message, $context);
		
	}

	public function info( string $message, array $context)
	{

		$this->Logger->info($message,$context);

	}	



	
} // end class



?>