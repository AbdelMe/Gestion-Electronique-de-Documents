<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use App\Http\Requests\StoreRubriqueRequest;
use App\Http\Requests\UpdateRubriqueRequest;
use App\Models\TypeDocument;
use App\Models\TypeRubrique;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rubriques = Rubrique::paginate(5);
        return view('rubrique.index',compact('rubriques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_documents = TypeDocument::all();
        $type_rubrique = TypeRubrique::all();
        return view('rubrique.create',compact('type_documents','type_rubrique'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = DB::table('type_rubriques')->find($request->type_rubrique_id);
        $type1 = $type->TypeRubrique;
        // dd($type->TypeRubrique);
        Rubrique::create([
            'type_rubrique_id' => $request->type_rubrique_id,
            'type_document_id' => $request->type_document_id,
            'Rubrique' => $request->Rubrique,
            'Valeur' => $type1,
            'Obligatoire' => $request->Obligatoire,
        ]);
        return to_route('rubrique.index')->with('Added','Rubrique Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rubrique $rubrique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rubrique $rubrique)
    {
        $type_documents = TypeDocument::all();
        $type_rubrique = TypeRubrique::all();
        return view('rubrique.edit',compact('rubrique','type_documents','type_rubrique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rubrique $rubrique)
    {
        $rubrique->update($request->all());
        return to_route('rubrique.index')->with('updated','Rubrique updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rubrique $rubrique)
    {
        try{
            $rubrique->delete();
            return to_route('rubrique.index')->with('deleted','Rubrique deleted successfully!');
        }catch(QueryException){
            return to_route('rubrique.index')->with('warning','Impossible de supprimer ce Rubrique car il est lié à autres données.');
        }
    }
}
