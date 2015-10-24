angular.module("app.controllers.dashboardCtrl", [])
    .controller('dashboardCtrl', function ($scope, $log, $http) {
        $log.debug('init dashboardCtrl');
        //$scope.dashboard = dashboard;
        $http.get('/mock/dashboard.json').then(function (response) {
            $scope.list = response.data.list;
        });
    });