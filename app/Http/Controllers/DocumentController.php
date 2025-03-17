<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Dossier;
use App\Models\TypeDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::paginate(5);
        return view('documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();
        return view('documents.edit',compact('document','typeDocuments','dossiers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $document->update($request->all());
        return redirect()->route('documents.index')->with('updated', 'Document updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('deleted', 'Document deleted successfully!');
    }
}
