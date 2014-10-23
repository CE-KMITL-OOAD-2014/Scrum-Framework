@extends('layouts.loginlayout')
@section('slidebar')
	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>
<h1>show boards</h1>
<div ng-controller="TodoController">	
		<div class="btn pink" ng-repeat="bname in boardname" ng-show="bname.name" ng-model="boardname">
			<a  href="/taskboard/@{{bname._id}}"  style="color:#fff; text-decoration:none;">@{{bname.name}}	</a>
		</div>
</div>
@stop