<x-app-layout>
    @section('title','sb Edit')
    @section('main')
    <div class="container">
        <h4 class="text-center">
            Edit Post
        </h4>
        <div class="row">
            <div class="col-md-8 offset-2">
                <form action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <lable class="form-label">Category</lable>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($category as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $post->category_id ? 'selected' : ''  }}>{{ $data->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid
                            @enderror" name="title" placeholder="Title" value="{{ $post->title }}">
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('subTitle') is-invalid
                            @enderror" name="subTitle" placeholder="Sub Title" value="{{ $post->subTitle }}">
                            @error('subTitle')
                                <span class="text-dagner">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descriptions</label>
                            <textarea name="descriptions" class="form-control @error('descriptions') is-invalid
                            @enderror" id="summernote1" cols="20" rows="5" placeholder="Descriptions">
                            {{ $post->descriptions }}
                            </textarea>
                            @error('descriptions')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid

                            @enderror">
                            @error('image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Status
                            </label>
                            <input type="radio" {{ $post->status == 1 ? 'checked' : '' }} class="" name="status" value="1">Active
                            <input type="radio" {{ $post->status == 0 ? 'checked' : '' }} class="" name="status" value="0">Inactive
                        </div>
                        <img src="{{ asset('storage/posts_image/'.$post->image) }}" alt="" height="100" width="100">
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Post Update">
                        </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
    <script>
        // summernote
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
    </script>
    @endpush
    @endsection
</x-app-layout>
