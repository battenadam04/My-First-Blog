@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row header">
            <div class="col-12 col-md-12">
                <div class="jumbotron">
                  <h1>Welcome To My Blog!</h1>
                  <p class="lead">Thank you so much for visiting. This is my first attempt at a Laravel blog. Please feel free to register and create your own post or read my popular post!</p>
                  <a class="btn btn-primary btn-lg col-12 mt-3" href="#" role="button">Popular Post</a>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row section">
            <h2 class="col-12 col-sm-12">Recent Posts</h2>
            <div class="col-md-8">
                
                @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Categories</h2>
                @foreach ($categories as $category)
                <dl>
                    <dd>{{$category->name}}</dd>

                </dl>
                @endforeach

                <h2>Tags</h2>
                @foreach ($tags as $tag)
                    <dl>
                        <dd>{{$tag->name}}</dd>

                    </dl>
                @endforeach
            </div>
        </div>
@stop