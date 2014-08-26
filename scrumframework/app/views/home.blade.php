@extends('layouts.base')

@section('body')
	<div class="jumbotron" style=" background: url('http://laravel.com/assets/img/header.jpg') center no-repeat #f4726d; height:90%; overflow:hidden position:relative;">
		<h1 style="color:#fff; text-align:center; ">Scum Framework</h1>
		<div class="col-md-5"  align="center" style="margin:0 auto; display:block; float:none;">
			<button type="button" class="btn btn-default btn-lg" style="width:30%; opacity: 0.9; background-color:#f4726d; color:#fff;">Register</button>
			<a href="/login" type="button" class="btn btn-default btn-lg" style="width:30%; opacity: 0.8; background-color:#f4726d; color:#fff; margin-left:5%;">Login</a>
		</div>
	</div>	
@stop