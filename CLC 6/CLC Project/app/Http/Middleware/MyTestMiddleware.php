<?php

namespace App\Http\Middleware;

use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\Cache;
use Closure;


class MyTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {

        
        if($request->email != null)
        {
            $value = Cache::store("file")->get("mydata");
            if($value == null)
            {
                MyLogger2::info("Caching first time email for " . $request->email);
                Cache::store("file")->put("mydata", $request->email, 1);
            }
        }
        else
        {
            $value = Cache::store("file")->get("mydata");
            if($value != null)
                MyLogger2::info("Getting email from cache  " . $value);
                else
                    MyLogger2::info("Could not get email from cache (data is older than 1 min)");
        }
        return $next($request);
        

    }
}
