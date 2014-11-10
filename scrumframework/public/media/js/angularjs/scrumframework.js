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
                $scope.list0 = [
                    { 'description': 'test', 'drag': true },
                    { 'title': null, 'drag': true }];
             
                $scope.addProductbacklog = function() {
                    $scope.list0.push({description:$scope.addTitle, 'drag': true});
                    $scope.addTitle = '';
                    $scope.dropCallbacklist0();
                };

                 $scope.addTodo = function() {
                    $scope.list1.push({title:$scope.addSprint1, 'drag': true});
                    $scope.addSprint1 = '';
                    $scope.dropCallbacklist1();
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
                     alert("666");
                };
                    
                $scope.onDrop = function($event,$data,array){
                    array.push($data);
                };

                $scope.list1 = [];
                $scope.list2 = [
                { 'title': 'Item 1', 'drag': true },
                { 'title': 'Item 2', 'drag': true },
                { 'title': 'Item 3', 'drag': true }]; 
                $scope.list3 = [];

             //   var res = $http.post('/recievedboard', test);
               
           
                angular.forEach($scope.data1, function(item, key) {
                    if(item._id == $scope.teamid)
                    {
                        $scope.nowteam = $scope.data1[key]._id;
                    }
                })
                //alert($scope.nowteam.taskboards[0].name);
            //    alert($scope.data1[0]._id);
                //alert($scope.boardid);
          //      alert($scope.teamid);

                var currentteam = $scope.nowteam;
                var curentboard = $scope.boardid;
                var pbacklog = $scope.list0;

                $scope.dropCallbacklist0 = function() {
                    var allsend  = { team : $scope.nowteam, board : $scope.boardid, list:'list0', pbacklog : $scope.list0};
                    $http.post('/recievedboard', allsend);
                };
                $scope.dropCallbacklist1 = function() {
                    var allsend  = { team : $scope.nowteam, board : $scope.boardid, list:'list1', pbacklog : $scope.list1};
                    $http.post('/recievedboard', allsend);
                };
                $scope.dropCallbacklist2 = function() {
                    var allsend  = { team : $scope.nowteam, board : $scope.boardid, list:'list2', pbacklog : $scope.list2};
                    $http.post('/recievedboard', allsend);
                };
                $scope.dropCallbacklist3 = function() {
                    var allsend  = { team : $scope.nowteam, board : $scope.boardid, list:'list3', pbacklog : $scope.list3};
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