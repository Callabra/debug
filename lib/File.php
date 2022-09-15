<?php
namespace Debug;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class File {


	public static function error(string $message, array $context, $filename='ERRORS')
	{

		#$value = self::format($value);
		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler('/var/www/html/logs/' . $filename . '.log', Level::Error));
		$Logger->error("",array($message => $context));

	}

	public static function warn(string $message, array $context, $filename='WARNINGS')
	{

		#$value = self::format($value);
		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler('/var/www/html/logs/' . $filename . '.log', Level::Warning));
		$Logger->warning("",array($message => $context));

	}

	
	public static function info(string $message, array $context, $filename='INFO')
	{
		#$value = self::format($value);
		$Logger = new \Monolog\Logger('log');
		$Logger->pushHandler(new \Monolog\Handler\StreamHandler('/var/www/html/logs/' . $filename . '.log', Level::Info));
		$Logger->info("",array($message => $context));
	}


} // end class



?>