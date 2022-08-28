<?php
namespace Debug;



class Log {

    public static function format($context)
    {
        //monolog requires context to be in the form of an array.

		if(is_array($context)) {
			return $context;
		}

        if(is_object($context)) {
            return (array) $context; // 
        }

        if(isset($context)) {
            return array($context);    
        }

        if(is_null($context)) {
            return array();    
        }        

    }

    public static function channels(string $channels)
    {
        return explode(",",$_SERVER[$channels]);

    }


    public static function error(string $message, $context = null)
    {

    	$CHANNELS = self::channels('DEBUG_ERROR_CHANNELS');

    	foreach($CHANNELS as $channel) {

            $Channel = __NAMESPACE__ . "\\" . $channel;
            $Log = new $Channel();
            $Log->error($message,self::format($context));

    	}

    }

    public static function warn(string $message, $context = null)
    {

    	$CHANNELS = self::channels('DEBUG_WARNING_CHANNELS');

    	foreach($CHANNELS as $channel) {

            $Channel = __NAMESPACE__ . "\\" . $channel;
            $Log = new $Channel();
            $Log->warn($message,self::format($context));

    	}

    }

    public static function info(string $message, $context = null)
    {

    	$CHANNELS = self::channels('DEBUG_INFO_CHANNELS');

    	foreach($CHANNELS as $channel) {

    		$Channel = __NAMESPACE__ . "\\" . $channel;
    		$Log = new $Channel();
    		$Log->info($message,self::format($context));

    	}

    }        


} // end class



?>