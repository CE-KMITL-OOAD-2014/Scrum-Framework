angular.module('scrumFramework',  ['ngDragDrop'])
    .controller('TodoController', ['$scope','$http', function($scope, $http) {
        $http.get('/gettaskboard').
            success(function(data, status, headers, config) {
                $scope.data1 = data;
              //  $scope.boardid = "555";
         //       $scope.taskboards = [];
    //            alert($scope.data1);
          //     $scope.data2 = data.taskboards;
             //   alert(data2);
    //             alert('5555');
                  //alert(data[0].name);
          //    alert($scope.boardname[1].taskboards[0].name);
            //  alert($scope.boardname[2].name);
             
                $scope.addProductbacklog = function() {
                    $scope.list0.push({description:$scope.addTitle, 'drag': true});
                    $scope.addTitle = '';
                    $scope.dropCallbacklist();
                };

                 $scope.addTodo = function() {
                    $scope.list1.push({title:$scope.addSprint1, 'drag': true});
                    $scope.addSprint1 = '';
                    $scope.dropCallbacklist();
                };


             
                $scope.remaining = function() {
                    var count = 0;
                    angular.forEach($scope.todos, function(todo) {
                    count += todo.done ? 0 : 1;
                    });
                    return count;
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


             //   var res = $http.post('/recievedboard', test);
               
           
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

            //    alert($scope.nowteam.taskboards[0].name);
            //    alert($scope.data1[0]._id);
                //alert($scope.boardid);
          //      alert($scope.teamid);
     //           alert($scope.objnowteam.taskboards[0].list1);

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

                // $http({
                //     method: 'POST',
                //     url: '/recievedboard',
                //     data: $scope.nowteam
                // }).success(function () {});

            }).


            error(function(data, status, headers, config) {
                alert('error');
            });


            //$http.post('/recievecboard', ).success(successCallback);
    }]);


angular.element(document).ready(function() {
      angular.bootstrap(document, ['scrumFramework']);
    });