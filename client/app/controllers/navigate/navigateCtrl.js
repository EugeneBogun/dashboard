angular.module("app.controllers.navigateCtrl", [])
    .controller('navigateCtrl', function ($scope, $log, $location) {
        $log.debug('init navigateCtrl');

        $scope.getClass = function (path) {
            return $location.path() == path?'active':'';
        };
    });