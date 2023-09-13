<x-app-layout>
    @section('title','Category')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h4 class="text-center">Category Create</h4>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input
                        type="text" class="form-control @error('category') is-invalid
                        @enderror" name="category" value="{{ old('category') }}" placeholder="Category Name" value="{{ old('category') }}">
                        @error('category')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category Details</label>
                        <input type="text" class="form-control @error('categoryDetails') is-invalid
                        @enderror" name="categoryDetails" value="{{ old('categoryDetails') }}" placeholder="Category Details" value="{{ old('categoryDetails') }}">
                        @error('categoryDetails')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Category Create" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
