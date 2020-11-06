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

        <!-- Post Content Column -->
        <div class="col-lg-8 mb-5">

            <!-- Title -->
            <h1 class="mt-4">{{isset($post->title) ? $post->title : ''}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{!$post->user->isEmpty() ? 'by '.$post->user->first()->name : ''}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->format('d F, Y')}} at {{$post->created_at->format('h:i:s A')}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="image-highlight" width="300px" height="900px" src="{{$post->getFirstMediaUrl('posts_highlight') ? $post->getFirstMediaUrl('posts_highlight') : 'http://placehold.it/900x300'}}" alt="">

            <hr>

            <!-- Post Content -->
            {!! isset($post->content) ? $post->content : ''!!}

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
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
