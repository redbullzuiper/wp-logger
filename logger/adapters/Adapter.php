<?php
namespace logger\adapters;

use logger\level\Log;

abstract class Adapter 
{
    /**
     * Save all logged messages from array
     * 
     * @param Log[] $logs
     */
    abstract public function save( array $logs );
}