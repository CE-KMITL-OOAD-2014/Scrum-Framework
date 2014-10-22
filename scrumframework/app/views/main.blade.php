@extends('layouts.loginlayout')
@section('slidebar')
	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>
<h1>show boards</h1>
@stop