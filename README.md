# Debug

## Wrapper for interacting for various debug and logging tools.

First add environmental variables defining which debug channels you would like to use.

> SetEnv DEBUG_ERROR_CHANNELS FirePHP,File  
> SetEnv DEBUG_WARNING_CHANNELS FirePHP  
> SetEnv DEBUG_INFO_CHANNELS FirePHP,File,Pushover  

Then call like so

> \Debug\Log::error("message",$value);  
> \Debug\Log::warn("message",$value);  
> \Debug\Log::info("message",$value);  

Each channel you defined in the environment variables will then output your data.


Currently channels are as follows:

- File - logs to files. default directory /var/www/logs
- Console - prints to browser console - f12 key
- ChromePHP - Browser plug-in - https://craig.is/writing/chrome-logger
- FirePHP - Browser plug-in - http://www.firephp.org/
- Pushover - app for phones - https://pushover.net/
