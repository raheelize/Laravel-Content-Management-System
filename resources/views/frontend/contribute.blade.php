@extends('frontend.base')
@section('content')
<div class="wrapper">
	<div class="container text-center">
		<h1 class="category">Get Your Article Featured in Azeem English Magazine!</h1>
		<hr>
		<p>Team AEM highly appreciates passionate writers and provides them exposure by publishing thier Articles, Short Stories and Poems.</p>

	</div>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="container">
					<h5 class="category">Instructions to Follow</h5>
					<ul>
						<li>Article must contains 300-350 words.</li>
						<li>Article must be apolitical and areligious.</li>
						<li>Article must be attached in MS Word (.docx) or PDF format.</li>
						<li>Article must be exclusive hate-speach, false facts.</li>
					</ul>
					<h5 class="category">NOTE</h5>
					<i style="font-size:12px; line-height: 80%;">
					<p>Team AEM will co-ordinate through e-mail after approval of article from <b>Editorial Board</b></p>
					<p>Please DO NOT alter the subject of submission email, else, it won't be considered.</p>
					</i>
					<a href="mailto:submit@aemagazine.pk?subject=AEM Submission" class="btn-primary btn"> <i class="fa fa-paper-plane"></i> Send Article</a>

				</div>
			</div>
			<div class="col-lg-6">
			<img src="{{asset('images/contribute.png')}}" alt="" style="width:50%; float:right;"></div>
		</div>
	</div>
</div>


@stop