@extends('layouts.loginlayout')
@section('slidebar')
  <div class="col-md-offset-4 col-md-8" style="margin-top:2%; margin-bottom:2%;">
    <h3 style="display:inline;">Boardname : <?php if(isset($boardname)){echo $boardname;} ?>{{ Session::get('boardname')}} </h3>
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        Sprint 1 <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Sprint2</a></li>
        <li><a href="#">Sprint3</a></li>
        <li><a href="#">Sprint4</a></li>
      </ul>
    </div>
    <blockquote style="display:inline;">
      <p style="display:inline;">User login</p>
    </blockquote>
  </div>
	<div ng-controller="TodoController">			
		<div class="col-md-3 thumbnail" style="background-color:#ecf0f1; margin-left:1%;">
      <h2>Product Backlog</h2>
      <div class="btn pink btn-draggable" ng-repeat="item in list0" ng-show="item.description" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list0" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.description}}
        <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
      </div>
      <form ng-submit="addProductbacklog()">
				<input type="text" class="form-control"  ng-model="addTitle" size="30"
				placeholder="Add ProductBacklog" style="width:80%; display:inline;">
				<!--<input class="btn-primary" type="submit" value="add">-->
				<button class="btn pink" type="submit" value="add">Add</button>
			</form>
		</div>

      <div class="content">
        <ul class="thumbnails">
          <div class="col-md-3">
            <h2><b><center>To do</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list1' data-jqyoui-options="optionsList1" jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list1" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list1" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
              </div>
              <form ng-submit="addTodo()">
                <input type="text" class="form-control"  ng-model="addSprint1" size="30"
                placeholder="Add Sprint" style="width:80%; display:inline;">
                <!--<input class="btn-primary" type="submit" value="add">-->
                <button class="btn btn-info" type="submit" value="add">Add</button>
              </form>
            </div>
          </div>
          <div class="col-md-3">
            <h2><b><center>Doing</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list2' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list2])'}"  jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list2" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list2" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2><b><center>Done</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list3' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list3])'}"  jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list3" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list3" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}
                  <button type="button" class="close"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div> <!--CLOSE Todo Controller-->
@stop


