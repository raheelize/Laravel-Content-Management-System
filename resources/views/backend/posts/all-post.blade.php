@extends('backend.base')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Articles <a href="{{url('/admin/posts/add')}}" class="btn btn-sm btn-default">Add New</a></h1>
    </div>

    <div class="search-div">
      <div class="col-sm-9">
        All({{count($posts)}}) | Published({{$published}})
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" name="search" class="form-control" placeholder="Search Posts" autofocus>
      </div>
    </div>

    <div class="clearfix"></div>
    @if(Session::has('message'))
    <div class="alert alert-dismissable alert-success">
      <a href="#" class="close" data-dismissable="alert">&times;</a>
      <strong>{{Session('message')}}</strong>
    </div>
    @endif
    <div class="filter-div">
      <form method="post" action="{{url('admin/multiple_delete')}}">
        {{csrf_field()}}
        <input type="hidden" name="tbl" value="{{encrypt('posts')}}">
        <input type="hidden" name="tblid" value="{{encrypt('pid')}}">
        <div class="col-lg-2">
          <select name="bulk-action" class="form-control">
            <option value="0">Bulk Action</option>
            <option value="1">Move to Trash</option>
          </select>
        </div>

        <div class="col-sm-2">
          <div class="row d-flex justify content-center">
            <button class="btn btn-default">Apply</button>
          </div>
        </div>
        <div class="col-sm-2 text-right">
          {{$posts->links()}}
        </div>
    </div>

    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">Author</th>
              <th width="15%">Category</th>
              <th width="10%">Status</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
            @if(count($posts)>0)
            @foreach($posts as $post)
            <tr>
              <td>
                <input type="checkbox" name="select-data[]" value="{{$post->pid}}">
                <a href="{{url('admin/posts/edit')}}/{{$post->pid}}">{{$post->title}}</a>
              </td>
              <td>{{$post->author}}</td>
              <td>{{$post->status}}</td>
              <td>{{$post->category_id}}</td>
              <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan='4'>No Record Found</td>
            </tr>
            @endif

          </tbody>
        </table>
      </div>
    </div>
    </form>
    <div class="clearfix"></div>

    <div class="filter-div">



    </div>
  </div>
</div>
@stop