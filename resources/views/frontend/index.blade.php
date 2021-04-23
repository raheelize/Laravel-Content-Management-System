@extends('frontend.base')
@section('content')
<div class="wrapper">
	<div class="container">
		<div class="row " >
			<div class="col-lg-6">
			<img src="{{url('images/main.png')}}" alt="magazine=feb" style="width: 100%;">
			</div>
			<div class="col-lg-6" style="margin-top: 10%;">
				<div class="row">
					<p class = 'hero'><span style="color: white; background: indigo; padding:5px;">March 2021 Edition</span> of <span style="border-bottom: 3px solid indigo;">Azeem English Magazine</span> is available at your nearby Stores and Bookstalls.</p>
				</div>
				<div class="row">
				<a href="{{url('/download')}}" class = 'btn btn-primary form-control '><i class = "fa fa-download"></i> Download Latest Issue</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="row" style="border-bottom: 2px solid purple;">
					<div class="container">
						<h1 class="category">Featured</h1>
					</div>
				</div>
				<div class="row">
					@foreach($posts as $post)
					@if($post->category_id == 'Featured')
					<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
						<div class="card">
							<div class="row">
								<div class="col-lg-4">
									<img src="{{url('posts')}}/{{$post->image}}" style="width:100%;" class="trim">
								</div>
								<div class="col-lg-8">
									<div class="row">
										<div class="col-lg-12">
										<h2>{{$post->title}}</h2>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
										<h6><i>{{$post->author}}</i></h6>
										</div>
										<!-- <div class="col-lg-12">
											<p style="text-transform: uppercase;">{!!substr($post->description,0,200) !!}</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</a>
					@endif
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 mt-5">

				@foreach($posts as $key=>$post)
				@if($post->category_id != 'Featured')
				@if($key < 10)

				<div class="card-sm">
					<div class="row">

						<p class="category">{{$post->category_id}}</p>

						<a href="{{url('article')}}/{{$post->slug}}" class="item_link">
							<h3>{{$post->title}}</h3>
						</a>
						<h6><i>{{$post->author}}</i></h6>
					</div>
				</div>


				@endif
				@endif
				@endforeach
				<div class="row">
				<a href="https://rinstra.com/" target="_blank">
				<img src="{{URL::asset('images/rinstra_ad.jpg')}}" alt="Advertisement" style="width:50%; float:right">
				</a>
				</div>
			</div>

		</div>
	</div>
</div>


@stop