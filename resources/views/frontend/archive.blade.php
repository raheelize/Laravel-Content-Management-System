@extends('frontend.base')
@section('content')
<div class="wrapper">
	<div class="container">
		<center><h1 class="category">Azeem English Magazine Archives</h1></center>
		<hr><br>
		<div class="row">
			<div class="col-lg-4">
				<div class="	" style="margin-bottom: 20px;">
					<img class="card-img-top" src="{{url('images/AEM_MARCH_2021.png')}}" style  = "width:100%;"alt="Card image cap">
					<div class="card-body">
						<h3 class="card-title">March 2021</h3>
						<p class="category">Azeem English Magazine Vol. 21 Issue 03</p>
						<a href="{{url('files/AEM_MARCH_2021.pdf')}}" class="btn  form-control" style = "background:indigo; color:white;">Download</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="" style="margin-bottom: 20px;">
					<img class="card-img-top" src="{{url('images/AEM_FEB_2021.png')}}"style  = "width:100%;" alt="Card image cap">
					<div class="card-body">
						<h3 class="card-title">February 2021</h3>
						<p class="category">Azeem English Magazine Vol. 21 Issue 02</p>
						<a href="{{url('files/AEM_FEB_2021.pdf')}}" class="btn  form-control" style = "background:indigo; color:white;">Download</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="" style="margin-bottom: 20px;">
					<img class="card-img-top" src="{{url('images/AEM_JAN_2021.png')}}" style  = "width:100%;" alt="Card image cap">
					<div class="card-body">
						<h3 class="card-title">January 2021</h3>
						<p class="category">Azeem English Magazine Vol. 21 Issue 01</p>
						<a href="{{url('files/AEM_JAN_2021.pdf')}}" class="btn  form-control" style = "background:indigo; color:white;">Download</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop