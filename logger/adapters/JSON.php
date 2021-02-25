<?php
namespace logger\adapters;

use logger\level\Log;

class JSON extends Adapter
{
    const DEFAULT_LOG = '{"INFO":[], "WARNING":[], "ERROR":[]}';

    /**
     * Path to log files
     * 
     * @var string
     */
    protected string $path;

    /**
     * List of log files
     * 
     * @var array
     */
    protected array $log_files = array();

    /**
     * Current log file
     * 
     * @var string
     */
    protected string $active_log_file;

    /**
     * Current log file logs
     * 
     * @var object
     */
    protected object $active_log_file_logs;

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->path = dirname( dirname( __DIR__ ) ) . '/logs';
        $this->active_log_file = $this->path . '/' . date('Y-m-d') . '.json';

        /**
         * This will create directory recursivly
         * No need to create each dir yourself
         */
        if( ! is_dir( $this->path ) ) {
            mkdir( $this->path, 0777, true );
        }

        /**
         * Create log file for today if it doens't exist
         * Set empty log content as default
         */
        if( ! is_file( $this->active_log_file ) ) {
            file_put_contents( $this->active_log_file, static::DEFAULT_LOG );
        }

        $this->active_log_file_logs = json_decode( file_get_contents( $this->active_log_file ) );
        $this->log_files = array_values( array_diff( scandir( $this->path ), array( '.', '..' ) ) );
    }

    /**
     * Save all logged messages from array
     * 
     * @param Log[] $logs
     */
    public function save( array $logs )
    {
        array_walk( $logs, fn( Log $log ) => array_push($this->active_log_file_logs->{$log->type}, $log) );
        file_put_contents( $this->active_log_file, json_encode( $this->active_log_file_logs ) );
    }
}