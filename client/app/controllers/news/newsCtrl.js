angular.module("app.controllers.newsCtrl", [])
    .controller('newsCtrl', function ($scope, $log, $http) {
        $log.debug('init newsCtrl');
        //$scope.dashboard = dashboard;
        $http.get('/mock/news.json').then(function (response) {
            $scope.items = response.data.items;
        });
    });