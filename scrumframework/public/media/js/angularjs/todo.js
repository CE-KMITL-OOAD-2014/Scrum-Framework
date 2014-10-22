angular.module('todoApp',  ['ngDragDrop'])
    .controller('TodoController', ['$scope','$http', function($scope, $http) {
        $http.get('/gettaskboard').
         
            success(function(data, status, headers, config) {
                $scope.boardname = data;
              //  alert(data[2].name);
              //  alert($scope.boardname[2].name);
                $scope.list0 = [
                    { 'description': 'test', 'drag': true },
                    { 'title': null, 'drag': true }];
             
                $scope.addProductbacklog = function() {
                    $scope.list0.push({description:$scope.addTitle, 'drag': true});
                    $scope.addTitle = '';
                };

                 $scope.addTodo = function() {
                    $scope.list1.push({title:$scope.addSprint1, 'drag': true});
                    $scope.addSprint1 = '';
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

                $scope.list1 = [];
                $scope.list2 = [
                { 'title': 'Item 1', 'drag': true },
                { 'title': 'Item 2', 'drag': true },
                { 'title': 'Item 3', 'drag': true }]; 
                $scope.list3 = [];

            }).
            error(function(data, status, headers, config) {
                alert('error');
            });
}]);

