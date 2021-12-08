//Reference File app.js
myApp.controller('panel_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/admin/";
   
this.getAllPosts = function () {
            $http.get(URL + 'getAllPostss').then(function (response) {
                vm.allstudent= response.data.posts_data;
                
                vm.allPosts=vm.allstudent[0];


                $scope.loading = false;
                // console.log(vm.allstudents);

   
            });
        };
this.logot = function () {
            $http.get(URL + 'logout').then(function (response) {

            });
          };

 this.editPosts = function (info) {
        
        $http.post(URL + 'editPosts', info).then(function (response) {
            vm.msg = response.data.message;
             new Snackbar("<i class='fa fa-plus'> &nbsp;&nbsp;&nbsp; ویرایش شد</i> ");

        });
    };
   
this.showPost = function (poid) {
        $http.get(URL + 'showPost?poid=' + poid).then(function (response) {
           
        vm.all= response.data.post_data;
                
                vm.mypost=vm.all[0][0];
                

            
        });
    };

this.delReport = function (poid) {
        $http.delete(URL + 'delReport?poid=' + poid).then(function (response) {
            vm.msg = response.data.message;
            new Snackbar("<i class='fa fa-close'>&nbsp;&nbsp;&nbsp; حذف شد</i> ");
            //  
            
        });
    };

this.delPost = function (poid) {
        $http.delete(URL + 'delPost?poid=' + poid).then(function (response) {
            vm.msg = response.data.message;
            new Snackbar("<i class='fa fa-close'>&nbsp;&nbsp;&nbsp; حذف شد</i> ");
            //  
            
        });
    };

    this.addPosts = function (info) {
        
        $http.post(URL + 'addPosts', info).then(function (response) {
            vm.msg = response.data.message;
             new Snackbar("<i class='fa fa-plus'> &nbsp;&nbsp;&nbsp; اضافه شد</i> ");

        });
    };



  this.showCrudelPic = function () {
            $http.get(URL + 'showCrudelPic').then(function (response) {
                vm.cpss=null;
                vm.files= response.data.cp;
                
                vm.cpss=vm.files[0];
   
            });
        };



        this.showRepError = function () {
            $http.get(URL + 'showRepError').then(function (response) {
                vm.ras=null;
                vm.ra= response.data.re;
                  $scope.loading = false;
                vm.ras=vm.ra[0];
   
            });
        };

this.addNewqusan = function (info) {
        
        $http.post(URL + 'addNewqusan', info).then(function (response) {
            vm.msg = response.data.message;
             new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; اضافه شد</i> ");

            

        });
    };
                this.addNewpics = function (info) {
                    // console.log(info['pic_id']);
                     var myf=info;
                        var iddd=info.pic_id;
                        var foo= 'file'+iddd;
                      var fd = new FormData();
                      var files = document.getElementById(foo).files[0];
                      fd.append('file',files);
                      var lastFileName = myf.name;
                        
                      var link= "http://localhost/virtualClass/assets/myimg/" + files.name;
                      
                      myf.id = info.pic_id;
                      myf.link=link;
                      myf.name=files.name;

                      var ser=myf;
                      ser.lname = lastFileName;
                        // console.log(ser);
                       $http({
                       method: 'post',
                       url: URL + 'uploadCrusssPic' ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                        $http.post(URL + 'addNewCursPics' , ser).then(function (response) {
                           vm.ggg= response.data;
                           new Snackbar("");
                            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");

                            vm.showCrudelPic();
                           
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde = "alert-success";
                            
                        });

                      });

                    
                     };

});

