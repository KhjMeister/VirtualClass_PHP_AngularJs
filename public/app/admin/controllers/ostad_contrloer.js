//Reference File app.js
myApp.controller('ostad_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/admin/";

     this.DaneshjooDetails = function (){
        $http.get(URL + 'DaneshjooDetails').then(function (response) {
           vm.mydaneshjoo = response.data.student_data[0];
           // console.log(vm.ostads_details );
           
        });
    };
  


    this.addDaneshjoo = function (info) {
        
         var stat =1;

            angular.forEach(vm.mydaneshjoo ,function(item) {

                   if(info.suser===item.suser){
                   
                            stat=0;
                    }
                });
        
            if(stat===1){

        $http.post(URL + 'adddaneshjoo', info).then(function (response) {
            vm.msg = response.data.message;
             new Snackbar("<i class='fa fa-plus'> &nbsp;&nbsp;&nbsp; اضافه شد</i> ");
            $('#create_student_info_modal').modal('toggle');
            vm.DaneshjooDetails();

        });
    }else{
             new Snackbar("<i class='fa fa-close'> &nbsp;&nbsp;&nbsp; این نام کاربری از قبل وجود دارد</i> ");

    }
    };

    this.edit_student_info = function (sid) {
        $http.get(URL + 'getOnedaneshjoo?sid=' + sid).then(function (response) {
            vm.student_info = response.data;
        });
    };


    this.upOstad= function () {
        $http.put(URL + 'Editdaneshjoo', this.student_info).then(function (response) {
            vm.msg = response.data.message;
            $('#edit_student_info_modal').modal('toggle');
            new Snackbar("<i class='fa fa-edit'> &nbsp;&nbsp;&nbsp; ویرایش شد</i>");
            vm.DaneshjooDetails();
           
        });
    };


    this.get_student_info = function (sid) {
        $http.get(URL + 'getOnedaneshjoo?sid=' + sid).then(function (response) {
            vm.view_student_info = response.data;
            // console.log(vm.view_student_info);
        });
    };
 
    this.delete_student_info = function (sid) {
        $http.delete(URL + 'deldaneshjoo?sid=' + sid).then(function (response) {
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
              new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; حذف شد</i> ");
            vm.DaneshjooDetails();
           
        });
    };



});

