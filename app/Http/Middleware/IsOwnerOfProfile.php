<?php

namespace App\Http\Middleware;

use Closure;

class IsOwnerOfProfile
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
        if ($request->id != auth()->user()->id) {
            session()->flash('error', 'انت لست صاحب هذا الملف الشخصي');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
