<?php
session_start();
class Admin extends Controller
{
 
    public function index()
      {
         
       $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
             
        require APP . 'view/_templates/admin_header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/admin/dashboard.php';

        require APP . 'view/_templates/switcher.php';
        require APP . 'view/_templates/admin_footer.php';
          


          }else{
             header('location: ' . URL . 'admin/login');
          }
          
      }
   
    public function dashboard() 
    {
      $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
             
        require APP . 'view/_templates/admin_header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/admin/dashboard.php';
        require APP . 'view/_templates/switcher.php';
        require APP . 'view/_templates/admin_footer.php';
          


          }else{
             header('location: ' . URL . 'admin/login');
          }
    }  
    public function login()
      {
          $title="لاگین";
          $pageID="login";
          require APP . 'view/_templates/admin_header.php';
          require APP . 'view/admin/login.php';
          require APP . 'view/_templates/admin_footer.php';
      }
      public function logined()
      {
          
          if(isset($_POST['username'])){
            $allusers=$this->users->getAllUsers();
            $usern = $_POST['username'];
            $passw = $_POST['psw'];
            foreach ($allusers as $user) {
              if($user->username == $usern && $user->password == $passw){
                $_SESSION['is_loged_in'] = true;
                $_SESSION['tyrty'] = $user->id;
                $_SESSION['user'] = $user->username;
                $_SESSION['adname'] = $user->username;
                $_SESSION['adpic'] = $user->pic;
               
                $_SESSION['kynde'] = "admin";
              }
            }
          }
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
             header('location: ' . URL . 'admin/dashboard');
          }else{
            $_SESSION['msg']="نام کاربری یا پسورد اشتباه است !";
             header('location: ' . URL . 'admin/login');
          }
    
      }


      public function logout(){
        session_destroy();
        
        header('location: ' . URL . 'admin/login');
      }
      
      public function editPosts(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){

        $data = json_decode(file_get_contents("php://input"));
        $this->users->editPosts($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);

          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
       public function getCountStu(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $message=$this->users->getCountStu();
          
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
       public function getCountOst(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $message=$this->users->getCountOst();
          
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }


      public function showPost(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $message=$this->users->showPost($_GET['poid']);
          
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
public function delPost(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $this->users->delPost($_GET['poid']);
          $message['message']="حذف شد";
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
public function delReport(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $this->users->delReport($_GET['poid']);
          $message['message']="حذف شد";
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }

  public function getAllPostss(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $oneodars=$this->users->getAllPostss();
        
        echo json_encode($oneodars);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }



      public function addPosts(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->addPosts($data);
        $message['message']="اضافه شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }


      public function getAllOstad(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->getAllOstad($_GET['page'],$_GET['search_input']);
        
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function getAdminProfile(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $oneostad=$this->users->getadminProfile($_SESSION['tyrty']);
        
        echo json_encode($oneostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      } 
      public function uploadPic(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $filename = $_FILES['file']['name'];

          $location = 'assets/myimg/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);

          }else{
             header('location: ' . URL . 'admin/login');
          }
          
        

      }
      
      public function getOneOstad(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $oneostad=$this->users->getOneOstad($_GET['oid']);
        
        echo json_encode($oneostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function delOstad(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
       $oid=$_GET['oid'];

          $this->users->delostaddarss($oid);
          $this->users->delostadtakhs($oid);

          $this->users->delOstad($_GET['oid']);
          $message['message']="حذف شد";
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }

       public function addOstad(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->addOstad($data);
        $message['message']="اضافه شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      
      public function Editadmin(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->editAdmin($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      public function EditadminSetting(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->EditadminSetting($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      public function EditOstad(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->editOstad($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
       public function getAlldaneshjoo(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->getAlldaneshjoo($_GET['page'],$_GET['search_input']);
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function getOnedaneshjoo(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $onedaneshjoo=$this->users->getOnedaneshjoo($_GET['sid']);
        
        echo json_encode($onedaneshjoo);
          }else{
             header('location: ' . URL . 'admin/login');
          }       

      }
      public function deldaneshjoo(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $this->users->deldaneshjoo($_GET['sid']);
          $this->users->deltakh($_GET['sid']);
          $message['message']="حذف شد";
          echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }       

      }
       public function adddaneshjoo(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->adddaneshjoo($data);
        $message['message']="اضافه شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      public function Editdaneshjoo(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->editdaneshjoo($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      

      public function DaneshjooDetails(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->DaneshjooDetails();
      
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function OstadsDetails(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->OstadsDetails();
      
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function showCrudelPic(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->showCrudelPic();
      
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function uploadCrusssPic(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $filename = $_FILES['file']['name'];

          $location = 'assets/myimg/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
          }else{
             header('location: ' . URL . 'admin/login');
          }


      }
       public function addNewCursPics(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->addNewCursPics($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      public function showRepError(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
          $allostad=$this->users->showRepError();
      
        echo json_encode($allostad);
          }else{
             header('location: ' . URL . 'admin/login');
          }

      }
      public function addNewqusan(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="admin" ){
        $data = json_decode(file_get_contents("php://input"));
        $this->users->addNewqusan($data);
        $message['message']="اضافه شد";
        echo json_encode($message);
          }else{
             header('location: ' . URL . 'admin/login');
          }
      }
      
      
}





