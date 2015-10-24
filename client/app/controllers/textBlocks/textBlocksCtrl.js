angular.module("app.controllers.textBlocksCtrl", [])
    .controller('textBlocksCtrl', function ($scope, $log, $http) {
        $log.debug('init textBlocksCtrl');
        //$scope.dashboard = dashboard;
        $http.get('/mock/text-blocks.json').then(function (response) {
            $scope.items = response.data.items;
        });
    });