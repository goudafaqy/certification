<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthorizeInstructor
{

    public function handle($request, \Closure $next, $guard = null)
    {
        $role = Auth::user()->roles ? Auth::user()->roles[0] : null;
        if ($role && $role->name == "instructor")
            return $next($request);

        throw new UnauthorizedHttpException("Unauthorized");
    }
}
