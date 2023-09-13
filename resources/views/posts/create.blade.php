<x-app-layout>
    @section('title','SB Post Create')
    @section('main')
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-3">
                   <h4 class="text-center">
                       Post Create
                   </h4>
                   <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <lable class="form-label">Category</lable>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid
                            @enderror" name="title" placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('subTitle') is-invalid
                            @enderror" name="subTitle" placeholder="Sub Title" value="{{ old('subTitle') }}">
                            @error('subTitle')
                                <span class="text-dagner">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descriptions</label>
                            <textarea name="descriptions" class="form-control @error('descriptions') is-invalid
                            @enderror" id="summernote" cols="20" rows="5" placeholder="Descriptions"></textarea>
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
                            <input type="radio" class="" name="status" value="1">Active
                            <input type="radio" class="" name="status" value="0">Inactive
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Post Create">
                        </div>
                    </form>
               </div>
           </div>
       </div>
       @push('script')
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();
                });
            </script>
       @endpush
    @endsection
</x-app-layout>
