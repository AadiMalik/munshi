<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        $obj = $request->all();
        $role = Role::create($obj);
        return redirect('roles')->with('success', 'Role Created!');
    }
    public function edit($id)
    {
        $roles = Role::find($id);
        return view('roles.edit', compact('roles'));
    }
    public function update(Request $request, $id)
    {
        $obj = $request->all();
        unset($obj['_token']);
        unset($obj['_method']);
        $role = Role::where('id', $id)->update($obj);
        return redirect('roles')->with('success', 'Role Updated!');
    }
}
