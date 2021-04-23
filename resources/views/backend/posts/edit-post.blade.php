@extends('backend.base')
@section('content')


<div class="container-fluid">
	@if(Session::has('message'))
	<div class="alert alert-dismissable alert-success">
		<a href="#" class="close" data-dismissable="alert">&times;</a>
		<strong>{{Session('message')}}</strong>
	</div>
	@endif
	<div class="row">
		<div class="col-sm-10 title">

			<h1><i class="fa fa-bars"></i> Edit Article</h1>
		</div>

		<div class="col-sm-12">
			<div class="row">
				<form method="post" action="{{url('admin/posts/edit')}}/{{$data->pid}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="tbl" value="{{encrypt('posts')}}">
					<input type="hidden" name="pid" value="{{$data->pid}}">
					<div class="col-sm-9">
						<div class="form-group">
							<input type="text" name="title" class="form-control" id="post_title" placeholder="Enter title here" value="{{$data->title}}" required>
						</div>
						<div class="form-group">
							<input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{$data->slug}}" readonly required>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" name="author" class="form-control d-flex" id="author" placeholder="Enter Author Name" value="{{$data->author}}" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" name="author_contact" class="form-control d-flex" id="author" placeholder="Enter Author Email/Social Link" value="{{$data->author_contact}}" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="description" rows="15" required>{{$data->description}}</textarea>

						</div>
					</div>
					<div class="col-sm-3">
						<div class="col-sm-12 main-button">
							<p>Save article as draft.</p>
							<button class="btn  btn-warning pull-right form-control" name='status' value='draft'>Save As Draft</button>
						</div>
						<div class="col-sm-12 main-button">
							<button class="btn btn-primary pull-right form-control" name='status' value='publish'>Publish</button>
						</div>
						<div class="content featured-image">
							<h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
							<hr>
							@if($data->image != '')
							<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
							<p><label for="file" style="cursor: pointer;" class="">Replace Featured Image</label></p>
							<p><img id="output" style="max-width: 100%;" class="img-thumbnail shadow" src="{{url('posts')}}/{{$data->image}}" /></p>
							@else
							<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
							<p><label for="file" style="cursor: pointer;" class="">Set Featured Image</label></p>
							<p><img id="output" style="max-width: 100%;" class="img-thumbnail shadow" /></p>
							@endif

						</div>

						<div class="content cat-content">
							<h4>Category <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
							<hr>
							@foreach($categories as $cat)
							@if($cat->status == 1)
							<p><input type="radio" name="category_id" value="{{$cat->cid}}" @if($checked==$cat->cid)
								checked
								@endif
								required><b>{{$cat->title}}</b>
							</p>
							@endif
							@endforeach


						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fa-bars').click(function() {
			$('.sidebar').toggle();
		})
	});
</script>
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace('description', {
		"filebrowserBrowseUrl": "ckfinder\/ckfinder.html",
		"filebrowserImageBrowseUrl": "/ckfinder\/ckfinder.html?type=Images",
		"filebrowserFlashBrowseUrl": "ckfinder\/ckfinder.html?type=Flash",
		"filebrowserUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files",
		"filebrowserImageUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images",
		"filebrowserFlashUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash"
	});
</script>
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@stop