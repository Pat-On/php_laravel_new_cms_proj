<x-admin-master>

    @section('content')
        <h1>Edit a Post</h1>


        <form action="{{ route('post.update', $post->id) }}" method='post' enctype='multipart/form-data'>

            @csrf
            @method('PATCH')

            <div class="form-group">

                <label for="title">Title</label>
                <input type="text" name='title' class="form-control" id='' placeholder="Enter title"
                    value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <div><img height="100px" src="{{ $post->post_image }}" alt=""></div>
                <input type="file" name='post_image' class="form-control-file" id='post_image'>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    @endsection


</x-admin-master>
