 <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/?category_slug={{$category->slug}}">{{$category->title}}</a>
                    <span class="badge badge-primary badge-pill">{{$category->posts->count()}}</span>
                </li>
            @endforeach
        </ul>

    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Lorem Ipsum</h5>
        <div class="card-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
        </div>
    </div>

