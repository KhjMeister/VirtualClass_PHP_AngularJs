//Reference File app.js
myApp1.controller('panel_contrloer', function ($scope, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/ostad/";


  
    vm.user;
    vm.messages;
    vm.allusers;
    
        function load() {
        $http.get(URL + 'getUser').then(function (response) {
           vm.user = response.data;
            // console.log(vm.user);
        });
     $http.get(URL + 'getMessages').then(function (response) {
           vm.messages = response.data;
            // console.log(vm.messages);
            angular.forEach(vm.messages, function(item) {
                   if(item.user===vm.user[1]){
                    
                    item.me=true;
                    // console.log(item);
                   }

                });
            setTimeout(function() {
            load();}, 2000);
        });
    };
    load();

    this.saveMessage = function (info) {
        
        $http.post(URL + 'saveMessages', info).then(function (response) {
            // console.log(info);
            vm.messages = response.data;
            console.log(vm.messages);
            angular.forEach(vm.messages, function(item) {
                   if(item.user===vm.user[1]){
                        item.me=true;
                   }

                });
             
        });
    };
this.showDarss = function () {
            $http.get(URL + 'showDarss').then(function (response) {
                vm.Darsssq=null;
                vm.Darssq= response.data.darssq_data;
                
                vm.Darsssq=vm.Darssq[0];
                // console.log(vm.Darsssq);

   
            });
        };
        this.showDars = function () {
            $http.get(URL + 'showDars').then(function (response) {
                vm.Darss = null;
                vm.Dars= response.data.dars_data;
                
                vm.Darss=vm.Dars[0][0];
                // console.log(vm.Darss);

   
            });
        };
 this.darsID = function (did) {
           $http.get(URL + 'darsid?did=' + did).then(function (response) {
                  
            });
        };

this.setdarsID = function (did) {
           $http.get(URL + 'setdarsID').then(function (response) {
                  
            });
        };

this.resetmessages = function () {
           $http.get(URL + 'resetmessages').then(function (response) {
                  
            });
        };

});

