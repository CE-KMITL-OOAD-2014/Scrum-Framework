@extends('layouts.loginlayout')
@section('slidebar')
<div class="col-md-12">
	<form method="post" action="{{url('/addteam')}}">
		<div class="col-xs-3">
    		<input type="text" class="form-control" placeholder="Team name" name="teamname" required>
  		</div>
		<button type="submit" class="btn primary">Create Team</button>
	</form>
	<div ng-controller="TodoController">
		<div class="col-md-12 btn btn-primary" ng-repeat="tname in data1" ng-show="tname.name" ng-model="data1" style="margin-left:1%;">
			
			<div style="color:#fff; text-decoration:none;">
					<a href="/taskboard/@{{tname._id}}/delete"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
				@{{tname.name}}	
			</div>
				
			<div class="btn pink" ng-repeat="bname in tname.taskboards" ng-show="bname.name" ng-model="data1" style="margin-left:1%;">
				<a  href="/taskboard/@{{tname._id}}/@{{bname._id.$id}}"  style="color:#fff; text-decoration:none;">@{{bname.name}}	</a>
				<a href="/taskboard/@{{tname._id}}/@{{bname._id.$id}}/delete"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
			</div>
		
		</div>
	</div>
</div>

	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>


@stop 

