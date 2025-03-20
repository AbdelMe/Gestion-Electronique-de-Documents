<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use Illuminate\Http\Request;
use App\Models\Service;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // DossierController.php
    public function index()
    {
        $dossiers = Dossier::with('service')->paginate(10); // 10 items per page
        return view('dossiers.index', compact('dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('dossiers.create', compact('services'));
    }

    public function store(StoreDossierRequest $request)
    {
        $request->validated(); // Ensure validation is done

        Dossier::create([
            'service_id' => $request->service_id,
            'dossier' => $request->dossier,
            'annee' => $request->annee
        ]);

        return redirect()->route('dossiers.index')->with('success', 'Dossier created successfully');
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
        $services = Service::all();
        return view('dossiers.edit', compact('dossier', 'services'));
    }

    public function update(UpdateDossierRequest $request, Dossier $dossier)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'dossier' => 'required|string|max:255',
            'annee' => 'required|numeric|min:2000|max:2100'
        ]);

        $dossier->update($validated);

        return redirect()->route('dossiers.index')
            ->with('success', 'Dossier mis à jour avec succès');
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
