<?php
namespace Debug;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\ChromePHPHandler;



class Console extends Log {


	public static $Console;

	public static function __init__() 
	{

		if(!self::$Console) {

			self::$Console = new Logger('console');
			self::$Console->pushHandler( new ChromePHPHandler() );

		}
				
	}


	public static function error($value,$name='')
	{
		if(self::isActive() == true) {

			self::__init__();

			self::$Console->error($name . " : " . $value);
		
		} 

	}

	public static function warn($value,$name='')
	{
		if(self::isActive() == true) {

			self::__init__();

			self::$Console->warning($name . " : " . $value);


		}
	}

	public static function info($value=null,$name=null)
	{

		if(self::isActive() === true) {

			self::__init__();

			self::$Console->info($name . " : " . $value);

		}

	}

	
} // end class



?>