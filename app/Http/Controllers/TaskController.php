<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Muestra la lista de tareas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Muestra el formulario para crear una nueva tarea
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    // Almacena una nueva tarea
    public function store(Request $request)
    {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'project_id' => 'required|exists:projects,project_id',
    ]);
    
    try {
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
    }




    // Muestra una tarea específica
    public function show($task_id)
    {
        return view('tasks.show', compact('task'));
    }

    // Muestra el formulario para editar una tarea
    public function edit($task_id)
    {
        return view('tasks.edit', compact('task'));
    }

    // Actualiza una tarea existente
    public function update(Request $request, $task_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    // Elimina una tarea existente
    public function destroy($task_id)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}
