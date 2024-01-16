<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect(route('index'));
        }
        if(Auth::user()->ban == 1){
            Auth::logout();
            return redirect(route('index') . '#openModal3')->withErrors([
                'form' => "Вы заблокированы, обратитесь к админестратору!"
            ]);
        }
        return $next($request);
    }
}
