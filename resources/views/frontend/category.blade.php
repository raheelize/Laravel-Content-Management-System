@extends('frontend.base')
@section('content')

<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="row" style="border-bottom: 2px solid purple;">
					<div class="container">
						<h1 class="category">{{$category}}</h1>
					</div>
				</div>
				<div class="row">
					@if(count($data) < 1) <div class="container">
						<h2>New Articles are about to Come. Stay tuned!</h2>
				</div>
				@else
				@foreach($data as $post)
				<div class="card">
					<div class="row">
					<div class="col-lg-4">
						@if($post->image)
						
							<img src="{{url('posts')}}/{{$post->image}}" style="width:100%;" class="trim">
						
						@endif
						</div>
						<div class="col-lg-8">
							<div class="row">
								<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
									<div class="col-lg-12">
									<h2>{{$post->title}}</h2>
									</div>
								</a>
							</div>
							<div class="row">
								<div class="col-lg-12">
								<h6><i>{{$post->author}}</i></h6>
								</div>
							</div>
						</div>
					</div>
				</div>


				@endforeach
				@endif
			</div>
		</div>
		<div class="col-lg-4 mt-5">
			<div class="row">
				<p class="category">Latest</p>
				@foreach($latest->take(10) as $post)
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
	</div>
</div>
</div>



@stop