<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Role, Permission};
use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Support\Facades\Gate;
use Jambasangsang\Flash\Facades\LaravelFlash;

class RoleController extends Controller
{


    public function index()
    {
        Gate::authorize('view_roles');
        $roles = Role::all();
        $permissions = Permission::all();

        return view('jambasangsang.backend.roles.index', compact('roles', 'permissions'));
    }


    public function create()
    {
        Gate::authorize('add_roles');
    }


    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('add_roles');

        if (Role::create($request->only('name'))) {
            LaravelFlash::withSuccess('Role Created Successfully');
        }
        return redirect()->back();
    }


    public function show($id)
    {
        Gate::authorize('view_roles');
    }


    public function edit($id)
    {
        Gate::authorize('edit_roles');
    }


    public function update(Request $request, Role $role)
    {
        Gate::authorize('edit_roles');

        if ($role->name === 'Admin') {
            $role->syncPermissions(Permission::all());
            return redirect()->route('roles.index');
        }

        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);
        LaravelFlash::withSuccess($role->name . ' permissions has been updated');

        return redirect()->route('roles.index');
    }


    public function destroy(Role $role)
    {
        Gate::authorize('delete_roles');

        if ($role->delete()) {
            LaravelFlash::withSuccess('Role Deleted Successfully');
        } else {
            LaravelFlash::withError('Role Fail to delete');
        }
        return redirect()->back();
    }
}
