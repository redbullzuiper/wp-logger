<?php
namespace logger;

use logger\adapters\Adapter;
use logger\level\Log;

class LoggerBase 
{
    /**
     * Can only be initialized once
     * 
     * @var LoggerBase[]|array
     */
    protected static $instance = array();

    /**
     * The active adapter of the instance
     * 
     * @var Adapter
     */
    protected Adapter $adapter;

    /**
     * Queue of Logs to be stored
     * 
     * @var Log[]
     */
    protected array $queue = array();

    /**
     * Default implemented adapters
     * 
     * TODO
     * Implement MySQL
     * Implement text file
     * 
     * @var array
     */
    protected array $adapters = [
        'json' => \logger\adapters\JSON::class
    ];

    protected function __construct() {}

    /**
     * Get a instance of LoggerBase
     * 
     * @param   string  $adapter_name    - name of the adapter to use
     * 
     * @return  Logger
     */
    public static function instance( string $adapter_name )
    {
        if( ! isset( self::$instance[$adapter_name] ) ) {
            static::$instance[$adapter_name] = new static();
            static::$instance[$adapter_name]->adapter = new static::$instance[$adapter_name]->adapters[$adapter_name];
        }

        return self::$instance[$adapter_name];
    }

    public function queue( Log $log )
    {
        $this->queue[] = $log;

        return $this;
    }

    public function commit()
    {
        $this->adapter->save( $this->queue );
    }
}