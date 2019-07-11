@include('layouts.front-end.header')

<style>
	 	.wrapper{
		margin: 0 auto;
		width: 60%;
		margin-top: 0px;
		margin-left: 0px;
	}
	.dropdown-menu{
		background-color:#5D6D7E;
	}
</style>
<div class="clearfix"></div>



<div class="downloads"> 	   		
<div class="container">
<div class="title">
				<h2>Downloads</h2><hr>
			</div>
			<div class="wrapper">
			<section class="panel panel-default">
		 		<div class="panel-heading">
		 			 
		 		</div>
		 		<div class="panel-body">
		 			<table class="table table-bordered responsive-sm">
		 				<thead>
		 					<th>File Name</th>
		 					<th>Description</th>
		 					<th>Upload Date</th>
		 					<th>Action</th>
		 				</thead>
		 				<tbody>
		 					@foreach($downloads as $download)
		 					<tr>
		 						<td>{{$download->file}}</td>
		 						<td>{{$download->title}}</td>
		 						<td>{{$download->created_at}}</td>
		 						<td>
		 							<a href="{{ url('/user-registor/'.$download->id) }}" >
		 								<button type="button" class="btn-sm btn-info center"><i class="glyphicon glyphicon-download"> Download </i></button>
		 							</a>
		 						 
		 						</td>
		 					</tr>
		 					@endforeach
		 				</tbody>
		 			</table>
		 		</div>
		 	</section>
		 	</div>
		</div>
</div>
@include('layouts.front-end.footer')
