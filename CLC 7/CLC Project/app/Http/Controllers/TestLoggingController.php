<?php
namespace App\Http\Controllers;


use App\Services\Utility\ILoggerService;
use Illuminate\Support\Facades\App;

class TestLoggingController
{
    
    
    protected $logger;
    
    
    public function __construct(ILoggerService $iLogger) {
        $this->logger = $iLogger;
        
    }
    
    
    public function index() {
        echo $this->logger->info("Hello from Testloggingcontroller index", null);
    }
    
}

