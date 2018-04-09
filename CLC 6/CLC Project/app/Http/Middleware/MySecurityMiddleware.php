<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Utility\MyLogger2;

class MySecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     @param  \Closure  $next
     @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        MyLogger2::info("Entering My Security Middleware in handle() at path: " . $path);
        
        $securityCheck = true;
        if($request->is('/') || $request->is('login') || $request->is('dologin'))// || $request->is('usersrest/*') || $request->is('usersrest'))
        {
            $securityCheck = false;
        }

        MyLogger2::info($securityCheck ? "Security Middleware in handle()... Needs Security" : "Security Middleware in handle()... no security needed");
        
        if($securityCheck)
        {
            MyLogger2::info("Leaving MySecurityMiddleware in handle() doing a redirect back to login");
            return redirect('/login');
        }
        
        return $next($request);
    }
}
