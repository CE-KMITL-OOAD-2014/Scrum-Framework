angular.module('todoApp',  ['ngDragDrop'])
    .controller('TodoController', ['$scope', function($scope) {
        $scope.list0 = [
            { 'description': 'aaaaa', 'drag': true },
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
    { 'title': 'Item 112333', 'drag': true },
    { 'title': 'Item 2', 'drag': true },
    { 'title': 'Item 3', 'drag': true },
    { 'title': 'Item 4', 'drag': true },
    { 'title': 'Item 5', 'drag': true },
    { 'title': 'Item 6', 'drag': true },
    { 'title': 'Item 7', 'drag': true },
    { 'title': 'Item 8', 'drag': true }
  ]; 
    $scope.list3 = [];
    }]);
