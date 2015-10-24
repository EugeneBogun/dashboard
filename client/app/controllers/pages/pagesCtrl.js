angular.module("app.controllers.pagesCtrl", [])
    .controller('pagesCtrl', function ($scope, $log, $http) {
        $log.debug('init pagesCtrl');
        //$scope.dashboard = dashboard;
        $http.get('/mock/pages.json').then(function (response) {
            $scope.items = response.data.items;
        });
    });