<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\User;
use App\Models\Project;

class MembershipController extends Controller
{
    /**
     * Muestra el formulario para crear una nueva membresía.
     */
    public function create()
    {
        // Obtener todos los usuarios y proyectos para los dropdowns
        $users = \App\Models\User::all();
        $projects = \App\Models\Project::all();

        return view('memberships.create', compact('users', 'projects'));
    }

    /**
     * Almacena una nueva membresía en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'project_id' => 'required|exists:projects,project_id',
            'role' => 'nullable|string|max:255',
            'joined_at' => 'nullable|date',
        ]);

        // Crear la membresía
        Membership::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('memberships.create')->with('success', 'Membresía creada exitosamente.');
    }

    public function edit($id)
    {
        // Buscar la membresía por su ID
        $membership = Membership::findOrFail($id);

        // Retornar la vista de edición con los datos de la membresía
        return view('memberships.edit', compact('membership'));
    }
}
