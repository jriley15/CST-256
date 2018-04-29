<?php


/**
 * CLC 5
 * ILoggerService
 * Authors: Jordan Riley and Antonio Jabrail
 * 4-29-2018
 * Contains all functions that are implemented by custom logger classes
 *
 */



namespace App\Services\Utility;

interface ILoggerService
{
    public function debug($message, $data);
    public function info($message, $data);
    public function warning($message, $data);
    public function error($message, $data);
}