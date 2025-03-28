<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Entreprise;
use Illuminate\Database\QueryException;

class ClasseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::paginate(5);
        return view('classe.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClasseRequest $request)
    {
        // dd($request);
        $request->validated();
        Classe::create([
            'classe' => $request->classe
        ]);
        return redirect()->route('classe.index')->with('Added', 'Classe added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        return view('classe.edit',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        $request->validated();
        $classe->update(
            [
                'classe' => $request->classe
            ]
        );
        return redirect()->route('classe.index')->with('updated', 'classe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {

        try{
        $classe->delete();
        return redirect()->route('classe.index')->with('deleted', 'Classe deleted successfully!');
    
            }catch(QueryException){
                return to_route('classe.index')->with('warning',"Impossible de supprimer ce Classe car il est lié à autres données.");
            }
    }
}
