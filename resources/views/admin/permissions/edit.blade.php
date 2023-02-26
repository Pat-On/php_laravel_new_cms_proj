<x-admin-master>
    @section('content')
        <h1>Edit role: {{ $permission->name }}</h1>


        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{ route('permission.update', $permission) }}">
                    @csrf
                    @method('put')

                    <div class="form-group">

                        <label for="name"></label>
                        <input type="text" value="{{ $permission->name }}" name="name" id="namne">


                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12">
                @if ($permissions->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing='0'>
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr class="">
                                        <td><input type="checkbox"
                                                @foreach ($role->permissions as $role_permission)
                                            @if ($role_permission->slug == $permission->slug)
                                                checked
                                            @endif @endforeach>
                                        </td>
                                        <td> {{ $permission->id }} </td>
                                        <td>
                                            {{ $permission->name }}
                                        </td>
                                        <td>
                                            {{ $permission->slug }}
                                        </td>
                                        <td>
                                            <form action="{{ route('role.permission.attach', $role) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" value="{{ $permission->id }}" name="permission">

                                                <button
                                                    class="btn btn-primary
                                                    
                                                                 
                                                    @if ($role->permissions->contains($permission)) disabled @endif
                                                    
                                                    ">Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('role.permission.detach', $role) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" value="{{ $permission->id }}" name="permission">

                                                <button
                                                    class="btn btn-primary
                                                    
                                                                 
                                                    @if (!$role->permissions->contains($permission)) disabled @endif
                                                    
                                                    ">Detach</button>
                                            </form>
                                        </td>

                                        <td>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Option</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                @endif
            </div>

        </div> --}}
    @endsection
</x-admin-master>
