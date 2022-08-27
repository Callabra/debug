<?php
namespace Debug;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Formatter\ChromePHPFormatter;

class ChromePHP {


	public $Logger;


	public function __construct() 
	{

		$this->Logger = new \Monolog\Logger('chrome');
		$Handler = new \Monolog\Handler\ChromePHPHandler();
		$Handler->setFormatter(new \Monolog\Formatter\ChromePHPFormatter() );
		$this->Logger->pushHandler( $Handler );
		

	}


	public function error( string $message, array|object $context)
	{
		
		$this->Logger->error("", array($message => $context) );

	}

	public function warn( string $message, array|object $context)
	{
		
		$this->Logger->warning("", array($message => $context) );

	}

	public function info( string $message, array|object $context)
	{
		
		$this->Logger->info($message, array($message => $context) );

	}	


	
} // end class



?>