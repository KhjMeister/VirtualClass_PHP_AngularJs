//Reference File app.js
myApp2.controller('dars_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
    var URL = "http://localhost/virtualClass/student/";


   this.Initstatus = function(did) {
        $http.get(URL + 'Initstatus?did=' + did).then(function (response) {
                  
            });
   };
  
  this.setdarsID = function (did) {
	       $http.get(URL + 'setdarsID').then(function (response) {
	              
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
   

   
            });
        };
        this.showTest = function () {
            $http.get(URL + 'showTest').then(function (response) {
            	vm.tests=null;
                vm.test= response.data.test_data;
                
                vm.tests=vm.test['0'];

                // console.log(vm.test['0']);


   
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
    			
	            vm.filmss=vm.films['0'];
   
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
                 
                vm.ter = vm.onenotest;
                if(vm.ter.state==="1"){
                    vm.showTestfor=true;
                }else if(vm.ter.state==="0"){
                   vm.showTestfor=false;
                }
                console.log(vm.ter.state);
    
            });
        };
        
        this.showNotifNum = function () {
            // $("#mySpan").hide();
            $http.get(URL + 'showNotifNum').then(function (response) {
                vm.snfn=null;
                vm.testtt= response.data.sfnn;
                
                vm.snfn=vm.testtt[0][0];
                if(vm.snfn==undefined){
                    $("#mySpan").hide();
                }else if(vm.snfn.dd==0){
                    $("#mySpan").hide();
                }

    
            });
        };
        this.delNotifNum = function () {
                $("#mySpan").hide();
            $http.get(URL + 'delNotifNum').then(function (response) {
    
            });
        };
        
        
             

this.addanqss = function (info) {
    var qqid= vm.onenotest.qid;

            $http.get(URL + 'sabtjavaban?qss=' + info.qss +'&qid='+qqid).then(function (response) {
                           
                            //  
                            // vm.msg.message= "با موفقیت انجام شد";
                            // vm.msg.kynde = "alert-success";
                            new Snackbar("<i class='fa fa-plus'>&nbsp;&nbsp;&nbsp; ثبت شد</i> ");
                            
                        });
        };
    
       
    
    
});

