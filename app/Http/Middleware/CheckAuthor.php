<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\auth;
class CheckAuthor
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
      if (Auth::check() && Auth::User()->role->name == 'author') {

        return $next($request);

      } else {
        return $next($request);
      }

    }
}
