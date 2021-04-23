@extends('backend.base')
@section('content')

<div class="container-fluid">
	
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i>Edit Category</h1>
		</div>

		<div class="col-sm-4 cat-form">
			
			@if(Session::has('message'))
			<div class="alert alert-dismissable alert-success">
				<a href="#" class="close" data-dismissable="alert">&times;</a>
				<strong>{{Session('message')}}</strong>
			</div>
			
			@endif
			<h3>Edit Category</h3>
			<form method="post" action="{{url('admin/update_category')}}/{{$singleData->cid}}">
				{{csrf_field()}}
				<input type="hidden" name='tbl' value="{{encrypt('categories')}}">
				<input type="hidden" name = 'cid' value = "{{$singleData->cid}}">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" id="category_name" class="form-control" value="{{$singleData->title}}" autofocus>
					<p>The title is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" readonly="" value="{{$singleData->slug}}">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>


				<div class="form-group">
					<label>Status</label>
					<select name="status" id="" class="form-control">
					<option value="{{$singleData->status}}">{{$singleData->status}}</option>
					@if($singleData->status == '0')
					<option value="1">1</option>
					@else
					<option value="0">0</option>
					@endif	
					</select>
					
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Update</button>
				</div>
			</form>


		</div>

		<div class="col-sm-8 cat-view">
		<form method="post" action="{{url('admin/multiple_delete')}}">
			{{csrf_field()}}
			<div class="row">
			
			<input type="hidden" name = "tbl" value="{{encrypt('categories')}}">
			<input type="hidden" name = "tblid" value = "{{encrypt('cid')}}">
				<div class="col-sm-3">
					<select name="bulk-action" class="form-control">
						<option value="0">Bulk Action</option>
						<option value="1">Move to Trash</option>
					</select>
				</div>
				<div class="col-sm-2">
					<button class="btn btn-default">Apply</button>
				</div>
				<div class="col-sm-3 col-sm-offset-4">
					<input type="text" id="search" class="form-control" placeholder="Search Category">
				</div>
			
			</div>
			<div class="content">
				<table class="table table-striped">
					<thead>

						<tr>
							<th><input type="checkbox" id="select-all"> Name</th>
							<th>Slug</th>
							<th>Status</th>
						</tr>

					</thead>
					<tbody>
						@if(count($data)>0)
						@foreach($data as $category)
						<tr>
							<td>
								<input type="checkbox" name="select-data[]" value="{{$category->cid}}">
								<a href="{{url('/admin/category/edit')}}/{{$category->cid}}">{{$category->title}}</a>
							</td>
							<td>{{$category->slug}}</td>
							<td>{{$category->status}}</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="3">No Data Found. </td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</form>
		</div>
	</div>
</div>
@stop