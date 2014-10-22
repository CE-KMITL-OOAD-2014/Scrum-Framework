@extends('layouts.loginlayout')
@section('slidebar')
	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>
<h1>show boards</h1>
<div ng-controller="TodoController">	
	<p>@{{alert('555')}}</p>
	<p>@{{data[2].name}}</p>
	<div class="btn pink btn-draggable" ng-repeat="bname in boardname" ng-show="bname.name" ng-model="boardname" >@{{bname.name}}
        <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
      </div>
</div>
@stop