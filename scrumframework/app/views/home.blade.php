@extends('layouts.base')

@section('body')
	<div class="jumbotron" style="margin-top:0px; margin-bottom:0px; background: url('http://laravel.com/assets/img/header.jpg') center no-repeat #f4726d; height:90%; overflow:hidden position:relative;">
		<h1 style="color:#fff; text-align:center; ">Scrum Framework</h1>
		<div class="col-md-5"  align="center" style="margin:0 auto; display:block; float:none;">
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userSignup" style="width:30%; opacity: 0.9; background-color:#f4726d; color:#fff;">Sign up</button>
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userLogin" style="width:30%; opacity: 0.8; background-color:#f4726d; color:#fff; margin-left:5%;">Login</a>
		</div>
		<ul class="col-sm-6 col-sm-offset-3 col-xs-offset-2" style="padding-left:5%; margin-top:5%; color:#fff;">
			@foreach($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
		</ul>
	</div>	
	<div id="what's_scrum" class="jumbotron" style="background-color:#ecf0f1; margin-top:0px; margin-bottom:0px; height:400px;" >
	</div>
	<div id="about" class="jumbotron" style="background-color:#34495e; margin-top:0px; margin-bottom:0px; height:400px;">	
	</div>
	<!--MODAL FORM VALIDATION-->	
	<div class="modal fade" id="userSignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-sm">
			<div class="modal-content">
				<form role="form" method="post" action="{{ url('/signup') }}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Sign up</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
					    	<label for="input-email">Email address</label>
							<input type="email" class="form-control" id="input-email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
							<label for="input-password">Password</label>
							<input type="password" class="form-control" id="input-password" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<label for="input-confirmpassword">Confirm Password</label>
							<input type="password" class="form-control" id="input-confirmpassword" placeholder="Confirm Password" name="password_confirmation">
						</div>				  							
					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn" style="background-color:#f4726d; color:#fff;" value="Submit">Sign Up</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>			
					</div>
				</form>		
			</div>
	  	</div>
	</div>
	<!--MODAL LOGIN-->
	<div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form role="form" method="post" action="{{ url('/taskboard') }}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Sign up</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
					    	<label for="input-email">Email address</label>
							<input type="email" class="form-control" id="input-email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
							<label for="input-password">Password</label>
							<input type="password" class="form-control" id="input-password" placeholder="Password" name="password">
						</div>			  							
					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn" style="background-color:#f4726d; color:#fff;" value="Submit">Log in</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>			
					</div>
				</form>		
			</div>
		</div>
	</div>
@stop
