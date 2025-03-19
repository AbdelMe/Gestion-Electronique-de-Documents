<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use App\Http\Requests\StoreTypeDocumentRequest;
use App\Http\Requests\UpdateTypeDocumentRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_documents = TypeDocument::paginate(5);
        return view('type_documents.index',compact('type_documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TypeDocument::create($request->all());
        return redirect()->route('type_documents.index')->with('Added', 'Type added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeDocumentRequest $request, TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeDocument $typeDocument)
    {
        try{
            $typeDocument->delete();
            return to_route('type_documents.index')->with('deleted','Type Document deleted successfuly');
        }catch(QueryException){
                return to_route('type_documents.index')->with('warning',"Impossible de supprimer ce Type car il est lié à autres données.");
        }
    }
}
