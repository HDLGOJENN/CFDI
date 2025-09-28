<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function showLogin()
    {
        // Si ya está autenticado, redirigir a vista general
        if (Auth::check()) {
            return redirect('/vistageneral');
        }
        
        return view('login');
    }

    /**
     * Procesar el login
     */
    public function login(Request $request)
    {
        // Validar credenciales
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Intentar autenticación
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            // Regenerar sesión para prevenir fixation attacks
            $request->session()->regenerate();
            
            // Redirigir a vista general
            return redirect()->intended('/vistageneral');
        }

        // Si falla la autenticación
        return back()->withErrors([
            
            'username' => 'Las credenciales proporcionadas no son válidas.',
        ])->onlyInput('username');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Método opcional: crear usuario de prueba (eliminar después)
     */
   
}