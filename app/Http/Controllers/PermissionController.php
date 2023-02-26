<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' => Permission::all(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('_'),
        ]);

        return back();
    }

    public function edit(Permission $permission)
    {
        // dd($permission->id);

        return view('admin.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back();
    }

    public function update(Permission $permission)
    {
        // $permission->name = Str::ucfirst(request('name'));

        // $permission->slug = Str::of(request('slug'))->slug('_');

        // $permission->save();

        $permission->update([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(request('name'))->slug('_'),
        ]);

        return back();
    }
}
