<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-3">
                <form method="POST" action="{{ route('role.store') }}">
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
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td><a href="{{route('role.edit', $role->id)}}">{{ $role->name }}</a></td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <form method="POST" action="{{route('role.destroy', $role)}}">
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
        </div>
    @endsection

</x-admin-master>
