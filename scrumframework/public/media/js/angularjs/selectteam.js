angular.module('scrumFramework')
  .controller('SelectController', ['$scope', function($scope) {
    $scope.teams = [
      {name:'black'},
      {name:'white'},
      {name:'red'},
      {name:'blue'},
      {name:'yellow'}
    ];
    $scope.myTeam = $scope.teams[0]; // red
  }]);