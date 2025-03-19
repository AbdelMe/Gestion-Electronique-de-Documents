<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossiers = Dossier::all();
        return view('dossiers.index', compact('dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dossiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDossierRequest $request)
    {
        $dossier = Dossier::create($request->validated());
        return redirect()->route('dossiers.index')->with('success', 'Dossier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dossier $dossier)
    {
        return view('dossiers.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dossier $dossier)
    {
        return view('dossiers.edit', compact('dossier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDossierRequest $request, Dossier $dossier)
    {
        $dossier->update($request->validated());
        return redirect()->route('dossiers.index')->with('success', 'Dossier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dossier $dossier)
    {
        $dossier->delete();
        return redirect()->route('dossiers.index')->with('success', 'Dossier deleted successfully.');
    }
}
