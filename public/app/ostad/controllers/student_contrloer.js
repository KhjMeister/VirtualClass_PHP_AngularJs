//Reference File app.js
myApp1.controller('student_contrloer', function ($scope, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/ostad/";


    $scope.currentPage = 1;
    $scope.maxSize = 3;
    // this.search_data = function (search_input) {
    //     if (search_input.length > 0)
    //         vm.loadData(1);

    // };
    this.loadOstadProfile = function () {
  $http.get(URL + 'getOstadProfile').then(function (response) {
           vm.ostad_prof = response.data;
            // console.log(vm.ostad_prof);
        });
};

 this.darsDetails = function (){
       $http.get(URL + 'darsDetails').then(function (response) {
           vm.mydars = response.data.dars_data[0];
           // console.log(vm.ostads_details );
           
        });
    };
 this.EditOstadSetting= function (admin_prof) {
        vm.adddd = admin_prof;
        vm.adddd.lopic = vm.ostad_prof.opic;
        console.log(vm.adddd.lopic);
        var fd = new FormData();
        var files = document.getElementById('file').files[0];
        
       


        fd.append('file',files);
        vm.adddd.opic=files.name;
        
         $http({
                       method: 'post',
                       url: URL +'uploadPic'  ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                                   
        $http.put(URL + 'EditOstadSetting', vm.adddd).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");
            vm.darsDetails();
            $('#edit_prof_modal').modal('toggle');
            
            
            
        });

                      });
        
    };
 this.EditSecSetting= function (admin_prof) {
        vm.adddd = admin_prof;     
                                   
        $http.put(URL + 'EditSecSetting', vm.adddd).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ویرایش شد</i> ");
            vm.darsDetails();
            
            $('#edit_prof_modal').modal('toggle');
            
            
            
        });

                      
        
    };





    this.showResaultTest = function (qid){
        $http.get(URL + 'showResaultTest?qid=' + qid).then(function (response) {

                
                vm.resaulttest=response.data;
                // var students;
                // angular.forEach(vm.resaulttest, function(item) {
                //    students=vm.getonestudent(item.s_id);
                // });
                // console.log(vm.resaulttest);


            });
    };
    this.getonestudent = function (id){
        $http.get(URL + 'getonestudent?sid=' + id).then(function (response) {
                  vm.resaname=null;
                vm.films= response.data.stidentname;
                
                vm.resaname=vm.films[0][0];
                // console.log(vm.resaulttest);
                return vm.resaname;
            });
    };
    
  this.Initstatus = function(did) {
        $http.get(URL + 'Initstatus?did=' + did).then(function (response) {
                  
            });
   };
   this.endTime = function(qid) {
        $http.get(URL + 'endQuezTime?qid=' + qid).then(function (response) {
                 new Snackbar("<i class='fa  fa-clock-o'> &nbsp;&nbsp;&nbsp; کوئیز پایان یافت</i> ");
                  
            });
   };
  
    // this.loadData = function (page_number) {
    //     var search_input = document.getElementById("search_input").value;
        
    //     $http.get(URL + 'getAlldars?page=' + page_number + '&search_input=' + search_input).then(function (response) {
    //         vm.ostads_list = response.data.ostad_data;
    //         $scope.total_roww = response.data.total;
    //         $scope.total_row=$scope.total_roww[0][0]["COUNT(*)"];
    //         vm.dars_list=vm.ostads_list[0];
    //         // console.log(vm.dars_list);
    //     });
        
    // };

    $scope.$watch('currentPage + numPerPage', function () {

            vm.darsDetails();
        

        var begin = (($scope.currentPage - 1) * $scope.numPerPage)
                , end = begin + $scope.numPerPage;


    });
   
   

    this.adddars = function (info) {
        
        $http.post(URL + 'adddars', info).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
             new Snackbar("<i class='fa fa-plus'></i> اضافه شد");
             
            // document.getElementById("create_student_info_frm").reset();
            $('#create_student_info_modal').modal('toggle');
            vm.darsDetails();
 

        });
    };

    this.edit_student_info = function (did) {
        $http.get(URL + 'getOnedars?did=' + did).then(function (response) {
            vm.student_info = response.data;
        });
    };


    this.updars= function () {
        $http.put(URL + 'Editdars', this.student_info).then(function (response) {
            vm.msg = response.data.message;
            // vm.alert_class = 'custom-alert';
             new Snackbar("<i class='fa fa-edit'></i> ویرایش شد");

            $('#edit_student_info_modal').modal('toggle');
            vm.darsDetails();
           
           
            
            
        });
    };


    this.get_student_info = function (did) {
        $http.get(URL + 'getOnedars?did=' + did).then(function (response) {
            vm.view_student_info = response.data;

        });
       
    };
 
    this.delete_student_info = function (did) {
        $http.delete(URL + 'deldars?did=' + did).then(function (response) {
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
             new Snackbar("<i class='fa fa-close'></i> حذف شد");

             
            vm.darsDetails();
     
            
        });
    };

  
	    this.darsID = function (did) {
	       $http.get(URL + 'darsid?did=' + did).then(function (response) {
	              
	        });
	    };
        
        this.showStudent = function () {
            $http.get(URL + 'showStudent').then(function (response) {
                vm.stus=null;
                vm.stu= response.data.stu_data;
                
                vm.stus=vm.stu[0];
                // console.log(vm.stus);

   
            });
        };
        this.showTest = function () {
            $http.get(URL + 'showTest').then(function (response) {
                vm.tests=null;
                vm.test= response.data.test_data;
                
                vm.tests=vm.test[0];
                // console.log(vm.tests);

   
            });
        };
        
	    this.showDars = function () {
	        $http.get(URL + 'showDars').then(function (response) {
                vm.Darss=null;
               
	            vm.Dars= response.data.dars_data;
    			
	            vm.Darss=vm.Dars[0][0];
	            // console.log(vm.Darss);

   
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

		this.showFilms = function () {
	        $http.get(URL + 'showFilms').then(function (response) {
                vm.filmss=null;
	            vm.films= response.data.film_data;
    			
	            vm.filmss=vm.films[0];
   
	        });
	    };
	    this.showFiles = function () {
	        $http.get(URL + 'showFiles').then(function (response) {
                vm.filesss=null;
	            vm.files= response.data.file_data;
    			
	            vm.filesss=vm.files[0];
   
	        });
	    };
	   this.showNotif = function () {
	        $http.get(URL + 'showNotif').then(function (response) {
                vm.notifsss=null;
	            vm.notifs= response.data.notif_data;
    			
	            vm.notifsss=vm.notifs[0];
   
	        });
	    };

        this.showOneFilm = function (fid) {
            $http.get(URL + 'showOneFilm?fid=' + fid).then(function (response) {
                vm.onefilm=null;
                vm.filmo= response.data.filmo_data;
                
                vm.onefilm=vm.filmo[0][0];


            });
        };
        this.showOneFile = function (iid) {
            $http.get(URL + 'showOneFile?iid=' + iid).then(function (response) {
                vm.onefile=null;
                vm.fileo= response.data.fileo_data;
                
                vm.onefile=vm.fileo[0][0];
              
      
            });
        };
        this.showOneNot = function (nid) {
            $http.get(URL + 'showOneNot?nid=' + nid).then(function (response) {
                vm.onenotif=null;
                vm.notif= response.data.notif_data;
                
                vm.onenotif=vm.notif[0][0];
    
            });
        };
        this.showOneText = function (qid) {
            $http.get(URL + 'showOneText?qid=' + qid).then(function (response) {
                vm.onenotest=null;
                vm.testtt= response.data.test_data;
                
                vm.onenotest=vm.testtt[0][0];
    
            });
        };
        

            this.addNewFilm = function (info) {
                vm.myfilem = info;
                 var fd = new FormData();
                var files = document.getElementById('file').files[0];
                fd.append('file',files);
                    
                var link= "http://localhost/virtualClass/uploads/films/" + files.name;
                vm.myfilem.type=files.type;
                 vm.myfilem.name=files.name;
                      vm.myfilem.link=link;
                      var seee= vm.myfilem;
                       $http({
                       method: 'post',
                       url: URL + 'uploadFilm' ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                        $http.post(URL + 'addNewFilm' , seee).then(function (response) {
                           
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde= "alert-success";
                             new Snackbar("<i class='fa fa-plus'></i> اضافه شد");

                            
                        });

                      });

                    
            };
             

            this.addNewFile = function (info) {
                    vm.myfilee = info;
                
                    
                    
                      var fd = new FormData();
                      var files = document.getElementById('file1').files[0];
                      fd.append('file',files);
                    
                      var link= "http://localhost/virtualClass/uploads/files/" + files.name;
                      vm.myfilee.type=files.type;
                      vm.myfilee.name=files.name;
                      vm.myfilee.link=link;
                      var ser= vm.myfilee;
                       $http({
                       method: 'post',
                       url: URL + 'uploadFile' ,
                       data: fd,
                       headers: {'Content-Type': undefined},
                      }).then(function successCallback(response) { 

                        $http.post(URL + 'addNewFile' , ser).then(function (response) {
                           vm.ggg= response.data;
                           // console.log(vm.ggg);
                            //  
                            new Snackbar("<i class='fa fa-plus'></i> اضافه شد");
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde = "alert-success";
                            
                        });

                      });

                    
                     };

            this.addnewNotif = function (info) {
                  
                 $http.post(URL + 'addnewNotif' , info).then(function (response) {
                           
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde = "alert-success";
                            new Snackbar("<i class='fa fa-plus'>&nbsp;&nbsp;&nbsp; اضافه شد</i>");
                            
                        });

                     };
                this.addnewTest = function (info) {
                  
                 $http.post(URL + 'addnewTest' , info).then(function (response) {
                           
                              
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde = "alert-success";
                            new Snackbar(" <i class='fa fa-plus'>&nbsp;&nbsp;&nbsp; اضافه شد</i> ");
                            
                        });

                     };

    this.deletFilm = function (fid) {
        $http.get(URL + 'deletFilm?fid=' + fid).then(function (response) {
                
            new Snackbar("<i class='fa fa-close'></i> حذف شد");
      
            });

    };
this.deletFile = function (iid) {
        $http.get(URL + 'deletFile?iid=' + iid).then(function (response) {
                
            new Snackbar("<i class='fa fa-close'></i> حذف شد");
      
            });

    };
    this.deletNotif = function (nid) {
        $http.get(URL + 'deletNotif?nid=' + nid).then(function (response) {
                
            new Snackbar("<i class='fa fa-close'></i> حذف شد");
      
            });

    };
    this.deletStu = function (tid) {
        $http.get(URL + 'deletStu?tid=' + tid).then(function (response) {
                new Snackbar("<i class='fa fa-close'></i> حذف شد");
            
      
            });

    };
    this.deletTest = function (qid) {
        $http.get(URL + 'deletTest?qid=' + qid).then(function (response) {
                new Snackbar("<i class='fa fa-close'></i> حذف شد");
            
      
            });

    };

    this.getAllStudents = function () {
            $http.get(URL + 'getAllStudents').then(function (response) {
                vm.allstudent= response.data.allstudent_data;
                
                vm.allstudents=vm.allstudent[0];

                $scope.loading = false;
                // console.log(vm.allstudents);

   
            });
        };
        this.addToDars = function (id) {
            $http.get(URL + 'addToDars?sid='+id).then(function (response) {
                    vm.msg=response.data;
                    new Snackbar(vm.msg.message);
            });
        };
        

            this.addNewStu = function (info) {
                  

         var stat =1;

            angular.forEach(vm.allstudents ,function(item) {

                   if(info.suser===item.suser){
                   
                            stat=0;
                    }
                });
        
                  if(stat===1){
                        $http.post(URL + 'addNewStu' , info).then(function (response) {
                           
                        
                            new Snackbar("<i class='fa fa-plus'>&nbsp;&nbsp;&nbsp;  اضافه شد</i> ");
                            
                        });

                  }else{
                            new Snackbar("<i class='fa fa-close'>&nbsp;&nbsp;&nbsp; این نام کاربری وجود دارد</i> ");

                  }
                 

                     };


});

