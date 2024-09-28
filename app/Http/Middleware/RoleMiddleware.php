<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario tiene uno de los roles requeridos
        foreach ($roles as $role) {
            if ($user->roles()->where('name', $role)->exists()) {
                return $next($request);
            }
        }

        // Redirigir si el acceso es denegado
        return redirect()->route('home')->withErrors(['error' => 'No tienes acceso a esta sección.']);
    }
}
