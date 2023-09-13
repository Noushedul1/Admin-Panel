<x-app-layout>
    @section('title','Post Details')
    @section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 card">
                <h1 class="text-center card-header">Post Details</h1>
                {{-- <img src="{{ asset('storage/posts_image/'.$post->image) }}" alt="" class="card-img-top" height="300"> --}}
                {{-- testing  --}}
                <img src="{{ $post->image }}" alt="" class="card-img-top" height="300">
                {{-- testing --}}
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $post->title }} {{ $post->created_at->format('d/m/y') }}
                    </h5>
                    <div class="card-subtitle my-4">
                        {{ $post->subTitle }}
                    </div>
                    <div class="card-text my-4">
                        {!! $post->descriptions !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
