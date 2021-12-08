<?php
session_start();
class Student extends Controller
{

 
    public function index()
      {
         
       $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
             
        require APP . 'view/_templates/student/header.php';
        require APP . 'view/_templates/student/navigation.php';

        require APP . 'view/student/dashboard.php';

        require APP . 'view/_templates/student/switcher.php';
        require APP . 'view/_templates/student/footer.php';
          


          }else{
             header('location: ' . URL . 'student/login');
          }
          
      }
   
    public function dashboard() 
    {
      $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
             
        require APP . 'view/_templates/student/header.php';
        require APP . 'view/_templates/student/navigation.php';

        require APP . 'view/student/dashboard.php';

        require APP . 'view/_templates/student/switcher.php';
        require APP . 'view/_templates/student/footer.php';
          


          }else{
             header('location: ' . URL . 'student/login');
          }
    }  
    public function login()
      {
          $title="لاگین";
          $pageID="login";
          require APP . 'view/_templates/student/header.php';
          require APP . 'view/student/login.php';
          require APP . 'view/_templates/student/footer.php';
      }
      public function logined()
      {
          
          if(isset($_POST['username'])){
            $allusers=$this->students->getAllStudent();
            $usern = $_POST['username'];
            $passw = $_POST['psw'];
            foreach ($allusers as $user) {
              if($user->suser == $usern && $user->spass == $passw){
                $_SESSION['is_loged_in'] = true;
                $_SESSION['tyrty'] = $user->sid;
                $_SESSION['user'] = $user->suser;
                $_SESSION['sname'] = $user->sname;
                $_SESSION['sfamily'] = $user->sfamily;
                $_SESSION['spic'] = $user->spic;
                $_SESSION['darsidd'] = $user->status;
                $_SESSION['kynde'] = "student";
              }
            }
          }
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
             header('location: ' . URL . 'student/dashboard');
          }else{
            $_SESSION['msg']="نام کاربری یا پسورد اشتباه است !";
             header('location: ' . URL . 'student/login');
          }
    
      }
 public function uploadPic(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $filename = $_FILES['file']['name'];

          $location = 'assets/myimg/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
           }else{
                 header('location: ' . URL . 'student/login');
              }

      }
      
      public function EditSecStuSetting(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $data = json_decode(file_get_contents("php://input"));
        $this->students->EditSecStuSetting($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
public function EditStuSetting(){
  if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $data = json_decode(file_get_contents("php://input"));
        $this->students->EditStuSetting($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }


       public function getUser()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        
            $user=array();

      $user['0']=$_SESSION['tyrty'];    
      $user['1']=$_SESSION['user'];    
      $user['2']=$_SESSION['kynde'];
      $user['3']=$_SESSION['sfamily'];
      echo json_encode($user);     

            }else{
             header('location: ' . URL . 'student/login');
          }
         
      }
  public function getMessages()
    {
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $messages=$this->students->getMessages($_SESSION['darsidd']);
        
        echo json_encode($messages);
            }else{
             header('location: ' . URL . 'student/login');
          }
    }
     public function saveMessages()
    {
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
      $data = json_decode(file_get_contents("php://input"));
      $message= $data->message;
      $name= $_SESSION['sfamily'];
      $user= $_SESSION['user'];

        $this->students->saveMessages($message,$user,$name,$_SESSION['darsidd']);

        $messages=$this->students->getMessages($_SESSION['darsidd']);

        echo json_encode($messages);
            }else{
             header('location: ' . URL . 'student/login');
          }
    }
    
   
    public function Initstatus(){
     if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
      $darsidd = $_GET['did'];
          $this->students->statusInit($_SESSION['tyrty'],$darsidd);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      public function logout(){
            

        session_destroy();
        
        header('location: ' . URL . 'student/login');
      }

    public function getStudentProfile(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneostad=$this->students->getStudentProf($_SESSION['tyrty']);
        
        echo json_encode($oneostad);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      // ////////////////////////////////////
      
      public function setdarsID(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->setdarsID();

            }else{
             header('location: ' . URL . 'student/login');
          }
       

      }
        public function darsid(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
            $_SESSION['darsidd'] = $_GET['did'];

            }else{
             header('location: ' . URL . 'student/login');
          }
      }
      
      public function showStudent(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showStudent($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      

      public function showDars(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showDars($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      public function showDarss(){
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oid=$_SESSION['tyrty'];
          $oneodars=$this->students->showDarss($oid);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      public function showFilms(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showFilms($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      
       public function showTest(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showTest($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }       

      }
      public function showFiles(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showFiles($_SESSION['darsidd']);
        
        echo json_encode($oneodars);

            }else{
             header('location: ' . URL . 'student/login');
          }       
      }
      public function showNotif(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showNotif($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }

      public function showOneFilm(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showOneFilm($_GET['fid']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }       

      }

      public function showOneFile(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showOneFile($_GET['iid']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }       

      }
      public function showOneNot(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showOneNot($_GET['nid']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }       

      }
       public function showOneText(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->showOneText($_GET['qid']);
        
        echo json_encode($oneodars);
            }else{
             header('location: ' . URL . 'student/login');
          }       

      }
     
     // ///////////////////
       public function uploadFilm(){
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $filename = $_FILES['file']['name'];

          $location = 'uploads/films/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
            }else{
             header('location: ' . URL . 'student/login');
          }       

          
        

      }
      public function addNewFilm(){
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->students->addNewFilms($data,$did);

            }else{
             header('location: ' . URL . 'student/login');
          }        
      

      }
      public function uploadFile(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $filename = $_FILES['file']['name'];

          $location = 'uploads/files/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);

            }else{
             header('location: ' . URL . 'student/login');
          } 
          
        

      }
      public function addNewFile(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->students->addNewFiles($data,$did);

        echo json_encode($data);
            }else{
             header('location: ' . URL . 'student/login');
          }
      

      }
      public function addnewNotif(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->students->addnewNotif($data,$did);

        echo json_encode($data);
      
            }else{
             header('location: ' . URL . 'student/login');
          }  

      }
      public function addnewTest(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->students->addnewTest($data,$did);

        echo json_encode($data);
            }else{
             header('location: ' . URL . 'student/login');
          }        
      

      }
      
      public function deletFilm()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->deletFilm($_GET['fid']);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
       public function deletFile()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->deletFile($_GET['iid']);
            }else{
             header('location: ' . URL . 'student/login');
          }
      } 
      public function deletNotif()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->deletNotif($_GET['nid']);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
      public function deletStu()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->deletStu($_GET['tid']);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
      public function deletTest()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $oneodars=$this->students->deletTest($_GET['qid']);
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
public function getAllStudents(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $oneodars=$this->students->getAllStudents();
        
        echo json_encode($oneodars);

            }else{
             header('location: ' . URL . 'student/login');
          }
      }
      

       public function showNotifNum(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $sid=$_SESSION['tyrty'];
          $did=$_SESSION['darsidd'];
          $message = $this->students->showNotifNum($sid,$did);
          echo json_encode($message);
            }else{
             header('location: ' . URL . 'student/login');
          }

      }
      public function delNotifNum(){
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
          $did=$_SESSION['darsidd'];
          $sid=$_SESSION['tyrty'];
          $message = $this->students->delNotifNum($sid,$did);

            }else{
             header('location: ' . URL . 'student/login');
          }          
      }

      public function sabtjavaban()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="student" ){
       
        $did=$_SESSION['darsidd'];
        $sid=$_SESSION['tyrty'];
        $qss=$_GET['qss'];
        $qid=$_GET['qid'];
        $ttid = $this->students->getmutid($sid,$did);
        $this->students->sabtjavaban($ttid->tt,$qid,$qss);
          
            }else{
             header('location: ' . URL . 'student/login');
          }
      }
}


