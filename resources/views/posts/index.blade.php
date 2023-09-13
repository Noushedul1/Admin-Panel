<x-app-layout>
    @section('title','Sb Post View')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                {{-- @if (Session::has('postStore'))
                   <h4 class="text-center text-success">
                       {{ Session::get('postStore') }}
                   </h4>
                   @elseif (Session::has('updatePost'))
                   <h4 class="text-center text-success">
                        {{ Session::get('updatePost') }}
                    </h4>
                    @elseif (Session::has('deletePost'))
                    <h4 class="text-center text-success">
                        {{ Session::get('deletePost') }}
                    </h4>
                @endif --}}
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->category }}</td>
                            <td>
                                <a href="" class="btn btn-sm {{ $post->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                    {{ $post->status == 1 ? "Active" : "Inactive" }}
                                </a>
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>

                                <img src="{{ asset('/storage/posts_image/'.$post->image )}}" height="100" width="100" alt="">
                                {{-- start for testing --}}
                                {{-- <img src="{{ $post->image }}" height="100" width="100" alt=""> --}}
                                {{-- end for testing  --}}
                            </td>
                            <td>
                                {{-- step 1 authorize  --}}

                                {{-- @if (auth()->user()->id == 1)
                                <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('post.show',['id'=>$post->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <form action="{{ route('post.destroy',['id'=>$post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                @else
                                <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('post.show',['id'=>$post->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                @endif --}}
                                {{-- step 2 authorize  --}}
                                @can('update',$post)
                                <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('view',$post)
                                <a href="{{ route('post.show',['id'=>$post->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                @endcan
                                {{-- <a href="" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a> --}}
                                @can('delete',$post)
                                <form action="{{ route('post.destroy',['id'=>$post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>
    </div>
    @push('script')
    <script>
        @if (Session::has('postStore'))
            toastr.options = {
                'progressBar': true,
                'closeBar': true
            }
            toastr.success("{{ Session::get('postStore') }}",'Create',{timeOut:1000});
            @elseif (Session::has('updatePost'))
            toastr.options = {
                'progressBar': true,
                'closeBar': true
            }
            toastr.info("{{ Session::get('updatePost') }}",'Update',{timeOut:1000});
            @elseif (Session::has('deletePost'))
            toastr.options = {
                'progressBar':true,
                'closeBar':true
            }
            toastr.error("{{ Session::get('deletePost') }}",'Delete',{timeOut:1000});
        @endif
        // datatable
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    @endpush
    @endsection
</x-app-layout>
