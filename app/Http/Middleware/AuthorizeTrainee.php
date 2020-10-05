<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthorizeTrainee
{

    public function handle($request, \Closure $next, $guard = null)
    {
        $role = Auth::user()->roles ? Auth::user()->roles[0] : null;
        if ($role && $role->name == "trainee")
            return $next($request);

        throw new UnauthorizedHttpException("Unauthorized");
    }
}
