<x-admin-master>
    @section('content')
        <h1>Permissions</h1>


        <div class="row">
                <form method="POST" action="{{ route('permission.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id='name' name="name" type="text" class="form-control">
                    
                    <div>
                        @error('name')
                            <span><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    
                    </div>



                    <button class="btn btn-black"type="submit">Create</button>
                </form>
        </div>

        <div class="col-sm-9">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing='0'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td><a href="{{route('permission.edit', $permission->id)}}">{{ $permission->name }}</a></td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <form method="POST" action="{{route('permission.destroy', $permission)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    @endsection

</x-admin-master>