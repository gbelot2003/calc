<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StatusCheck
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

        if(Auth::user()->state === 0 && Auth::user()->id != 1){
            flash('Esta cuenta se encuentra suspendida!!!', 'danger')->important();
            return redirect()->to('/cuenta-desactivada');
        }

        return $next($request);
    }
}
