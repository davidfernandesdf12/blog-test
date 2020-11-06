<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Custom Blog CSS --}}
        <link href="{{asset('css/custom-blog.css')}}" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="home">
    <!-- Navigation -->
    @include('site.menu')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="my-4">Posts
                    <small>{{isset($category) ? $category->title : 'All'}}</small>
                </h1>

                <!-- Blog Posts -->
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-9 col-md-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{$post->getFirstMediaUrl('posts_highlight') ? $post->getFirstMediaUrl('posts_highlight') : 'https://www.gocache.com.br/wp-content/plugins/accelerated-mobile-pages/images/SD-default-image.png'}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{isset($post->title) ? $post->title : ''}}</h5>
                                    <a href="{{route('post.internal', ['slug' => $post->slug])}}" class="btn btn-dark btn-card">View content</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on {{$post->created_at->format('d F, Y')}}
                                    <a href="#">{{!$post->user->isEmpty() ? 'by '.$post->user->first()->name : ''}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <ul class="pagination mt-2 justify-content-center mb-4">
                    {!! $posts->links() !!}
                </ul>
                @if($posts->count() ==0)
                    <div class="alert alert-info" role="alert">
                        No posts found
                    </div>
                @endif
            </div>



            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">
                @include('site.sidebar')
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('site.footer')
    </body>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Scrollreveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{asset('/js/custom-blog.js')}}" ></script>

</html>
