<?php

namespace App\Http\Controllers;

use App\Models\RubriqueDocument;
use App\Http\Requests\StoreRubriqueDocumentRequest;
use App\Http\Requests\UpdateRubriqueDocumentRequest;
use App\Models\Document;
use App\Models\Rubrique;

class RubriqueDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $documents = Document::all();
        // $rubriques = Rubrique::all();
        $rubs_docs = RubriqueDocument::all();
        return view('rubrique_document.index',compact('rubs_docs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRubriqueDocumentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RubriqueDocument $rubriqueDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RubriqueDocument $rubriqueDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRubriqueDocumentRequest $request, RubriqueDocument $rubriqueDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RubriqueDocument $rubriqueDocument)
    {
        //
    }
}
