var myApp = angular.module('example_codeenable', ['ui.router', 'smart-table', 'ui.bootstrap']);

myApp.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/admin');
    $stateProvider
    .state('/admin', {
                url: '/admin',
                templateUrl: 'app/admin/templates/dashboard.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/profile', {
                url: '/admin/profile',
                templateUrl: 'app/admin/templates/profile.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/setting', {
                url: '/admin/setting',
                templateUrl: 'app/admin/templates/setting.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/ostadShow', {
                url: '/admin/ostadShow',
                templateUrl: 'app/admin/templates/student.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/ostadAdd', {
                url: '/admin/ostadAdd',
                templateUrl: 'app/admin/templates/ostadAdd.html',
                controller: 'student_contrloer',
                controllerAs: "std_ctrl"

            })
    .state('/daneshjooShow', {
                url: '/admin/daneshjooShow',
                templateUrl: 'app/admin/templates/daneshjooShow.html',
                controller: 'ostad_contrloer',
                controllerAs: "ost_ctrl"

            })
    .state('/daneshjooAdd', {
                url: '/admin/daneshjooAdd',
                templateUrl: 'app/admin/templates/daneshjooAdd.html',
                controller: 'ostad_contrloer',
                controllerAs: "ost_ctrl"

            })
    .state('/indexSetting', {
                url: '/admin/indexSetting',
                templateUrl: 'app/admin/templates/indexSetting.html',
                controller: 'panel_contrloer',
                controllerAs: "pnl_ctrl"

            })
    .state('/conUsSetting', {
                url: '/admin/conUsSetting',
                templateUrl: 'app/admin/templates/conUsSetting.html',
                controller: 'panel_contrloer',
                controllerAs: "pnl_ctrl"

            })
    .state('/addposts', {
                url: '/admin/addposts',
                templateUrl: 'app/admin/templates/addposts.html',
                controller: 'panel_contrloer',
                controllerAs: "pnl_ctrl"

            })
    .state('/editposts', {
                url: '/admin/editposts',
                templateUrl: 'app/admin/templates/editposts.html',
                controller: 'panel_contrloer',
                controllerAs: "pnl_ctrl"

            })
    .state('/logout', {
                url: '/admin/logout',
                templateUrl: 'app/admin/templates/logo.html',
                controller: 'panel_contrloer',
                controllerAs: "pnl_ctrl"

            })
 

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true
    });




});

