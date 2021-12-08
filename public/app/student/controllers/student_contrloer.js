//Reference File app.js
myApp2.controller('student_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/student/";


	vm.user;
    vm.messages;
    vm.allusers;
    
        $http.get(URL + 'getStudentProfile').then(function (response) {
            vm.view_student_info = response.data;
      

        });
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

	       this.loadStuProfile = function () {
  $http.get(URL + 'getStudentProfile').then(function (response) {
           vm.ostad_prof = response.data;
            // console.log(vm.ostad_prof);
        });
};

 this.EditStuSetting= function (admin_prof) {
        vm.adddd = admin_prof;
        vm.adddd.lspic = admin_prof.spic;
        console.log();
        var fd = new FormData();
        var files = document.getElementById('file').files[0];
        
       


        fd.append('file',files);
        vm.adddd.spic=files.name;
        
         $http({
                       method: 'post',
                       url: URL +'uploadPic'  ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                                   
        $http.put(URL + 'EditStuSetting', vm.adddd).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");
            vm.loadData($scope.currentPage);
            $('#edit_prof_modal').modal('toggle');
            
            
            
        });

                      });
        
    };
 this.EditSecStuSetting= function (admin_prof) {
        vm.adddd = admin_prof;     
                                   
        $http.put(URL + 'EditSecStuSetting', vm.adddd).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");
            vm.loadData($scope.currentPage);
            $('#edit_prof_modal').modal('toggle');
            
            
            
        });

                      
        
    };


    
});

