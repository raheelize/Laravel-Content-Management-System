@extends('frontend.base')
@section('content')

<div class="wrapper">
	<div class="container-fluid">
		<a href="{{url('category')}}/{{$category->slug}}">
			<h3 class="category">{{$category->title}}</h3>
		</a><br><br>
		<div class="row">
			<div class="col-lg-8 col-sm-8 col-md-8 offset-2">
				<div class="row">
					<div class="">
						<h1 class="hero">{{$article->title}}</h1>
					</div>
					<div class="container ">
						@if($article->image)
						<div class="col-lg-8" style="margin-bottom: 70px;">
							<img src="{{url('posts')}}/{{$article->image}}" style="width:100%;" alt="">
						</div>
						@endif
						<div class="col-lg-8 text-right" style="padding: 7px;">
							<i class="fa fa-eye"></i><strong> {{$article->views}} views</strong>
						</div>
						@if($article->author)
						<div class="container col-lg-8">
							<p class="category">Article by</p>
							<div class="author">
								
								@if($article->author_contact)
									@if($flag)
									<a target="_blank" href="mailto:{{$article->author_contact}}" style="color: black;">  <h3>{{$article->author}}</h3></a>
									@else
									<a target="_blank" href="{{url('https://www.')}}{{$article->author_contact}}" style="color: black;"><h3>{{$article->author}}</h3</a>
									@endif
								@else
								<h3>{{$article->author}}</h3>
								
								@endif
							</div>
						</div>
						@endif
						<br><br>
						<div class="mt-5">
						<div class="col-lg-8">
							<p style="width: 100%;">
								{!!$article->description!!}
							</p>
						</div>
						</div>
					</div>
				</div>
				<div class="row">
					<h5 class="category">You May Also Like</h5>
					@foreach($options as $post)
					<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
						<div class="col-lg-3">
							<div class="option">
								<div class="card-img-top">
									@if($post->image)
									<img src="{{url('posts')}}/{{$post->image}}" style="width:100%;" class="card-img-top trim">
									@endif
								</div>
								<div class=".card-body">
									<div class="card-title">
										<h3>{{$post->title}}</h3>
									</div>
									<div class="card-text">
										<i>{{$post->author}}</i>
									</div>
								</div>
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>



			<!---
			<div class="col-lg-4 mt-5">
				<div class="row">
					<p class="category">All in This Category</p>
					@foreach($related as $post)
					<div class="card-sm">
						<div class="row">
							<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
								<h3>{{$post->title}}</h3>
							</a>
							<h6><i>{{$post->author}}</i></h6>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row">
					<p class="category">Latest</p>
					@foreach($latest->take(5) as $post)
					<div class="card-sm">
						<div class="row">
							<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
								<h3>{{$post->title}}</h3>
							</a>
							<h6><i>{{$post->author}}</i></h6>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row">
				<a href="https://rinstra.com/" target="_blank">
				<img src="{{URL::asset('images/rinstra.png')}}" alt="Advertisement" style="width:100%;">
				</a>
				</div>
			</div>
			-->


			
		</div>
	</div>
</div>

@stop