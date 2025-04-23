<?php

namespace App\Http\Controllers;

use App\Models\Droit;
use App\Http\Requests\StoreDroitRequest;
use App\Http\Requests\UpdateDroitRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DroitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permitions = Permission::all();
        return view('permitions.index',compact('permitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('permitions.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDroitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Droit $droit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Droit $droit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDroitRequest $request, Droit $droit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Droit $droit)
    {
        //
    }
}
