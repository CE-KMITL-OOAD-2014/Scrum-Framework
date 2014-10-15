@extends('layouts.loginlayout')
@section('slidebar')
	
	<div ng-controller="TodoController">			
		<div class="col-md-3 thumbnail" style="background-color:#ecf0f1;">
        <h2>Product Backlog</h2>
				<!--OLD DRAG ITEM-->
        <!--<div class="btn btn-info" data-drag="true" ng-repeat="todo in todos" jqyoui-draggable="{animate:true}" style="display:block;" >
					<span class="done-@{{todo.done}}">@{{ todo.text }}</span>
				</div>-->
      <div class="btn pink btn-draggable" ng-repeat="item in list0" ng-show="item.description" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list0" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.description}}</div>
    	
      <form ng-submit="addProductbacklog()">
				<input type="text" class="form-control"  ng-model="addTitle" size="30"
				placeholder="Add ProductBacklog" style="width:80%; display:inline;">
				<!--<input class="btn-primary" type="submit" value="add">-->
				<button class="btn pink" type="submit" value="add">Add</button>
			</form>
		</div>

      <div class="content">
        <ul class="thumbnails">
          <li class="col-md-3">
            <h2><b><center>To do</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list1' data-jqyoui-options="optionsList1" jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list1" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}</div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list1" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}</div>
              </div>

              <form ng-submit="addTodo()">
                <input type="text" class="form-control"  ng-model="addSprint1" size="30"
                placeholder="Add Sprint" style="width:80%; display:inline;">
                <!--<input class="btn-primary" type="submit" value="add">-->
                <button class="btn btn-info" type="submit" value="add">Add</button>
              </form>

            </div>
          </li>
          <li class="col-md-3">
            <h2><b><center>Doing</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list2' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list2])'}"  jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list2" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}</div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list2" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}</div>
              </div>
            </div>
          </li>
          <li class="col-md-3">
            <h2><b><center>Done</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list3' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list3])'}"  jqyoui-droppable="{multiple:true}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list3" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}</div>
                <div class="btn btn-info btn-draggable" ng-repeat="item in list3" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{item.title}}</div>
              </div>
            </div>
          </li>
        </ul>
      </div>



    </div>
@stop

