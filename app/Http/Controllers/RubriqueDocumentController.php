<?php

namespace App\Http\Controllers;

use App\Models\RubriqueDocument;
use App\Http\Requests\StoreRubriqueDocumentRequest;
use App\Http\Requests\UpdateRubriqueDocumentRequest;
use App\Models\Document;
use App\Models\Rubrique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RubriqueDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $documents = Document::all();
        // $rubriques = Rubrique::all();
        $rubs_docs = RubriqueDocument::paginate(5);
        return view('rubrique_document.index', compact('rubs_docs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documents = Document::all();
        $rubriques = Rubrique::all();
        return view('rubrique_document.create',compact('documents','rubriques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRubriqueDocumentRequest $request)
    {
        $request->validated();
        $rub = DB::table('rubriques')->find($request->rubrique_id);
        // $doc = DB::table('documents')->find($request->document_id);
        // dd($doc);
        RubriqueDocument::create([
            'rubrique_id' => $request->rubrique_id,
            'Valeur' => $rub->Valeur,
            'document_id' => $request->document_id
        ]);
        return to_route('rubrique_document.index')->with('Added','Rubrique Document Added successfully!');
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
        $documents = Document::all();
        $rubriques = Rubrique::all();
        return view('rubrique_document.edit',compact('rubriqueDocument','documents','rubriques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRubriqueDocumentRequest $request, RubriqueDocument $rubriqueDocument)
    {
        $request->validated();
        $rubrique = DB::table('rubriques')->find($request->rubrique_id);

        $rubriqueDocument->update([
            'rubrique_id' => $request->rubrique_id,
            'Valeur' => $rubrique->Valeur,
            'document_id' => $request->document_id
        ]);
        // dd($rubriqueDocument);
        return to_route('rubrique_document.index')->with('updated','Rubrique Document updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RubriqueDocument $rubriqueDocument)
    {
        $rubriqueDocument->delete();
        return to_route('rubrique_document.index')->with('deleted','Rubrique Document deleted successfully!');
    }
}
