<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Database\QueryException;

class DossierController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
    // DossierController.php
    public function index()
    {
        $dossiers = Dossier::with('service')->paginate(5); 
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
        // dd($request);
        $request->validated();

        Dossier::create([
            'service_id' => $request->service_id,
            'Dossier' => $request->Dossier,
            'Annee' => $request->Annee
        ]);

        return to_route('dossiers.index')->with('Added', 'Dossier created successfully');
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
        // dd($request);
        $validated = $request->validated();

        $dossier->update($validated);

        return redirect()->route('dossiers.index')
            ->with('updated', 'Dossier mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dossier $dossier)
    {
        try{
            $dossier->delete();
            return redirect()->route('dossiers.index')->with('deleted', 'Dossier deleted successfully.');
    
            }catch(QueryException){
                return to_route('dossiers.index')->with('warning',"Impossible de supprimer ce Dossier car il est lié à autres données.");
            }
    }
}
