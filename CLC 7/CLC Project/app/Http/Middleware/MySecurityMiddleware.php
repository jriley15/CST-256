<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Business\User\UserService;
use App\Services\Utility\MyLogger2;



/**
 * CLC 5
 * SecurityMiddleware
 * Authors: Jordan Riley and Antonio Jabrail
 * 4-29-2018
 * Handles page security
 * 
 */


class MySecurityMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     @param  \Closure  $next
     @return mixed
     */
    
    
    //filters users who aren't logged in from accessing certain pages
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        MyLogger2::info("Entering My Security Middleware in handle() at path: " . $path);
        
        $securityCheck = true;
        if($request->is('/') || $request->is('home') || $request->is('login') || $request->is('doLogin') || $request->is('restProfile') || $request->is('restProfile/*') || $request->is('restJob') || $request->is('restJob/*'))
        {
            $securityCheck = false;
        }

        MyLogger2::info($securityCheck ? "Security Middleware in handle()... Needs Security" : "Security Middleware in handle()... no security needed");
        
        $userService = new UserService();
        $user = session('user');
        
        
        
        if($securityCheck && !$userService->loggedIn($user))
        {
            MyLogger2::info("Leaving MySecurityMiddleware in handle() doing a redirect back to login");
            return redirect('/login');
        }
        
        return $next($request);
    }
}
