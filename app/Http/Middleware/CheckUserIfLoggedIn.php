<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function checkUser(){

        return (bool)Session::get('current_user');
    }
    public function handle(Request $request, Closure $next): Response
    {
        if(!$this->checkUser()){
            return redirect('login');
        }
        return $next($request);
    }
}
