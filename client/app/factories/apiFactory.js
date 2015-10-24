angular.module("app.factories.apiFactory", [])
    .factory('apiFactory', function ($scope, $log, $http) {
        $log.debug('init apiFactory');
        //function parse_response(response) {
        //    /* TODO: VALIDATE */
        //    return response;
        //}
        //
        //function query(url) {
        //    return $http.get(url).$promise.then(function (response) {
        //        return parse_response(response);
        //    });
        //}

        return {
            'test' : function(){
                console.log(1);
            }
            //getDashboard: function () {
            //    console.log("Get dashboard data");
            //    return "Test";
            //    //query('mock/dashboard.json');
            //},
            //getUsers: function () {
            //    return query('mock/users.json');
            //    //return $http.get('mock/users.json').$promise;
            //}
        };
    });