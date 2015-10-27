angular.module("app.controllers.dashboardCtrl", [])
    .controller('dashboardCtrl', function ($scope, $log, $http, variableFactory) {
        $log.debug('init dashboardCtrl');

        $http.get(variableFactory.apiUrl+'/messages').then(function (response) {
            $scope.items = response.data.items;
        });

        $scope.deleteItem = function(id) {
            $log.debug(id);
            $http.delete(variableFactory.apiUrl + '/messages/' + id).then(function(){
                $http.get(variableFactory.apiUrl+'/messages').then(function (response) {
                    $scope.items = response.data.items;
                });
            });
        };

    })
    .controller('dashboardUpdateCtrl', function ($scope, $log, $http, $routeParams, variableFactory) {

        $log.debug('init dashboardUpdateCtrl');

        $http.get(variableFactory.apiUrl+'/messages/'+$routeParams.id).then(function (response) {
            $scope.item = response.data;
        });
    });