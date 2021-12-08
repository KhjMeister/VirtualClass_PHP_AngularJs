var myApp2 = angular.module('example_codeenable', ['ui.router', 'ui.bootstrap']);

myApp2.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/student');
    $stateProvider
    .state('/student', {
                url: '/student',
                templateUrl: 'app/student/templates/dashboard.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/profile', {
                url: '/student/profile',
                templateUrl: 'app/student/templates/profile.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/setting', {
                url: '/student/setting',
                templateUrl: 'app/student/templates/setting.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/dars', {
                url: '/student/dars',
                templateUrl: 'app/student/templates/dars.html',
                controller: 'dars_contrloer',
                controllerAs: "d_ctrl"

            })
    .state('/chat', {
                url: '/student/chat',
                templateUrl: 'app/student/templates/chat.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    
            
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true
    });




});

