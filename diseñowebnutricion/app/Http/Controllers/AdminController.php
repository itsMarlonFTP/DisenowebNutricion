<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function toggleAdmin()
    {
        $user = Auth::user();
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 
            $user->role === 'admin' ? 'Modo administrador activado.' : 'Modo administrador desactivado.');
    }
} 