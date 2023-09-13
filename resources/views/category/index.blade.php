<x-app-layout>
    @section('title','Category')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h4 class="text-center">
                    Category
                </h4>
                @if (Session::has('categoryCreate'))
                <h4 class="text-center text-success">
                    {{ Session::get('categoryCreate') }}
                </h4>
                @elseif(Session::has('updateCategory'))
                <h4 class="text-center text-success">
                    {{ Session::get('updateCategory') }}
                </h4>
                @elseif(Session::has('deleteCategory'))
                <h4 class="text-center text-danger">
                    {{ Session::get('deleteCategory') }}
                </h4>
                @endif
                <table id="myTable2" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Category Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->categoryDetails }}</td>
                                <td>
                                    <a href="{{ route('category.edit',['category'=>$category->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('category.destroy',['category'=>$category->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
    @push('script')
    <script>
        $(document).ready( function () {
            $('#myTable2').DataTable();
        } );
    </script>
    @endpush
    @endsection
</x-app-layout>
