var myApp1 = angular.module('example_codeenable', ['ui.router', 'smart-table' ,'ui.bootstrap']);

myApp1.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/ostad');
    $stateProvider
    .state('/ostad', {
                url: '/ostad',
                templateUrl: 'app/ostad/templates/dashboard.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/profile', {
                url: '/ostad/profile',
                templateUrl: 'app/ostad/templates/profile.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/setting', {
                url: '/ostad/setting',
                templateUrl: 'app/ostad/templates/setting.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
     .state('/darsShow', {
                url: '/ostad/darsShow',
                templateUrl: 'app/ostad/templates/dars.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/darsAdd', {
                url: '/ostad/darsAdd',
                templateUrl: 'app/ostad/templates/darsAdd.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
     .state('/dars', {
                url: '/ostad/dars',
                templateUrl: 'app/ostad/templates/indars.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            }) 
      .state('/editdars', {
                url: '/ostad/editdars',
                templateUrl: 'app/ostad/templates/editdars.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })            
        .state('/chats', {
                url: '/ostad/chats',
                templateUrl: 'app/ostad/templates/chat.html',
                controller: 'panel_contrloer',
                controllerAs: "p_ctrl"

            }) 
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true
    });




});

