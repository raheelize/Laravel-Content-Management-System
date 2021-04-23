<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AEM | Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/ionicons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/adminstyle.css')}}">
  <link rel="icon" href="{{url('images/logo-02.png')}}">
  <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/app.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/script.js')}}"></script>
</head>

<body>

  <div class="sidebar">
    <ul class="sidebar-menu">
      <li><a href="/admin" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="{{url('admin/posts')}}">
          <i class="fa fa-bookmark-o"></i> <span>All Posts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('admin/posts/add')}}">
          <i class="fa fa-plus-circle"></i> <span>Add New Posts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('admin/category')}}">
          <i class="fa fa-list-alt"></i> <span>Categories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('admin/settings')}}">
          <i class="fa fa-cogs"></i> <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>

      <li class="treeview">

        <a class="btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          <i class = "fa fa-sign-out"></i>{{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
  <!--Header Ends-->
  @yield('content')
  <!--Footer Start--->
  <footer>
    <div class="col-sm-6">
      Copyright &copy; 2020 <a href="https://aemagazine.pk">aemagazine.pk</a> All rights reserved.
    </div>

  </footer>


</body>

</html>