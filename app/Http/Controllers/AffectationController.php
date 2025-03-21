<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affectations = Affectation::all();
        return view('affectations.index', compact('affectations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('affectations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Affectation::create($request->all());

        return redirect()->route('affectations.index')->with('success', 'Affectation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Affectation $affectation)
    {
        return view('affectations.show', compact('affectation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Affectation $affectation)
    {
        return view('affectations.edit', compact('affectation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Affectation $affectation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $affectation->update($request->all());

        return redirect()->route('affectations.index')->with('success', 'Affectation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Affectation $affectation)
    {
        $affectation->delete();
        return redirect()->route('affectations.index')->with('success', 'Affectation deleted successfully.');
    }
}
