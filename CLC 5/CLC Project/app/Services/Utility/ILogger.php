<?php
namespace App\Services\Utility;

interface ILogger
{
    
    
    private static function getLogger();
    public function debug(); 
    public function info();
    public function warning(); 
    public function error();
    
    
    
    
    
    
}



