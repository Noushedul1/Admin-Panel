<x-frontend-layout>
    @section('title','Home')
    @section('main')
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Page Heading
                  <small>Secondary Text</small>
                </h1>

                <!-- Blog Post -->
                @foreach ($posts as $post)
                <div class="card mb-4">
                  <img class="card-img-top" height="100" width="100" src="{{ asset('/storage/posts_image/'.$post->image )}}"" alt="Card image cap">
                  {{-- testing --}}
                  {{-- <img class="card-img-top" src="{{ asset('/storage/posts_image/'.$post->image) }}"" alt="Card image cap" height="400"> --}}
                  {{-- testing --}}
                  <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->subTitle }}</p>
                    {{-- <p class="card-text">{!! Str::limit($post->descriptions,'20','...')!!}</p> --}}
                    <p class="card-text">{!! $post->descriptions !!}</p>
                    <a href="{{ route('show',['id'=>$post->id]) }}" class="btn btn-primary">Read More &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                    Posted on {{ date('M d Y') }} by
                    <a href="#">Start Bootstrap</a>
                  </div>
                </div>
                @endforeach
                {{ $posts->links() }}

                <!-- Pagination -->
                {{-- <ul class="pagination justify-content-center mb-4">
                  <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                  </li>
                </ul> --}}

            </div>
              <!-- Sidebar Widgets Column -->
              <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                  <h5 class="card-header">Search</h5>
                  <div class="card-body">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                  <h5 class="card-header">Categories</h5>
                  <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#">{{ $category->category }}</a>
                            </li>
                          </ul>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>

                <!-- Side Widget -->
                <h4 class="text-center">Recent Posts</h4>
                @foreach ($recentPosts as $recentPost)
                <div class="card my-4">
                  <h5 class="card-header">
                      <a href="{{ route('show',['id'=>$recentPost->id]) }}">
                          {{ $recentPost->title }}</h5>
                      </a>
                  <div class="card-body">
                    {{ $recentPost->subTitle }}
                  </div>
                </div>
                @endforeach

              </div>
        </div>
    </div>
    @endsection
</x-frontend-layout>
