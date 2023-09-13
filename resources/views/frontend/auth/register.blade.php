<x-frontend-layout>
    @section('title','Registration')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 my-4">
                <h4 class="text-center">Registration</h4>
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid

                        @enderror" placeholder="Enter Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid

                        @enderror" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid

                        @enderror">
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="text" name="password_confirmation" class="form-control @error('password') is-invalid

                        @enderror">
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register" class="btn btn-primary">
                    </div>
                </form>
                @if (Route::has('user.login'))
                <a href="{{ route('user.login') }}" class="btn btn-primary">Login</a>
                @endif
            </div>
        </div>
    </div>
    @endsection
</x-frontend-layout>
