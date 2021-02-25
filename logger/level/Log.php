<?php
namespace logger\level;

use \logger\Logger;

class Log
{
    public string $type;

    public string $date;

    public string $message;

    public array $data;

    public function __construct( string $message, array $data = array() )
    {
        $this->type = strtoupper( str_replace( __NAMESPACE__ . '\\', '', get_class( $this ) ) );
        $this->date = date('Y-m-d H:i:s');
        $this->message = $message;
        $this->data = $data;
    }
}