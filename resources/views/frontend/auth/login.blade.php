<x-frontend-layout>
    @section('title','Login')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 my-4">
                <h4 class="text-center">
                    Login
                </h4>
                <form action="{{ route('loginCheck') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <lable class="form-label">Email</lable>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <lable class="form-label">Password</lable>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
                <a href="{{ route('registerShow') }}" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
    @endsection
</x-frontend-layout>
