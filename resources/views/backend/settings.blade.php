@extends('backend.base')
@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Settings</h1>
		</div>

		<div class="col-sm-6 cat-form">

			@if(Session::has('message'))
			<div class="success_message">
				<p>{{Session('message')}}</p>
			</div>

			@endif
			<h3>Website Settings</h3>
			@if(!$data )
			<form method="post" action="{{url('admin/settings/add')}}" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name='tbl' value="{{encrypt('settings')}}">
				<div class="form-group">
					<label>Logo</label>
					<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
					<p><label for="file" style="cursor: pointer;" class="btn btn-warning">Upload Image</label></p>
					<p><img id="output" /></p>

				</div>

				<div id="socialFieldGroup">
					<div class="form-group">
						<label>Social Links</label>
						<p>e.g. https://wwww.facebook.com/YourPage</p>
						<div class="form-group">
							<div class="alert alert-dismissable alert-danger hidden" id="socialAlert">
								<a href="#" class="close" data-dismissable="alert">&times;</a>
								<strong>Sorry! </strong>You can not add more Social Links.
							</div>
						</div>
						<input type="url" name="social[]" class="form-control">


					</div>
				</div>
				<div class="text-right">
					<span class="btn-warning btn" id='addSocialField' onclick=" new_social()"><i class="fa fa-plus "></i></span>
				</div>


				<div class="form-group">
					<label>About Us Description</label>
					<textarea name="about" id="" cols="100" rows="5" class="form-control"></textarea>

				</div>

				<div class="form-group">
					<button class="btn btn-primary">Update</button>
				</div>
			</form>
			<script>
				var socialCounter = 1;
				$('#addSocialField').click(function() {
					socialCounter++;
					if (socialCounter > 5) {
						$('#socialAlert').removeClass('hidden');
						return;
					}
					newDiv = $(document.createElement('div')).attr("class", "form-group");
					newDiv.after().html('<input type="url" name="social[]" class="form-control" autofocus></div>');
					newDiv.appendTo('#socialFieldGroup');
				})
			</script>
			@else
			<form method="post" action="{{url('admin/settings/update')}}" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name='tbl' value="{{encrypt('settings')}}">
				<input type="hidden" name="sid" value="{{$data->sid}}">
				<div class="form-group">
					<label>Logo</label>
					@if( !empty($data -> logo) )
					<p><img src="{{url('settings')}}/{{$data->logo}}" alt="aem_logo" class="img-thumbnail d-block" style="width: 25%;" id='output'></p>
					<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
						<p><label for="file" style="cursor: pointer;" class="btn btn-warning">Replace Image</label></p>
						<p><img id="output"/></p>
					@else
					<p><img src="{{url('settings')}}/{{$data->logo}}" alt="aem_logo" class="img-thumbnail d-block" style="width: 25%;" id='output'></p>
					<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
						<p><label for="file" style="cursor: pointer;" class="btn btn-warning">Replace Image</label></p>
						<p><img id="output"/></p>
					@endif
				</div>

				<div id="socialFieldGroup">
					<div class="form-group">
						<label>Social Links</label>
						<p>e.g. https://wwww.facebook.com/YourPage</p>
						<div class="form-group">
							<div class="alert alert-dismissable alert-danger hidden" id="socialAlert">
								<a href="#" class="close" data-dismissable="alert">&times;</a>
								<strong>Sorry! </strong>You can not add more Social Links.
							</div>
						</div>
						@foreach($data->social as $social)
						<div class="form-group" class="">
							<input type="url" name="social[]" class="form-control socialCount" value="{{$social}}">
						</div>
						@endforeach


					</div>
				</div>
				<div class="text-right">
					<span class="btn-warning btn" id='addSocialField' onclick=" new_social()"><i class="fa fa-plus "></i></span>
				</div>


				<div class="form-group">
					<label>About Us Description</label>
					<textarea name="about" id="" cols="100" rows="5" class="form-control">{{$data->about}}</textarea>

				</div>

				<div class="form-group">
					<button class="btn btn-primary">Update</button>
				</div>
			</form>
			<script>
				var socialCounter = $('.socialCount').length;
				$('#addSocialField').click(function() {

					socialCounter++;
					if (socialCounter > 5) {
						$('#socialAlert').removeClass('hidden');
						return;
					}
					newDiv = $(document.createElement('div')).attr("class", "form-group");
					newDiv.after().html('<input type="url" name="social[]" class="form-control" autofocus></div>');
					newDiv.appendTo('#socialFieldGroup');
				})
			</script>
			@endif


		</div>


	</div>
</div>
<script>
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@stop