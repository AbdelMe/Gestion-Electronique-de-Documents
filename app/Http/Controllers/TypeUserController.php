<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use App\Http\Requests\StoreTypeUserRequest;
use App\Http\Requests\UpdateTypeUserRequest;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'))->with('Added', 'Role Added successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('roles.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        // $user = User::find($request->user_id);

        // $user->assignRole($role);
        // $roles = Role::all();

        return to_route('roles.index')->with('Added', 'Role Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeUser $typeUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeUser $typeUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeUserRequest $request, TypeUser $typeUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $roles = Role::all();
        return view('roles.index', compact('roles'))->with('deleted', 'Role deleted successfully!');
        // dd($role);
    }

    public function assignRole()
    {
        // dd('ff');
        $roles = Role::all();
        return view('assignRole',compact('roles'));
    }
    public function assignRoleStore(){

    }
}
