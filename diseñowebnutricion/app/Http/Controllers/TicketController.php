<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('user')->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $ticket = Ticket::create([
            'user_email' => auth()->user()->email,
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket creado exitosamente.');
    }

    public function edit(Ticket $ticket)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('tickets.index')->with('error', 'No tienes permisos para editar tickets.');
        }
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('tickets.index')->with('error', 'No tienes permisos para actualizar tickets.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $ticket->update($validated);

        return redirect()->route('tickets.index')->with('success', 'Ticket actualizado exitosamente.');
    }

    public function destroy(Ticket $ticket)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('tickets.index')->with('error', 'No tienes permisos para eliminar tickets.');
        }

        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado exitosamente.');
    }
} 