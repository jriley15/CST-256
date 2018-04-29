<?php



/**
 * CLC 5
 * ILogger Interface 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 4-29-2018
 * Contains all static functions that are implemented by custom logger classes
 *
 */


namespace App\Services\Utility;

interface ILogger
{
    static function getLogger();
    public static function debug($message, $data);
    public static function info($message, $data);
    public static function warning($message, $data);
    public static function error($message, $data);
}