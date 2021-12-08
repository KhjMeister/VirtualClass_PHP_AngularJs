<?php
session_start();
class Ostad extends Controller
{
 

    public function index()
      {
         
       $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
             
        require APP . 'view/_templates/ostad/ostad_header.php';
        require APP . 'view/_templates/ostad/navigation.php';
       
        require APP . 'view/_templates/ostad/switcher.php';
        require APP . 'view/_templates/ostad/ostad_footer.php';
          


          }else{
             header('location: ' . URL . 'ostad/login');
          }
          
      }
   
    public function dashboard() 
    {
      $title="داشبرد";
      $pageID="dashboard";
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
             
         require APP . 'view/_templates/ostad/ostad_header.php';
        require APP . 'view/_templates/ostad/navigation.php';
        require APP . 'view/ostad/dashboard.php';
        require APP . 'view/_templates/ostad/switcher.php';
        require APP . 'view/_templates/ostad/ostad_footer.php';
          


          }else{
             header('location: ' . URL . 'ostad/login');
          }
    }  
    public function login()
      {
          $title="لاگین";
          $pageID="login";
          require APP . 'view/_templates/ostad/ostad_header.php';
          require APP . 'view/ostad/login.php';
          require APP . 'view/_templates/ostad/ostad_footer.php';
      }
      public function logined()
      {
          
          if(isset($_POST['username'])){
            $allusers=$this->ostads->getAllOstads();
            $usern = $_POST['username'];
            $passw = $_POST['psw'];
            foreach ($allusers as $user) {
              if($user->ouser == $usern && $user->opass == $passw){
                $_SESSION['is_loged_in'] = true;
                $_SESSION['tyrty'] = $user->oid;
                $_SESSION['user'] = $user->ouser;
                $_SESSION['oname'] = $user->oname;
                $_SESSION['ofamily'] = $user->ofamily;
                $_SESSION['opic'] = $user->opic;
                $_SESSION['darsidd'] = $user->status;
                $_SESSION['kynde']= "ostad";
              }
            }
          }
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
             header('location: ' . URL . 'ostad/dashboard');
          }else{
            $_SESSION['msg']="نام کاربری یا پسورد اشتباه است !";
             header('location: ' . URL . 'ostad/login');
          }
    
      }

   public function uploadPic(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $filename = $_FILES['file']['name'];

          $location = 'assets/myimg/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      

      public function darsDetails(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $oid=$_SESSION['tyrty'];
          $allostad=$this->ostads->darsDetails($oid);
      
        echo json_encode($allostad);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function EditSecSetting(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $data = json_decode(file_get_contents("php://input"));
        $this->ostads->EditSecSetting($data);
        $message['message']="ویرایش شد";

        echo json_encode($message);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
public function EditOstadSetting(){
  if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $data = json_decode(file_get_contents("php://input"));
        $this->ostads->EditOstadSetting($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }

  public function getUser()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
            $user=array();

      $user['0']=$_SESSION['tyrty'];    
      $user['1']=$_SESSION['user'];    
      $user['2']=$_SESSION['kynde'];
      $user['3']=$_SESSION['ofamily'];
      echo json_encode($user);     
          }else{
              header('location: ' . URL . 'ostad/login');
          }

         
      }
  public function getMessages()
    {
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $messages=$this->students->getMessages($_SESSION['darsidd']);
        
        echo json_encode($messages);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
    }
     public function saveMessages()
    {
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $data = json_decode(file_get_contents("php://input"));
      $message= $data->message;
      $name= $_SESSION['ofamily'];
      $user= $_SESSION['user'];

        $this->students->saveMessages($message,$user,$name,$_SESSION['darsidd']);

        $messages=$this->students->getMessages($_SESSION['darsidd']);

        echo json_encode($messages);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
    }

public function showResaultTest(){
  if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
  $mysn = array();
      $qid = $_GET['qid'];
         $allres= $this->ostads->showResaultTest($qid);
         $i=0;
         foreach($allres as $res){
          $i++;
            $gsn= $this->ostads->getonestudent($res->s_id);
            $bsn= $this->ostads->showmyTextright($qid);
            $mysn[$i]['qus'] =  $res->q_id ;
            $mysn[$i]['r'] =  $bsn->right_an ;
            $mysn[$i]['sname'] = $gsn[0]->sname ;
            $mysn[$i]['sfamily'] = $gsn[0]->sfamily ;
            $mysn[$i]['javab'] = $res->s_an;
            if($res->s_an==0){
              $mysn[$i]['hh'] = "جواب داده نشده";

            }else if($res->s_an==$bsn->right_an){
              $mysn[$i]['hh'] = "جواب درست";
              $mysn[$i]['h'] = "r.png";

            }else {
              $mysn[$i]['hh'] = "جواب نادرست ";
              $mysn[$i]['h'] = "del.png";

            }
         }  

     echo json_encode($mysn);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }

      public function resetmessages(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $this->ostads->resetmessages($_SESSION['darsidd']);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
       
      }

public function endQuezTime(){
  if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $qidd = $_GET['qid'];
          $this->ostads->endQuezTime($qidd);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
       
      }

    public function Initstatus(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $darsidd = $_GET['did'];
          $this->ostads->statusInit($_SESSION['tyrty'],$darsidd);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
       
      }

      
      public function logout(){
        session_destroy();
        
        header('location: ' . URL . 'ostad/login');
      }

 public function getOstadProfile(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneostad=$this->ostads->getOstadProf($_SESSION['tyrty']);
        
        echo json_encode($oneostad);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function getAlldars(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $oid=$_SESSION['tyrty'];
          $alldars=$this->ostads->getAlldars($_GET['page'],$oid,$_GET['search_input']);
        echo json_encode($alldars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }      

      }
      public function getOnedars(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $oid=$_SESSION['tyrty'];
          $alldars=$this->ostads->getOnedars($_GET['did'],$oid);
        echo json_encode($alldars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }      

      }
      public function deldars(){
      if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
      $oid=$_SESSION['tyrty'];
          $alldars=$this->ostads->deldars($_GET['did'],$oid);
          $this->ostads->delthakhsis($_GET['did']);
          $this->ostads->delfilma($_GET['did']);
          $this->ostads->delfilea($_GET['did']);
          $this->ostads->delnotifsa($_GET['did']);
          $this->ostads->deltesta($_GET['did']);
          // $this->ostads->deljavabtesta($_GET['did']);
          $this->ostads->resetmessages($_GET['did']);


        echo json_encode($alldars);

          }else{
              header('location: ' . URL . 'ostad/login');
          }      
      }
      public function Editdars(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  

        $data = json_decode(file_get_contents("php://input"));
        $this->ostads->editdars($data);
        $message['message']="ویرایش شد";
        echo json_encode($message);
         
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function adddars(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oid=$_SESSION['tyrty'];
        $data = json_decode(file_get_contents("php://input"));
        $this->ostads->adddars($data,$oid);
        $message['message']="اضافه شد";
        echo json_encode($message);
         
          }else{
              header('location: ' . URL . 'ostad/login');
          }      

      }
      

// ////////////////////
      public function darsid(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
       $_SESSION['darsidd'] = $_GET['did'];
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
       public function setdarsID(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->students->setdarsID();

          }else{
              header('location: ' . URL . 'ostad/login');
          }
       

      }
      public function showStudent(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showStudent($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      

      public function showDars(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showDars($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function showDarss(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oid=$_SESSION['tyrty'];
          $oneodars=$this->ostads->showDarss($oid);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function showFilms(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showFilms($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      
       public function showTest(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showTest($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
      public function showFiles(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showFiles($_SESSION['darsidd']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
      public function showNotif(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showNotif($_SESSION['darsidd']);
        
        echo json_encode($oneodars);

          }else{
              header('location: ' . URL . 'ostad/login');
          }       
      }

      public function showOneFilm(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showOneFilm($_GET['fid']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }

      public function showOneFile(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showOneFile($_GET['iid']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
      public function showOneNot(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showOneNot($_GET['nid']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
       public function showOneText(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->showOneText($_GET['qid']);
        
        echo json_encode($oneodars);
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
     
     // ///////////////////
       public function uploadFilm(){
          if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $filename = $_FILES['file']['name'];

          $location = 'uploads/films/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);

          
        
          }else{
              header('location: ' . URL . 'ostad/login');
          }       

      }
      public function addNewFilm(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->ostads->addNewFilms($data,$did);

      

          }else{
              header('location: ' . URL . 'ostad/login');
          }        
      }
      public function uploadFile(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $filename = $_FILES['file']['name'];

          $location = 'uploads/files/';

          move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);

          
        
          }else{
              header('location: ' . URL . 'ostad/login');
          }

      }
      public function addNewFile(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->ostads->addNewFiles($data,$did);

        echo json_encode($data);
      
          }else{
              header('location: ' . URL . 'ostad/login');
          }        

      }
      public function addnewNotif(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->ostads->addnewNotif($data,$did);
          
          $sid=$this->ostads->getsid($did);
          
          foreach($sid as $ssd){
              $this->ostads->addtoelnotifs($did,$ssd->s_id);
          }

       
      
          }else{
              header('location: ' . URL . 'ostad/login');
          }        

      }
      public function addnewTest(){
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $did=$_SESSION['darsidd'];
         $data = json_decode(file_get_contents("php://input"));
          $this->ostads->addnewTest($data,$did);
          
          $allt=$this->ostads->returntid($did);
          
          $title = $data->title;
        $qid = $this->ostads->returnqid($title);
          
          foreach($allt as $at){
              $this->ostads->addtoan($at->tid,$qid->qq,$at->s_id);
          }     
          

        echo json_encode($data);
      

          }else{
              header('location: ' . URL . 'ostad/login');
          }        
      }
      
      public function deletFilm()
      {
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->ostads->deletFilm($_GET['fid']);
       
          }else{
              header('location: ' . URL . 'ostad/login');
          } 
      }
       public function deletFile()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->ostads->deletFile($_GET['iid']);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
        
      } 
      public function deletNotif()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->ostads->deletNotif($_GET['nid']);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
      public function deletStu()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->ostads->deletStu($_GET['tid']);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
      public function deletTest()
      {
        if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        $oneodars=$this->ostads->deletTest($_GET['qid']);
          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
public function getAllStudents(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
          $oneodars=$this->ostads->getAllStudents();
        
        echo json_encode($oneodars);

          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
      public function addToDars(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
       $did=$_SESSION['darsidd'];
       $oid=$_SESSION['tyrty'];
          $oneodars=$this->ostads->addToDarss($_GET['sid'],$did,$oid);
        
        if($oneodars==true){

          $message['message']="اضافه شد";
          $message['kynde']="alert-success";
        echo json_encode($message);

        }else{
          
          $message['message']="از قبل وجود دارد";
          $message['kynde']="alert-danger";
        echo json_encode($message);
        }

          }else{
              header('location: ' . URL . 'ostad/login');
          }
      }
       public function addNewStu(){
       if( isset($_SESSION['is_loged_in']) && isset($_SESSION['user']) && $_SESSION['kynde']=="ostad" ){
  
        
         $data = json_decode(file_get_contents("php://input"));
          $this->ostads->addNewStu($data);

          }else{
              header('location: ' . URL . 'ostad/login');
          } 
      }

}




