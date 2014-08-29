@extends('layouts.base')

@section('body')
	<div class="jumbotron" style=" background: url('http://laravel.com/assets/img/header.jpg') center no-repeat #f4726d; height:90%; overflow:hidden position:relative;">
		<h1 style="color:#fff; text-align:center; ">Scum Framework</h1>
		<div class="col-md-5"  align="center" style="margin:0 auto; display:block; float:none;">
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userSignup" style="width:30%; opacity: 0.9; background-color:#f4726d; color:#fff;">Sign up</button>
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userLogin" style="width:30%; opacity: 0.8; background-color:#f4726d; color:#fff; margin-left:5%;">Login</a>
		</div>
	</div>	

	<div class="modal fade" id="userSignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog  modal-sm">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Sign up</h4>
		  </div>
			<div class="modal-body">
				<div class="input-group">
					<span>Username</span>
				  <input type="text" class="form-control" placeholder="Username">
				  </br></br></br>
					<span>Password</span>
				   <input type="text" class="form-control" placeholder="Password">
					</br></br></br>
					<span>Confirm Password</span>
					<input type="text" class="form-control" placeholder="Confirm Password">
				</div>
			</div>			
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary">Sign Up</button>
			<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>			
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Log in</h4>
		  </div>
		  <div class="modal-body">
			<div class="input-group">
					<span>Username</span>
				  <input type="text" class="form-control" placeholder="Username">
				  </br></br></br>
					<span>Password</span>
				   <input type="text" class="form-control" placeholder="Password">
					</br></br></br>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary">Log in</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>		
		  </div>
		</div>
	  </div>
	</div>
	
@stop