angular.module("app.controllers.usersCtrl", [])
    .controller('usersCtrl', function ($scope, $log, $http) {
        $log.debug('init usersCtrl');

        $http.get('/mock/users.json').then(function (response) {
            $scope.items = response.data.items;
        });

    });