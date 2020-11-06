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
    @include('menu')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="my-4">Posts
                    <small>All</small>
                </h1>

                <!-- Blog Posts -->
                <div class="row">
                    @for($i = 0; $i < 9; $i++)
                        <div class="col-9 col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="https://mercadodocacau.com/uploads/images/2019/07/chocolate-alivia-o-estresse-e-melhora-o-humor-mas-especialistas-fazem-alerta.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <a href="#" class="btn btn-dark btn-card">View content</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Posted on January 1, 2020 by
                                        <a href="#">Start Bootstrap</a>
                                    </div>
                                </div>
                            </div>
                    @endfor
                </div>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            @include('sidebar')

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('footer')
    </body>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Scrollreveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{asset('/js/custom-blog.js')}}" ></script>

</html>
