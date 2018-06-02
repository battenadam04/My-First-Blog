@extends('main')

@section('title', '| Blog')

@section('content')

  <div class="section">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h2>Latest Posts</h2>
		</div>
	</div>


	@foreach ($posts as $post)
	<div class="row">
		<div class="col-md-10 col-md-offset-1 ">

				<div class=media">
					<div class="media-body">

							<h3>{{ $post->title }}</h3>
							<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

							<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>


							<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>

					</div>
					<div class="media-right media-middle">
						<img src="{{asset('/img/' . $post->image)}}"  class="align-self-center media-object  mt-3 img-thumbnail" width="200"  alt="{{ $post->title }}" >
					</div>
				</div>
			    <hr>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
  </div>


@endsection
