<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
        public function create()
        {
            return view('auth.register');
        }

        // Manejar el registro de un nuevo usuario
        public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // Asegúrate de que el nombre sea obligatorio
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name, // Aquí se envía el nombre
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Enviar correo de bienvenida
        Mail::raw('¡Bienvenido a nuestra aplicación, ' . $user->name . '!', function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Bienvenido');
        });

        // Redirigir con un mensaje de éxito
        return redirect()->route('register.create')->with('success', 'Usuario registrado y correo enviado.');
    }
}
