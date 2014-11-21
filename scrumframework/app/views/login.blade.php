@extends('layouts.loginlayout')
@section('slidebar')
<div class="col-md-12">
  <div class="col-md-offset-4 col-md-4" style="margin-top:2%; margin-bottom:2%;">
    <h3 style="display:inline;">Boardname :  {{{ $boardname or Session::get('boardname') }}} </h3>
  </div>
</div>


	<div ng-controller="TodoController">			
		<div class="col-md-3 thumbnail" style="background-color:#ecf0f1; margin-left:1%;">
      <h2>Product Backlog</h2>
      <div class="btn pink btn-draggable word" ng-repeat="item in list0" ng-show="item.description" data-drag="true" data-jqyoui-options="{revert: 'invalid'}" ng-model="list0" jqyoui-draggable="{index: @{{$index}},animate:true}" style="width:100%;">@{{item.description}}
        <button type="button" class="close word" ng-click="removeTaskboardlist0($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
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
          <div class="col-md-3" style="background-color:#ecf0f1; padding-top:1%; color:#5e5e5e;">
            <h2><b><center>To do</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list1' data-jqyoui-options="optionsList1" jqyoui-droppable="{multiple:true,onDrop:'dropCallbacklist'}" droppable>
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list1" ng-show="pb.description" data-drag="true" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close" ng-click="removeTaskboardlist1($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn btn-draggable" ng-repeat="item in list1" ng-show="item.title" data-drag="true" data-jqyoui-options="{revert: 'invalid'}" ng-model="list1" jqyoui-draggable="{index: @{{$index}},animate:true}" data-toggle="modal" data-target="#commentlist1@{{$index}}" style="padding-bottom:5%; background-color:#f39c12; margin:4%; color:#fff; box-shadow: 5px 5px 5px #888888;" draggable>
                  <button type="button" class="close" ng-click="removeTaskboardlist1($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                  <span>@{{item.title}}</span>
                </div>
              </div>
              <form ng-submit="addTodo()">
                <input type="text" class="form-control"  ng-model="addSprint1" size="30"
                placeholder="Add SprintBacklog" style="width:80%; display:inline;">
                <!--<input class="btn-primary" type="submit" value="add">-->
                <button class="btn btn-info" type="submit" value="add">Add</button>
              </form>
            </div>
          </div>
          <div class="col-md-3" style="background-color:#ecf0f1; padding-top:1%; color:#5e5e5e;">
            <h2><b><center>Doing</center></b></h2>
            <div class="thumbnail" data-scale="0.5" data-drop="true" ng-model='list2' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list2])'}"  jqyoui-droppable="{multiple:true, onDrop:'dropCallbacklist'}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list2" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close" ng-click="removeTaskboardlist2($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn  btn-draggable" ng-repeat="item in list2" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list2" jqyoui-draggable="{index: @{{$index}},animate:true}" data-toggle="modal" data-target="#commentlist2@{{$index}}" style="padding-bottom:5%; background-color:#f39c12; margin:4%; color:#fff; box-shadow: 5px 5px 5px #888888;" draggable>@{{item.title}}
                  <button type="button" class="close" ng-click="removeTaskboardlist2($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3" style="background-color:#ecf0f1; padding-top:1%; color:#5e5e5e;">
            <h2><b><center>Done</center></b></h2>
            <div class="thumbnail" data-drop="true" ng-model='list3' data-jqyoui-options="{accept:'.btn-draggable:not([ng-model=list3])'}"  jqyoui-droppable="{multiple:true, onDrop:'dropCallbacklist'}">
              <div class="caption">
                <div class="btn pink btn-draggable" ng-repeat="pb in list3" ng-show="pb.description" data-drag="@{{pb.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}">@{{pb.description}}
                  <button type="button" class="close" ng-click="removeTaskboardlist3($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="btn  btn-draggable" ng-repeat="item in list3" ng-show="item.title" data-drag="@{{item.drag}}" data-jqyoui-options="{revert: 'invalid'}" ng-model="list3" jqyoui-draggable="{index: @{{$index}},animate:true}" data-toggle="modal" data-target="#commentlist3@{{$index}}" style="padding-bottom:5%; background-color:#f39c12; margin:4%; color:#fff; box-shadow: 5px 5px 5px #888888;" draggable>@{{item.title}}
                  <button type="button" class="close" ng-click="removeTaskboardlist3($index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
     
        <input type="hidden" ng-model="boardid" ng-init="boardid='{{$boardid}}'" name="boardid" placeholder="boardid">
        <input type="hidden" ng-model="teamid" ng-init="teamid='{{$teamid}}'" name="teamid" placeholder="teamid">
        <input type="hidden" ng-model="email" ng-init="email='{{$email}}'" name="email" placeholder="email">  
        <div ng-repeat="item in list1" ng-show="item.title"  ng-model="list1">
          <div class="modal fade" id="commentlist1@{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">@{{item.title}}</h4>
                </div>
                <div class="modal-body">
                  <div class="concrete" ng-repeat="commenting in item.comments"  data-toggle="modal" data-target="#comment">
                    <b>@{{commenting.email}} says:</b>
                    <button type="button" class="close" ng-click="removeCommentlist1($index, $parent.$index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                    <div class="comment">@{{commenting.comment}}</div>
                  </div>
                  <form ng-submit="addCommentlist1($index)" style="margin-top:2%;">
                    <input type="text" class="form-control"  size="30" ng-model="item.comment"
                  placeholder="Write a comment..." style="width:80%; display:inline;">
                    <input type="hidden" ng-model="item.comment" ng-init="email='{{$email}}'" name="email" placeholder="email">  
                    <button class="btn pink" type="submit" >Comment</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div ng-repeat="item in list2" ng-show="item.title"  ng-model="list2">
          <div class="modal fade" id="commentlist2@{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">@{{item.title}}</h4>
                </div>
                <div class="modal-body">
                  <div class="concrete" ng-repeat="commenting in item.comments"  data-toggle="modal" data-target="#comment">
                    <b>@{{commenting.email}} says:</b>
                    <button type="button" class="close" ng-click="removeCommentlist2($index, $parent.$index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                    <div class="comment">@{{commenting.comment}}</div>
                  </div>
                  <form ng-submit="addCommentlist2($index)" style="margin-top:2%;">
                    <input type="text" class="form-control"  size="30" ng-model="item.comment"
                  placeholder="Write a comment..." style="width:80%; display:inline;">
                    <input type="hidden" ng-model="item.comment" ng-init="email='{{$email}}'" name="email" placeholder="email">  
                    <button class="btn pink" type="submit" >Comment</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div ng-repeat="item in list3" ng-show="item.title"  ng-model="list3">
          <div class="modal fade" id="commentlist3@{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">@{{item.title}}</h4>
                </div>
                <div class="modal-body">
                  <div class="concrete" ng-repeat="commenting in item.comments"  data-toggle="modal" data-target="#comment">
                    <b>@{{commenting.email}} says:</b>
                    <button type="button" class="close" ng-click="removeCommentlist3($index, $parent.$index)"><span aria-hidden="true">&nbsp;×</span><span class="sr-only">Close</span></button>
                    <div class="comment">@{{commenting.comment}}</div>
                  </div>
                  <form ng-submit="addCommentlist3($index)" style="margin-top:2%;">
                    <input type="text" class="form-control"  size="30" ng-model="item.comment"
                  placeholder="Write a comment..." style="width:80%; display:inline;">
                    <input type="hidden" ng-model="item.comment" ng-init="email='{{$email}}'" name="email" placeholder="email">  
                    <button class="btn pink" type="submit" >Comment</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div> <!--CLOSE Todo Controller-->
@stop


