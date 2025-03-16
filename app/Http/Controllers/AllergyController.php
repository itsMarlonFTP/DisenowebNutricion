<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergies = Allergy::all();
        return view('allergies.index', compact('allergies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('allergies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'allergy' => 'required|string|max:255',
            'severity' => 'required|string|max:255',
        ]);
    
        Allergy::create($validatedData);
        return redirect()->route('allergies.index')->with('success', 'Alergia registrada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $allergy = Allergy::findOrFail($id);
        return view('allergies.show', compact('allergy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allergy = Allergy::findOrFail($id);
        return view('allergies.edit', compact('allergy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'allergy' => 'required|string|max:255',
            'severity' => 'required|string|max:255',
        ]);
    
        $allergy = Allergy::findOrFail($id);
        $allergy->update($validatedData);
        return redirect()->route('allergies.index')->with('success', 'Alergia actualizada exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $allergy = Allergy::findOrFail($id);
    $allergy->delete();
    return redirect()->route('allergies.index')->with('success', 'Alergia eliminada exitosamente');
    }
    
}
