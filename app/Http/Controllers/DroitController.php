<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class DroitController extends Controller
{
    public function index()
    {
        $permitions = Permission::paginate(8);
        return view('permitions.index', compact('permitions'));
    }

    public function create()
    {
        return view('permitions.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
        ]);
        return redirect()->route('permitions.index')->with('Added', 'Permission added successfully!');;
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permition)
    {
        return view('permitions.edit', compact('permition'));
    }

    public function update(Request $request, Permission $permition)
    {
        $permition->update($request->all());
        return redirect()->route('permitions.index')->with('updated', 'Permission updated successfully!');;
    }

    public function destroy(Permission $permition)
    {
        $permition->delete();
        return redirect()->route('permitions.index')->with('deleted', 'Permission deleted successfully!');;
    }
}
