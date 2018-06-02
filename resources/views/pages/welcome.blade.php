@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row header">
            <div class="col-12 col-sm-12">
                <div class="headerimage">
                    <div class="skew-content vcenter col-12 col-sm-6">
                  <h1>Welcome To My Blog!</h1>
                  <p class="lead">Thanks for visiting fellow bloggers. Please feel free to register and create your own post or read the popular post, by clicking below.</p>
                  <a class="btn btn-primary btn-lg col-12 mt-3" href="#" role="button">Popular Post</a>
                    </div>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div id="backshape">
        <div class="row section">
            <div class="wrapper">
            <h2 class="col-12 col-sm-12">Recent Posts</h2>
            <div class="col-md-8 Posts" data-aos="fade-down">
                
                @foreach($posts as $post)


                    <div class="post col-12 col-sm-12 mb-sm-2">


                         <div class="col-12 col-sm-8">

                                <h3 class="media-heading">{{ $post->title }}</h3>
                                <p class="hidden-xs">{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>



                            </div>
                         <div class=" col-12 col-sm-4">
                             <img src="{{asset('/img/' . $post->image)}}"  class="media-middle  media-object img-thumbnail" width="200"  alt="{{ $post->title }}" >
                         </div>

                         <p class="col-12 col-sm-12 readMoreBtn"><a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary"  >Read More</a></p>
                        </div>

                    <hr>

                @endforeach

            </div>


            <div class="col-md-3 col-md-offset-1 sidebar">
                <div class="col-sm-10">
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
      <br/>
            </div>
        </div>
        </div>
        </div>
@stop