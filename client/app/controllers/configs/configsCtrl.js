angular.module("app.controllers.configsCtrl", [])
    .controller('configsCtrl', function ($scope, $log, $http) {
        $log.debug('init configsCtrl');
        //$scope.dashboard = dashboard;
        $http.get('/mock/configs.json').then(function (response) {
            $scope.items = response.data.items;
        });
    });