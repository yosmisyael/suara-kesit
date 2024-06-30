<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowAuthenticatedAdminOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->check();

        $admin = auth('admin')->check();

        if (!$user && !$admin) {
            abort(403);
        }

        return $next($request);
    }
}
