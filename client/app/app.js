angular.module('app', [
    'ngSanitize',
    'ngRoute',
    'app.factories',
    'app.controllers',
    'app.templates'
])
    .config(function ($logProvider) {
        $logProvider.debugEnabled(true);

    })
    .config(['$routeProvider', '$locationProvider', function ($routeProvide, $locationProvider) {
        $locationProvider.html5Mode({enabled:true, requireBase:false});
        $routeProvide
            .when('/', {
                templateUrl: '/dashboard/dashboard.html',
                controller: 'dashboardCtrl'
                ,
                resolve: {
                    data: function () {
                        //apiFactory.test();
                        console.log('getDashboard');
                        return 'test';
                        //apiFactory.getDashboard();
                    }
                }
            })
            .when('/users', {
                templateUrl: '/users/users.html',
                controller: 'usersCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });
    }])
    .run(function ($rootScope, $location) {

    });