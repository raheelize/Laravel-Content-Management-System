
@extends('backend.base')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 title">
      <h1><i class="fa fa-bars"></i> Azeem English Magazine | Blog Portal</h1>
    </div>

    <div class="col-sm-12">
      <div class="content">
        <h2>Welcome to Dashboard, <strong>{{ Auth::user()->name }}</strong></h2>
        <div class="row " style="margin-top: 50px;">
          <div class="col-sm-4">
            <h4>Get Started</h4><br>
            <a href="{{url('/')}}" class="btn btn-sm btn-warning">Go To WebSite</a>
          </div>
          <div class="col-sm-4 quick-links">
            <h4>View Records</h4>
            <p><a href="{{url('admin/posts')}}"><i class="fa fa-bookmark-o"></i> View All Posts</a></p>
            <p><a href="{{url('admin/category')}}"><i class="fa fa-list-alt"></i> View All Categories</a></p>
            
          </div>
          <div class="col-sm-4 quick-links">
            <h4>Add Records</h4>
            <p><a href="{{url('admin/posts/add')}}"><i class="fa fa-plus-circle"></i> Add Posts</a></p>
            <p><a href="{{url('admin/category')}}"><i class="fa fa-plus-circle"></i> Add Categories</a></p>
          </div>
        </div>
      </div>

      
    </div>
  </div>
</div>
@stop

