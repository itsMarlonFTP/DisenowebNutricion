<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (!auth()->check()) {
                Log::warning('Usuario no autenticado intentó acceder a ruta de administrador');
                return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
            }

            $user = auth()->user();
            Log::info('Usuario intentando acceder a ruta de administrador', [
                'user_id' => $user->userID,
                'role' => $user->role
            ]);

            if ($user->role !== 'admin') {
                Log::warning('Usuario no administrador intentó acceder a ruta de administrador', [
                    'user_id' => $user->userID,
                    'role' => $user->role
                ]);
                return redirect()->back()->with('error', 'No tienes permisos de administrador.');
            }

            return $next($request);
        } catch (\Exception $e) {
            Log::error('Error en AdminMiddleware', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Ocurrió un error al verificar los permisos.');
        }
    }
} 