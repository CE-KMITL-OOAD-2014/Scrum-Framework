angular.module('scrumFramework')
    .controller('ShowteamController', ['$scope','$http', function($scope, $http) {
        $http.get('/gettestteam').
         
            success(function(data, status, headers, config) {    
            $scope.teams = data;
            $scope.myTeam = data[0];
            }).
            error(function(data, status, headers, config) {
                alert('error');
            });
    }]);


angular.element(document).ready(function() {
      angular.bootstrap(document, ['scrumFramework']);
    });