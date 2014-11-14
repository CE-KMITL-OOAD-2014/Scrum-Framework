@extends('layouts.loginlayout')
@section('slidebar')
<div class="col-md-12">
	<form method="post" action="{{url('/addteam')}}">
		<div class="col-xs-3">
    		<input type="text" class="form-control" placeholder="Team name" name="teamname" required>
  		</div>
		<button type="submit" class="btn primary">Create Team</button>
	</form>
	<ul>
		@foreach($errors->all() as $message)
			<li>{{$message}}</li>
		@endforeach
	</ul>

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
			<div class="col-md-4" style="margin-top:2%; margin-bottom:2%;">
				<ul>
					<li class="btn btn-warning">Scrummaster : @{{tname.master}}</li>
				</ul>
				<ul ng-repeat="po in tname.po" ng-show="po" ng-model="data1">
					<li class="btn btn-info">Product Owner : @{{po}}
						<a href="/deletetaskboard/po/@{{tname._id}}/@{{po}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
					</li>
				</ul>
				<ul ng-repeat="tm in tname.tm" ng-show="tm" ng-model="data1">
					<li class="btn btn-danger">Team Member : @{{tm}}
						<a href="/deletetaskboard/tm/@{{tname._id}}/@{{tm}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
					</li>
				</ul>
				<form role="form" method="post" action="{{url('/adduser')}}"> 
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="emailmember" style="display:inline; width:50%;" required> 
                    <label for="BoardName">Select Role</label> 
                    <select class="selectpicker btn btn-warning" name="role">
                    	<option value="po">Product Owner</option>
    					<option value="tm">Team Member</option>
					</select>
                    <input type="hidden" name="teamid" value="@{{tname._id}}" >
				 	<button type="submit" class="btn btn-danger">Add User</button>
				</form>
			</div>
		</div>
	</div>
</div>

@stop 

