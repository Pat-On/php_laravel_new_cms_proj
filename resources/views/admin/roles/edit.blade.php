<x-admin-master>
    @section('content')
        <h1>Edit role: {{$role->name}}</h1>

        <form method="POST" action="{{route('role.update', $role)}}">
            @csrf
            @method('put')
            
            <div class="form-group">

                <label for="name"></label>
                <input type="text" value="{{$role->name}}" name="name" id="namne">
            
            
            </div>
                <button class="btn btn-primary">Update</button>
    </form>
    @endsection=
</x-admin-master>