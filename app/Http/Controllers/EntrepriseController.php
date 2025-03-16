<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprise::paginate(3);
        return view('entreprise.index', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntrepriseRequest $request)
    {
        // dd($request);
        $validated = $request->validated();

        Entreprise::create($validated);

        return redirect()->route('entreprise.index')->with('success', 'Entreprise added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        return view('entreprise.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntrepriseRequest $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
