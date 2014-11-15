angular.module('scrumFramework',  ['ngDragDrop'])
    .controller('TodoController', ['$scope','$http', function($scope, $http) {
        $http.get('/gettesttaskboard').
            success(function(data, status, headers, config) {
                $scope.data1 = data;
            
                $scope.addProductbacklog = function() {
                    $scope.list0.push({description:$scope.addTitle, 'drag': true});
                    $scope.addTitle = '';
                    $scope.dropCallbacklist();
                };

                 $scope.addTodo = function() {
                    $scope.list1.push({title:$scope.addSprint1, 'drag': true, 'comments':[]});
                    $scope.addSprint1 = '';
                    $scope.dropCallbacklist();
                };

                $scope.removeTaskboardlist1 = function($index){
                    $scope.list1.splice($index,1);
                    $scope.dropCallbacklist();
                };

                 $scope.removeTaskboardlist2 = function($index){
                    $scope.list2.splice($index,1);
                    $scope.dropCallbacklist();
                };

                  $scope.removeTaskboardlist3 = function($index){
                    $scope.list3.splice($index,1);
                    $scope.dropCallbacklist();
                };


                  $scope.addCommentlist1 = function($index) {
                   var temp = [{'comment':$scope.list1[$index].comment , 'email':$scope.email}];
                    $scope.list1[$index].comments.push({comment:$scope.list1[$index].comment , email:$scope.email});
                    $scope.list1[$index].comment = '';
                    $scope.dropCallbacklist();
                };

                $scope.addCommentlist2 = function($index) {
                   var temp = [{'comment':$scope.list2[$index].comment , 'email':$scope.email}];
                    $scope.list2[$index].comments.push({comment:$scope.list2[$index].comment , email:$scope.email});
                    $scope.list2[$index].comment = '';
                    $scope.dropCallbacklist();
                };

                $scope.addCommentlist3 = function($index) {
                   var temp = [{'comment':$scope.list3[$index].comment , 'email':$scope.email}];
                    $scope.list3[$index].comments.push({comment:$scope.list3[$index].comment , email:$scope.email});
                    $scope.list3[$index].comment = '';
                    $scope.dropCallbacklist();
                };

                $scope.removeCommentlist1 = function($index, $parent){
                    $scope.list1[$parent].comments.splice($index,1);
                    $scope.dropCallbacklist();
                };

                   $scope.removeCommentlist2 = function($index, $parent){
                    $scope.list2[$parent].comments.splice($index,1);
                    $scope.dropCallbacklist();
                };

                   $scope.removeCommentlist3 = function($index, $parent){
                    $scope.list3[$parent].comments.splice($index,1);
                    $scope.dropCallbacklist();
                };
             
                $scope.archive = function() {
                    var oldTodos = $scope.todos;
                    $scope.todos = [];
                    angular.forEach(oldTodos, function(todo) {
                    if (!todo.done) $scope.todos.push(todo);
                    });
                };

                $scope.dropSuccessHandler = function($event,index,array){
                    array.splice(index,1);
                };
                    
                $scope.onDrop = function($event,$data,array){
                    array.push($data);
                };
               
           
                angular.forEach($scope.data1, function(item, key) {
                    if(item._id == $scope.teamid)
                    {
                        $scope.idnowteam = $scope.data1[key]._id;
                        $scope.objnowteam = $scope.data1[key];
                    }
                })

                angular.forEach($scope.objnowteam.taskboards, function(item, key) {
                  if(item._id.$id == $scope.boardid)
                  {
                      $scope.objboard = item;
                  }
                })

                $scope.list0 = $scope.objboard.list0;
                $scope.list1 = $scope.objboard.list1;
                $scope.list2 = $scope.objboard.list2;
                $scope.list3 = $scope.objboard.list3;


                var currentteam = $scope.idnowteam;
                var curentboard = $scope.boardid;
                var pbacklog = $scope.list0;
                var sprintbacklog1 = $scope.list1;
                var sprintbacklog2 = $scope.list2;
                var sprintbacklog3 = $scope.list3;


                $scope.dropCallbacklist = function() {
                    var allsend  = { team : $scope.idnowteam, board : $scope.boardid, list0:$scope.list0, list1:$scope.list1, list2:$scope.list2, list3:$scope.list3 };
                    $http.post('/recievedboard', allsend);
                };

            }).


            error(function(data, status, headers, config) {
                alert('error');
            });

    }]);


angular.element(document).ready(function() {
      angular.bootstrap(document, ['scrumFramework']);
    });