<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Http\Requests\StoreEtatRequest;
use App\Http\Requests\UpdateEtatRequest;
use App\Models\Document;
use App\Models\Entreprise;

class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::paginate(5);
        $entreprise = Entreprise::all();
        $etats = Etat::all();
        return view('etats.index', compact('documents','entreprise','etats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(StoreEtatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Etat $etat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etat $etat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtatRequest $request, Etat $etat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etat $etat)
    {
        //
    }
}
