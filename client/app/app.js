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
            })
            .when('/users', {
                templateUrl: '/users/users.html',
                controller: 'usersCtrl'
            })
            .when('/pages', {
                templateUrl: '/pages/pages.html',
                controller: 'pagesCtrl'
            })
            .when('/news', {
                templateUrl: '/news/news.html',
                controller: 'newsCtrl'
            })
            .when('/text-blocks', {
                templateUrl: '/textBlocks/textBlocks.html',
                controller: 'textBlocksCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });
    }])
    .run(function ($rootScope, $location) {

    });