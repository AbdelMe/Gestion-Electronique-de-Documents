<?php

namespace App\Http\Controllers;

use App\Models\TypeRubrique;
use App\Http\Requests\StoreTypeRubriqueRequest;
use App\Http\Requests\UpdateTypeRubriqueRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TypeRubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_rubrique = TypeRubrique::paginate(5);
        return view('type_rubrique.index',compact('type_rubrique'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_rubrique.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRubriqueRequest $request)
    {
        $request->validated();
        TypeRubrique::create($request->all());
        return to_route('type_rubrique.index')->with('Added','Type Rubrique Added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeRubrique $typeRubrique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeRubrique $typeRubrique)
    {
        return view('type_rubrique.edit',compact('typeRubrique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRubriqueRequest $request, TypeRubrique $typeRubrique)
    {
        $request->validated();
        $typeRubrique->update($request->all());
        return to_route('type_rubrique.index')->with('updated','Type Rubrique updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeRubrique $typeRubrique)
    {
        try{
            $typeRubrique->delete();
            return to_route('type_rubrique.index')->with('deleted','Type Rubrique deleted successfuly');
        }catch(QueryException){
            return to_route('type_rubrique.index')->with('warning',"Impossible de supprimer ce Type car il est lié à autres données.");
        }
    }
}
