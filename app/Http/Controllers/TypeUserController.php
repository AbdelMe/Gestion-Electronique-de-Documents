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
        $role = Role::firstOrCreate(['name' => $request->name]);
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
        return view('assignRole', compact('roles'));
    }
    public function assignRoleStore(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $role = Role::findOrFail($request->role_id);
        $user = User::findOrFail($request->user_id);
        $user->assignRole($role);
        session()->flash('success', 'Role assigned successfully!');
        return redirect()->route('roles.index');
    }
    public function revokeRoleIndex()
    {
        $roles = Role::all();
        return view('roles.revokeRole', compact('roles'));
    }
    public function revokeRoleDelete(User $user, Role $role)
    {
        $user->removeRole($role->name); // or use $role->id with custom logic
        return back()->with('success', 'Role revoked successfully.');
    }

    public function bulkRevoke(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
        ]);

        $users = User::whereIn('id', $request->user_ids)->get();

        foreach ($users as $user) {
            $role = $user->roles()->first();
            if ($role) {
                $user->removeRole($role->name);
            }
        }

        return redirect()->back()->with('success', 'Roles revoked from selected users.');
    }
}
