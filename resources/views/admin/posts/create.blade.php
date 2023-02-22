<x-admin-master>

    @section('content')
        <h1>Create</h1>


        <form action="{{route('post.store')}}" method='post' enctype='multipart/form-data'>

            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name='title' class="form-control" id='' placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name='post_image' class="form-control-file" id='post_image' >
            </div>

            <div class="form-group">
            <textarea  class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-primary">Submit</button>
        </form>
    @endsection


</x-admin-master>