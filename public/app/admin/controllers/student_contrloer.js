//Reference File app.js
myApp.controller('student_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/admin/";
    $scope.currentPage = 1;
    $scope.maxSize = 3;
 
 this.addOstad = function (info) {
    var stat =1;

            angular.forEach(vm.ostads_details ,function(item) {

                   if(info.ouser===item.ouser){
                   
                            stat=0;
                    }
                });
        
            if(stat===1){

                $http.post(URL + 'addOstad', info).then(function (response) {
                vm.msg = response.data.message;
                // vm.alert_class = 'custom-alert';
                 
                // document.getElementById("create_student_info_frm").reset();
                new Snackbar("<i class='fa fa-plus'>&nbsp;&nbsp;&nbsp;  اضافه شد</i> ");
                $('#create_student_info_modal').modal('toggle');
                vm.OstadsDetails();
            });

            }else{
                 new Snackbar("<i class='fa fa-close'>&nbsp;&nbsp;&nbsp; این نام کاربری از قبل وجود دارد</i> ");

            }
            
        
        
    };
 this.getCountStu = function (){
       $http.get(URL + 'getCountStu').then(function (response) {
           vm.Stu_c_details = response.data.Stu_data[0][0];
           // console.log(vm.ostads_details );
           
        });
    };
     this.getCountOst = function (){
       $http.get(URL + 'getCountOst').then(function (response) {
           vm.Ost_c_details = response.data.Ost_data[0][0];
           // console.log(vm.ostads_details );
           
        });
    };
        $http.get(URL + 'OstadsDetails').then(function (response) {
           vm.ostads_details = response.data.ostad_data[0];
           // console.log(vm.ostads_details );
           
        });
     
 this.OstadsDetails = function (){
       $http.get(URL + 'OstadsDetails').then(function (response) {
           vm.myostads_details = response.data.ostad_data[0];
           // console.log(vm.ostads_details );
           
        });
    };
    this.loadAdminProfile = function (){
        $http.get(URL + 'getAdminProfile').then(function (response) {
           vm.admin_prof = response.data;
       
        });
    };
 this.up_ad_prof= function () {
        $http.put(URL + 'Editadmin', this.admin_prof).then(function (response) {
            vm.msg = response.data.message;
            // $('#edit_prof_modal').modal('toggle');
            vm.OstadsDetails();
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");
            
            
        });
    };
    this.setting_up_ad_prof= function (admin_prof) {
        vm.adddd = admin_prof;
        vm.adddd.lpic=admin_prof.pic;
        var fd = new FormData();
        var files = document.getElementById('file').files[0];
        fd.append('file',files);
        vm.adddd.pic=files.name;
         $http({
                       method: 'post',
                       url: URL +'uploadPic'  ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                                   
        $http.put(URL + 'EditadminSetting', vm.adddd).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp;  ویرایش شد</i> ");
            vm.OstadsDetails();
           
            $('#edit_prof_modal').modal('toggle');
            
            
            
        });

                      });
        
    };


   
    this.edit_student_info = function (oid) {
        $http.get(URL + 'getOneOstad?oid=' + oid).then(function (response) {
            vm.student_info = response.data;
        });
    };



    this.upOstad= function () {
        $http.put(URL + 'EditOstad', this.student_info).then(function (response) {
            vm.msg = response.data.message;
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");;
            vm.OstadsDetails();
   
            $('#edit_student_info_modal').modal('toggle');
            
         
        });
    };


    this.get_student_info = function (oid) {
        $http.get(URL + 'getOneOstad?oid=' + oid).then(function (response) {
            vm.view_student_info = response.data;



        });
        
    };
 
    this.delete_student_info = function (oid) {
        $http.delete(URL + 'delOstad?oid=' + oid).then(function (response) {
            vm.msg = response.data.message;
            new Snackbar("<i class='fa fa-close'>&nbsp;&nbsp;&nbsp; حذف شد</i> ");
            vm.OstadsDetails();
           
            //  
            
        });
    };

 
   

});

