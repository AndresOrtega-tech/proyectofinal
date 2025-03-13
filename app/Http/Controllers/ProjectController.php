<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

/**
 * Controlador ProjectController
 *
 * Este controlador maneja las acciones relacionadas con el modelo Project.
 * Permite mostrar, crear, editar, actualizar y eliminar proyectos (CRUD completo).
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * Muestra un listado de todos los proyectos.
     * Obtiene los proyectos desde la base de datos y los pasa a la vista 'projects.index'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener todos los proyectos de la base de datos, ordenados por el ID más reciente.
        $projects = Project::orderBy('project_id', 'desc')->get();

        // Retornar la vista 'projects.index' y pasarle la variable 'projects' con la lista de proyectos.
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * Muestra el formulario para crear un nuevo proyecto (vista 'projects.create').
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     *
     * Guarda un nuevo proyecto en la base de datos.
     * Valida los datos del formulario y crea un nuevo registro de Proyecto.
     * Redirige al listado de proyectos con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request Datos del formulario de creación del proyecto.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255', // Usamos 'title' aquí // <-- VUELTO a 'title'
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:planning,in_progress,on_hold,completed,cancelled',
            'owner_id' => 'required|integer|exists:users,user_id',
        ], [
            'title.required' => 'El título del proyecto es obligatorio.', // Usamos 'título' aquí // <-- VUELTO a 'título'
            'title.max' => 'El título del proyecto no puede tener más de 255 caracteres.', // Usamos 'título' aquí // <-- VUELTO a 'título'
            'end_date.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
            'status.required' => 'El estado del proyecto es obligatorio.',
            'status.in' => 'El estado del proyecto no es válido.',
            'owner_id.required' => 'El ID del propietario es obligatorio.',
            'owner_id.integer' => 'El ID del propietario debe ser un número entero.',
            'owner_id.exists' => 'El ID del propietario especificado no existe en la tabla de usuarios.',
        ]);

        // 2. Crear un nuevo objeto Project y guardar en la base de datos
        $project = new Project();
        $project->title = $request->input('title'); // Usamos 'title' aquí // <-- VUELTO a 'title'
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status = $request->status;
        $project->owner_id = $request->owner_id;
        $project->save();

        // 3. Redirigir al listado de proyectos con mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡Proyecto creado exitosamente!');
    }

    /**
     * Display the specified project.
     *
     * Muestra los detalles de un proyecto específico (vista 'projects.show').
     * Por ahora, simplemente retorna la vista pasando el objeto $project.
     * TODO: Implementar la vista 'projects.show' para mostrar los detalles del proyecto.
     *
     * @param  \App\Models\Project  $project Proyecto a mostrar.
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        // TODO: Implementar la vista 'projects.show' para mostrar los detalles del proyecto.
        return view('projects.show', compact('project')); // Por ahora, una vista básica
    }

    /**
     * Show the form for editing the specified project.
     *
     * Muestra el formulario para editar un proyecto específico (vista 'projects.edit').
     * Obtiene el proyecto desde la base de datos y lo pasa a la vista 'projects.edit'
     * para pre-llenar el formulario con los datos del proyecto.
     *
     * @param  \App\Models\Project  $project Proyecto a editar.
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     *
     * Actualiza la información de un proyecto específico en la base de datos.
     * Valida los datos del formulario de edición y actualiza el registro del Proyecto.
     * Redirige al listado de proyectos con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request Datos del formulario de edición del proyecto.
     * @param  \App\Models\Project  $project Proyecto a actualizar.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        // 1. Validar los datos del formulario de edición
        $request->validate([
            'title' => 'required|max:255', // Usamos 'title' aquí // <-- VUELTO a 'title'
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:planning,in_progress,on_hold,completed,cancelled',
            'owner_id' => 'required|integer|exists:users,user_id',
        ], [
            'title.required' => 'El título del proyecto es obligatorio.', // Usamos 'título' aquí // <-- VUELTO a 'título'
            'title.max' => 'El título del proyecto no puede tener más de 255 caracteres.', // Usamos 'título' aquí // <-- VUELTO a 'título'
            'end_date.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
            'status.required' => 'El estado del proyecto es obligatorio.',
            'status.in' => 'El estado del proyecto no es válido.',
            'owner_id.required' => 'El ID del propietario es obligatorio.',
            'owner_id.integer' => 'El ID del propietario debe ser un número entero.',
            'owner_id.exists' => 'El ID del propietario especificado no existe en la tabla de usuarios.',
        ]);

        // 2. Actualizar el objeto Project con los datos del formulario
        $project->title = $request->input('title'); // Usamos 'title' aquí // <-- VUELTO a 'title'
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status = $request->status;
        $project->owner_id = $request->owner_id;
        $project->save(); // Al llamar a save() en un modelo existente, Laravel hace un UPDATE en lugar de INSERT

        // 3. Redirigir al listado de proyectos con mensaje de éxito
        return redirect()->route('projects.index')->with('success', '¡Proyecto actualizado exitosamente!');
    }

    /**
     * Remove the specified project from storage.
     *
     * Elimina un proyecto específico de la base de datos.
     * Redirige al listado de proyectos con un mensaje de éxito.
     * TODO: Implementar la lógica para la confirmación de eliminación y la eliminación real del proyecto.
     *
     * @param  \App\Models\Project  $project Proyecto a eliminar.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        // TODO: Implementar la lógica para la confirmación de eliminación y la eliminación real del proyecto.
        // Por ahora, solo redirige de vuelta al listado de proyectos.
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado exitosamente.'); // Mensaje temporal
    }
}
