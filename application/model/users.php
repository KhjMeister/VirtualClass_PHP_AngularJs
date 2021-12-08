<?php

class Users
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
       public function editPosts($post_data=array())
    {
        $sql = "UPDATE posts SET title = :title, textt = :textt WHERE poid = :poid";
        $query = $this->db->prepare($sql);

         $parameters = array(':title' => $post_data->title, ':textt' => $post_data->textt, ':poid' => $post_data->poid);
        $query->execute($parameters);
    }
    public function showPost($poid){
            $sql = "SELECT * FROM posts WHERE poid=:poid ";
            $query = $this->db->prepare($sql);
        $parameters = array(':poid' => $poid);
        $query->execute($parameters);


            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['post_data'][]= $row;
           }

            return $film;

        }
        public function getCountStu(){
            $sql = "SELECT COUNT(*) as dd FROM ol_student ";
            $query = $this->db->prepare($sql);
            

            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['Stu_data'][]= $row;
           }

            return $film;

        }
         public function getCountOst(){
            $sql = "SELECT COUNT(*) as dd FROM ol_ostad ";
            $query = $this->db->prepare($sql);
            

            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['Ost_data'][]= $row;
           }

            return $film;

        }

        
      public function getAllPostss(){
            $sql = "SELECT * FROM posts ";
            $query = $this->db->prepare($sql);
            

            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['posts_data'][]= $row;
           }

            return $film;

        }


        public function delReport($poid){
            $sql = "DELETE FROM problemreport WHERE rpid = :poid";
        $query = $this->db->prepare($sql);
        $parameters = array(':poid' => $poid);
        $query->execute($parameters);

        }
          public function delPost($poid){
            $sql = "DELETE FROM posts WHERE poid = :poid";
        $query = $this->db->prepare($sql);
        $parameters = array(':poid' => $poid);
        $query->execute($parameters);

        }
    public function addPosts($post_data=array())
    {
        $sql = "INSERT INTO posts (title,textt) VALUES (:title,:textt)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $post_data->title, ':textt' => $post_data->textt);
        $query->execute($parameters);
    }
 public function DaneshjooDetails()
        {

            $sql = "SELECT * FROM ol_student ORDER BY sid desc  ";
            $query = $this->db->prepare($sql);
            $query->execute();


             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['student_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) as cou FROM ol_student ";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }
     public function OstadsDetails()
        {

            $sql = "SELECT * FROM ol_ostad ORDER BY oid desc  ";
            $query = $this->db->prepare($sql);
            $query->execute();


             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['ostad_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) as cou FROM ol_ostad ";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }

 public function getAllUsers()
    {
        $sql = "SELECT id, username, password, email ,status,pic FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

public function getAlldaneshjoo($page=1,$search_input='')
        {
            $perpage=10;
            $page=($page-1)*$perpage;
           
            $search='';

            if($search_input!=''){
                $search="WHERE ( sname LIKE '%$search_input%' OR sfamily like '%$search_input%' OR suser like '%$search_input%' OR status like '$search_input%' OR sncode like '%$search_input%' )";  
            }


            $sql = "SELECT * FROM ol_student $search ORDER BY sid desc LIMIT $page,$perpage";
            $query = $this->db->prepare($sql);
            $query->execute();

             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['ostad_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) FROM ol_student $search";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }
         public function getOnedaneshjoo($id){
            $sql = "SELECT * FROM ol_student WHERE sid = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }
        
      
         public function deldaneshjoo($id){
            $sql = "DELETE FROM ol_student WHERE sid = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        }

public function sendRepErr($name,$email,$kynde,$textt)
    {
        $sql = "INSERT INTO problemreport (email,name,kynde,qu) VALUES (:email,:name,:kynde,:qu)";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':name' => $name, ':kynde' => $kynde, ':qu' => $textt);
        $query->execute($parameters);
    }
    

        public function adddaneshjoo($post_data=array())
    {
        $sql = "INSERT INTO ol_student (sncode,sname,sfamily,sfather,sbrdate,suser,spass,status) VALUES (:sncode,:sname,:sfamily,:sfather,:sbrdate,:suser,:spass,1)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sncode' => $post_data->sncode, ':sname' => $post_data->sname, ':sfamily' => $post_data->sfamily, ':sfather' => $post_data->sfather, ':sbrdate' => $post_data->sbrdate, ':suser' => $post_data->suser, ':spass' => $post_data->spass);
        $query->execute($parameters);
    }
    

    public function editdaneshjoo($post_data=array())
    {
        $sql = "UPDATE ol_student SET sncode = :sncode, sname = :sname, sfamily = :sfamily, sfather = :sfather, sbrdate = :sbrdate, suser = :suser, spass = :spass WHERE sid = :sid";
        $query = $this->db->prepare($sql);

         $parameters = array(':sncode' => $post_data->sncode, ':sname' => $post_data->sname, ':sfamily' => $post_data->sfamily, ':sfather' => $post_data->sfather, ':sbrdate' => $post_data->sbrdate, ':suser' => $post_data->suser, ':spass' => $post_data->spass,':sid' => $post_data->sid);
        $query->execute($parameters);
    }
    
    public function getAllOstad($page=1,$search_input='')
        {
            $perpage=10;
            $page=($page-1)*$perpage;
           
            $search='';

            if($search_input!=''){
                $search="WHERE ( oname LIKE '%$search_input%' OR ofamily like '%$search_input%' OR ouser like '%$search_input%' OR status like '$search_input%' OR opercode like '%$search_input%' )";  
            }


            $sql = "SELECT * FROM ol_ostad $search ORDER BY oid desc LIMIT $page,$perpage";
            $query = $this->db->prepare($sql);
            $query->execute();


             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['ostad_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) FROM ol_ostad $search";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }

 public function deltakh($id){
            $sql = "DELETE FROM takhsis WHERE s_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        }
        

         public function delostadtakhs($id){
            $sql = "DELETE FROM takhsis WHERE o_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        }
         public function delostaddarss($id){
            $sql = "DELETE FROM ol_dars WHERE o_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        }

    public function delOstad($id){
            $sql = "DELETE FROM ol_ostad WHERE oid = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        }

 public function getadminProfile($id){
            $sql = "SELECT * FROM user where id=:id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }
       public function getOneOstad($id){
            $sql = "SELECT * FROM ol_ostad WHERE oid = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }
        

        public function addOstad($post_data=array())
    {
        $sql = "INSERT INTO ol_ostad (opercode,oname,ofamily,ofather,obrdate,ouser,opass,status) VALUES (:opercode,:oname,:ofamily,:ofather,:obrdate,:ouser,:opass,1)";
        $query = $this->db->prepare($sql);
        $parameters = array(':opercode' => $post_data->opercode, ':oname' => $post_data->oname, ':ofamily' => $post_data->ofamily, ':ofather' => $post_data->ofather, ':obrdate' => $post_data->obrdate, ':ouser' => $post_data->ouser, ':opass' => $post_data->opass);
        $query->execute($parameters);
    }
    
    public function EditadminSetting($post_data=array())
    {
        $sql = "UPDATE user SET  name = :name, family = :family, phone = :phone, s_phone = :s_phone, bio = :bio ,pic=:pic WHERE id = :id";
        $query = $this->db->prepare($sql);

         $parameters = array( ':name' => $post_data->name, ':family' => $post_data->family, ':phone' => $post_data->phone, ':s_phone' => $post_data->s_phone,':id' => $post_data->id,':bio' => $post_data->bio,':pic' => $post_data->pic);
        $query->execute($parameters);

        unlink("assets/myimg/".$post_data->lpic);
    }
    public function editAdmin($post_data=array())
    {
        $sql = "UPDATE user SET email = :email, name = :name, family = :family, phone = :phone, s_phone = :s_phone, username = :username, password = :password, bio = :bio WHERE id = :id";
        $query = $this->db->prepare($sql);

         $parameters = array(':email' => $post_data->email, ':name' => $post_data->name, ':family' => $post_data->family, ':phone' => $post_data->phone, ':s_phone' => $post_data->s_phone, ':username' => $post_data->username, ':password' => $post_data->password,':id' => $post_data->id,':bio' => $post_data->bio);
        $query->execute($parameters);
    }
    public function editOstad($post_data=array())
    {
        $sql = "UPDATE ol_ostad SET opercode = :opercode, oname = :oname, ofamily = :ofamily, ofather = :ofather, obrdate = :obrdate, ouser = :ouser, opass = :opass WHERE oid = :oid";
        $query = $this->db->prepare($sql);

         $parameters = array(':opercode' => $post_data->opercode, ':oname' => $post_data->oname, ':ofamily' => $post_data->ofamily, ':ofather' => $post_data->ofather, ':obrdate' => $post_data->obrdate, ':ouser' => $post_data->ouser, ':opass' => $post_data->opass,':oid' => $post_data->oid);
        $query->execute($parameters);
    }
     public function addUser($username, $password, $email)
    {
        $sql = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email)";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':password' => $password, ':email' => $email);
        $query->execute($parameters);
    }

    public function deleteUser($username)
    {
        $sql = "DELETE FROM user WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);
    }

     public function getUser($id)
    {
        $sql = "SELECT id, username, password, email, status FROM user WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

 

    public function updateUser($username, $password, $email, $status)
    {
        $sql = "UPDATE song SET username = :username, password = :password, email = :email WHERE status = :status";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':password' => $password, ':email' => $email, ':status' => $status);

        $query->execute($parameters);
    }

    public function getCrusPics(){
            $sql = "SELECT * FROM crus_pic ";

            $query = $this->db->prepare($sql);
            $query->execute();

            return $query->fetchAll();
  

        }
        public function getallquan(){

            $sql = "SELECT * FROM qusan group by datee DESC LIMIT 5";

            $query = $this->db->prepare($sql);
            $query->execute();

            return $query->fetchAll();
  

        }
         public function showCrudelPic(){
            $sql = "SELECT * FROM crus_pic";
            $query = $this->db->prepare($sql);


            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['cp'][]= $row;
           }

            return $film;

        }
        public function showRepError(){
            $sql = "SELECT * FROM problemreport";
            $query = $this->db->prepare($sql);


            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['re'][]= $row;
           }

            return $film;

        }
        
        public function addNewCursPics($post_data=array())
    {
         $sql = "UPDATE crus_pic SET name = :name,link = :link WHERE pic_id = :id";
        $query = $this->db->prepare($sql);

         $parameters = array(':id' => $post_data->id,':link' => $post_data->link,':name' => $post_data->name);
        $query->execute($parameters);
        $address = "assets/myimg/".$post_data->name;
        $addressl = "assets/myimg/".$post_data->lname;
        $t = imagecreatefromjpeg($address);
        $x = imagesx($t);
        $y = imagesy($t);
        $new_width=1306;
        $new_height=486;
        $s = imagecreatetruecolor($new_width, $new_height);

        imagecopyresampled($s, $t, 0, 0, 0, 0, $new_width, $new_height,
                $x, $y);

        imagejpeg($s, $address);
        chmod($post_data->link, 0644);

        unlink($addressl);


    }
     public function addNewqusan($post_data=array())
    {
        $sql = "INSERT INTO qusan (qu,an) VALUES (:qu,:an)";
        $query = $this->db->prepare($sql);
        $parameters = array(':qu' => $post_data->qu, ':an' => $post_data->an);
        $query->execute($parameters);
    }
    
     public function getallposts(){
            $sql = "SELECT * FROM posts group by datee DESC";
            $query = $this->db->prepare($sql);

            $query->execute();

            return $query->fetchAll();

        }
        public function getoneposts($id){
            $sql = "SELECT * FROM posts WHERE poid = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }
        
        
}