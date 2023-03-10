<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //

    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all(),

        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('_'),
        ]);

        return back();
    }

    public function destroy(Role $role)
    {
        // dd($role);
        $role->delete();

        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Role $role)
    {
        $role->name = Str::ucfirst(request('name'));

        $role->slug = Str::of(request('slug'))->slug('_');

        $role->save();

        return back();
    }

    public function attach_permission(Role $role)
    {
        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detach_permission(Role $role)
    {
        $role->permissions()->detach(request('permission'));

        return back();
    }
}
