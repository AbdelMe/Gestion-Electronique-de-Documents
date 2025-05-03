<?php

namespace App\Http\Controllers;

use App\Models\DroitUser;
use App\Http\Requests\StoreDroitUserRequest;
use App\Http\Requests\UpdateDroitUserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DroitUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(5);
        return view('user_permissions.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function assignPermitionsToRole()
    {
        // $roles = Role::all();
        // $permissions = Permission::all();
        // $assignedPermissions = $role->permissions->pluck('id')->toArray();
        return view('user_permissions.assignPermitionsToRole', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'selectedRole' => null
        ]);
    }
    public function storeAssignPermitionsToRole(Request $request)
    {
        // dd($request->role_id);
        $role = Role::findOrFail($request->role_id);
        foreach ($request->permissions as $key => $permission) {
            $perm = Permission::where('id', $permission)->get();
            $role->givePermissionTo($perm);
        }
        // $role->syncPermissions($request->permissions ?? []);
        // $allPermissions = $role->getAllPermissions();

        // dd($allPermissions);
    }
    public function editRolePermissions(Role $role)
    {
        $permissions = Permission::all()->groupBy('guard_name');
        return view('user_permissions.editRolePermissions', compact('role', 'permissions'));
    }


    public function updateRolePermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $permissions = Permission::whereIn('id', $request->permissions ?? [])->get();

        $role->syncPermissions($permissions);

        return back()->with('success', 'Permissions updated.');
    }

    public function deletePermition(Role $role, Permission $permission)
    {
        // dd($permission);
        $role->revokePermissionTo($permission);
        return back()->with('success', 'Permissions Revoked.');
    }

    public function revokeAllPermissions(Role $role)
    {
        $role->syncPermissions([]);

        return redirect()->back()
            ->with('success', 'All permissions revoked successfully');
    }
}
