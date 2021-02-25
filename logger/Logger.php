<?php
namespace logger;

use logger\level\Info;
use logger\level\Warning;
use logger\level\Error;

class Logger extends LoggerBase
{
    /**
     * Returns instance of Logger
     * 
     * @param   string $adapter - Get or create instance of logger with given adapter
     * 
     * @return  Logger
     */
    public static function adapter( string $adapter ) : Logger
    {
        return static::instance( $adapter );
    }

    /**
     * Adds new info log to queue
     * 
     * @param   string  $message
     * @param   array   $data       - optionl array of relevant data
     * 
     * @return  Logger
     */
    public function info( string $message, array $data = array() )
    {
        return $this->queue( new Info( $message, $data ) );
    }

    /**
     * Adds new warning log to queue
     * 
     * @param   string  $message
     * @param   array   $data       - optionl array of relevant data
     * 
     * @return  Logger
     */
    public function warning( string $message, $data = array() )
    {
        return $this->queue( new Warning( $message, $data ) );
    }

    /**
     * Adds new error log to queue
     * 
     * @param   string  $message
     * @param   array   $data       - optionl array of relevant data
     * 
     * @return  Logger
     */
    public function error( string $message, $data = array() )
    {
        return $this->queue( new Error( $message, $data ) );
    }
}