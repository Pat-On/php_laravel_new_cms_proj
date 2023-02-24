<x-admin-master>

    @section('content')
    {{-- {{dd($user)}} --}}
        <h1>User Profile: {{$user->name}} </h1>

        <div class="row">

            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-4 mt-4">
                        <img width="60px" height='60px'class="img-profile rounded-circle" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>



                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name='username' id='username' value='{{$user->username}}' class="form-control {{$errors->has('username') ? ' alert-danger' : ''}}">
                        @error('username')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name='name' id='name' value='{{$user->name}}' class="form-control @error('name') alert-danger @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name='email' id='email' value='{{$user->email}}' class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="passsword" name='password' id='password'  class="form-control">
                        @error('passsword')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="passsword" name='passsword_confirmation' id='passsword_confirmation'  class="form-control">
                        @error('passsword_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <button type='submit' class="btn btn-primary">Submit</button>
                
                </form>
            </div>

        </div>
    @endsection

</x-admin-master>