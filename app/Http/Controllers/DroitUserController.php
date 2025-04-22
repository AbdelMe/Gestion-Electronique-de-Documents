<?php

namespace App\Http\Controllers;

use App\Models\DroitUser;
use App\Http\Requests\StoreDroitUserRequest;
use App\Http\Requests\UpdateDroitUserRequest;
use Spatie\Permission\Models\Permission;

class DroitUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDroitUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DroitUser $droitUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DroitUser $droitUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDroitUserRequest $request, DroitUser $droitUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DroitUser $droitUser)
    {
        //
    }
}
