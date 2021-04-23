@extends('frontend.base')
@section('content')
<div class="wrapper">
	<div class="text-center">
		<h2 style="" class="category">Discover The Islamabad's Best Loved Magazine</h2>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<img src="{{URL::asset('images/main.png')}}" alt="New Issue" style="width:100%;">
			</div>
			<div class="col-lg-6">
				<h2 style="color: purple;">
					Everything that excites you, everything that interests you... is in the next issue of Azeem English Magazine
				</h2><br><br>
				<h5>Great news! You can now have the Islamabad’s most widely read magazine delivered right to your door. </h5>
				<div class="row">
					<div class="col-lg-6  text-center">
						<div class="" style="border: 2px solid purple; border-radius:10px; height:250px; margin-right:5px;">
							<h3 class="category">Monthly Subcribtion</h3>
							<p>This package includes one latest issue of Azeem English Magazin</p>
							<h1 class="category">PKR 175</h1>
							<p>*including delivery charges.</p>
						</div>
					</div>
					<div class="col-lg-6  text-center">
						<div class="" style="border: 2px solid purple; border-radius:10px; height:250px;">
							<h3 class="category">Yearly Subcribtion</h3>
							<p>This package includes 12 issues of Azeem English Magazin</p>
							<h1 class="category">PKR 1400</h1>
							<h3>YOU SAVE 600rs!</h3>
							<p>*including delivery charges.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<h2 class="category">How to Subscribe?</h2>
				<ul>
					<li>
						<p>Send through <b>WHATSAPP</b>: the <b>reciept of Transfer</b>, <b>Your Name</b>, <b>Address</b> and <b>Contact Number</b>.</p>
					</li>
					<li>Send through <b>Mail</b>: the <b>Enclosed Cheque</b> with other above mentioned information at <br>
						<b>Azeem Educational Conference (Regd)</b><br>
						<i>Office 9 - 11, RAS Arcade, Street# 124, G-13/4, <br>Islamabad</i>
					</li>
				</ul>
			</div>
			<div class="col-lg-6" style="line-height: 70%;">
				<p class="category">Cheque Enclosed</p>
				<p>Cross your cheques in favour of</p>
				<p> <b>Muhammad Ali Farooqi</b></p>
				<p>Editor-in-Chief AEM</p>
				<p>Account No# <b>1335 2418 03482</b></p>
				<p>United Bank Pvt. Ltd.</p>
			</div>
			<div class="col-lg-6" style="line-height: 70%;">
				<p class="category">EasyPaisa/JazzCash</p>
				<p>Transfer Your Subcribtion Fee to Account Title</p>
				<p><b>Muhammad Ali Farooqi</b></p>
				<p>0345 66 00 629</p>
			</div>
		</div>
	</div>
</div>


@stop