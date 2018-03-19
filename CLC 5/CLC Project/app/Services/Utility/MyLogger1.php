<?php
namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger1 implements ILogger
{
    public function debug($s)
    {
        Log::debug($s);
    }

    static function getLogger()
    {
       
    }

    public function warning($s)
    {
        Log::warning($s);
    }

    public function error($s)
    {
        Log::error($s);
    }

    public function info($s)
    {
        Log::info($s);
    }

    
    
    
    
    
    
    
    
}


