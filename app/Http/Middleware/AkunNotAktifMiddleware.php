<?php

namespace App\Http\Middleware;

use Closure;

class AkunNotAktifMiddleware
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
        if(auth()->check() && auth()->attempt([
                'email' =>  $request->username,
                'password'  =>  $request->password,
                'active'    =>  0
            ])){
            flash()->error('Akun belum aktif');
            return redirect(url(action('LoginUserController@cekAktivUser')));
        }
        return $next($request);
    }
}
