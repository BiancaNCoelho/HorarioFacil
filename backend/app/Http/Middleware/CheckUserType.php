<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$types
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = $request->user(); // Obtém o usuário autenticado

        if ($user && in_array($user->tipo_usuario, $types)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized.'], 403);
    }
}
