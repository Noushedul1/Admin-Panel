<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/asset') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend/asset') }}/css/blog-post.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  @include('frontend.includes.navbar')

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        {{-- <p>{{ $post->created_at->format('d M Y m:s') }}</p> --}}
        <p>{{ $post->created_at->diffForHumans() }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset('/storage/posts_image/'.$post->image) }}" alt="">
        {{-- testing  --}}
        {{-- <img class="img-fluid rounded" src="{{ $post->image }}" alt=""> --}}
        {{-- testing  --}}

        <hr>

        <!-- Post Content -->
        <p>
            {{ $post->subTitle }}
        </p>
        <p class="lead">
            {!! $post->descriptions !!}
        </p>

        {{-- <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote> --}}
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{ route('post.comment',['post_id'=>$post->id]) }}" method="post">
                @csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name="message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Comment</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

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
    @foreach ($recentPosts as $recentPost)
    <div class="card my-4">
      <h5 class="card-header">
        <a href="{{ route('show',['id'=>$recentPost->id]) }}">
            {{ $recentPost->title }}
        </a>
      </h5>
      <div class="card-body">
        {{ $recentPost->subTitle }}
      </div>
    </div>
    @endforeach

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website {{ date('Y') }}</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/asset') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('frontend/asset') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
