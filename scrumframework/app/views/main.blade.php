@extends('layouts.loginlayout')
@section('slidebar')
<div class="col-md-12">
	<div class="col-md-6" style="background-color:#3498db; padding:2%; box-shadow: 10px 10px 5px #888888; margin-top:2%; margin-bottom:2%;">
		<div class="col-md-12">
			<span style="color:#fff;">Create new Team</span>
		</div>	
		<form method="post" action="{{url('/addteam')}}">
			<div class="col-xs-7">
	    		<input type="text" class="form-control" placeholder="Team name" name="teamname" required>
	  		</div>
			<button type="submit" class="btn primary">Create Team</button>
		</form>
		<ul>
			@foreach($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
		</ul>
	</div>

	<div ng-controller="TodoController">
		<div class="col-md-12" ng-repeat="tname in data1" ng-show="tname.name" ng-model="data1" style=" margin-bottom:1%;">
			
			<div style="color:#5e5e5e; text-decoration:none; margin-bottom:1%;">
				<span style="font-size:150%;"><i class="fa fa-users"></i> <b>@{{tname.name}}</b></span>
			</div>
				
			<div class="btn btn-info" ng-repeat="bname in tname.taskboards" ng-show="bname.name" ng-model="data1" style="margin-left:1%; margin-bottom:1%; box-shadow: 10px 10px 5px #888888;">
				<a href="/taskboard/@{{tname._id}}/@{{bname._id.$id}}"  style="color:#fff; text-decoration:none; height:50%;"><span style="font-size:200%;"><i class="fa fa-trello"></i> @{{bname.name}}	</span></a>
				<a href="/taskboard/@{{tname._id}}/@{{bname._id.$id}}/delete"><button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button></a>
			</div>
			<div class="col-md-12" style="margin-top:2%; margin-bottom:2%;">
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
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="emailmember" style="display:inline; width:20%;" required> 
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

