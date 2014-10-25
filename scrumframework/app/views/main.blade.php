@extends('layouts.loginlayout')
@section('slidebar')
<div class="col-md-6">
	<form method="post" action="{{url('/addteam')}}">
		<div class="col-xs-3">
    		<input type="text" class="form-control" placeholder="Team name" name="teamname">
  		</div>
		<button type="submit" class="btn primary">Add Team</button>
	</form>
</div>

	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>
<h1>show boards</h1>
<div ng-controller="TodoController">	
	<div class="btn pink" ng-repeat="bname in boardname" ng-show="bname.name" ng-model="boardname" style="margin-left:1%;">
		<a  href="/taskboard/@{{bname._id}}"  style="color:#fff; text-decoration:none;">@{{bname.name}}	</a>
		<a href="/taskboard/@{{bname._id}}/delete"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
	</div>
</div>

@stop 

