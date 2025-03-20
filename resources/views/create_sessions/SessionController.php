<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('create_sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('create_sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required'
        ]);

        Session::create($request->all());
        return redirect()->route('create_sessions.index')->with('success', 'Sesión creada correctamente');
    }

    public function show(Session $session)
    {
        return view('create_sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        return view('create_sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required'
        ]);

        $session->update($request->all());
        return redirect()->route('create_sessions.index')->with('success', 'Sesión actualizada correctamente');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('create_sessions.index')->with('success', 'Sesión eliminada correctamente');
    }
}