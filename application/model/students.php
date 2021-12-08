<?php

class Students
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
public function EditSecStuSetting($post_data=array())
    {
        $sql = "UPDATE ol_student SET suser = :suser, spass=:spass, sncode=:sncode  WHERE `sid` = :sid";
        $query = $this->db->prepare($sql);

         $parameters = array( ':spass' => $post_data->spass, ':sncode' => $post_data->sncode,':sid' => $post_data->sid,':suser' => $post_data->suser);
        $query->execute($parameters);
    }
     public function EditStuSetting($post_data=array())
    {
        $sql = "UPDATE ol_student SET  sname = :sname, sfamily = :sfamily ,spic=:spic WHERE `sid` = :sid";
        $query = $this->db->prepare($sql);

         $parameters = array( ':sname' => $post_data->sname, ':sfamily' => $post_data->sfamily,':sid' => $post_data->sid,':spic' => $post_data->spic);
        $query->execute($parameters);
        
        unlink("assets/myimg/".$post_data->lspic);

    }


public function getMessages($id)
    {
        $sql = "SELECT * FROM messages where did=:did ORDER BY `date` ASC";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $id);

        $query->execute($parameters);

        return $query->fetchAll();
        
    }
    public function saveMessages($message,$user,$name,$did)
    {
        $sql = "INSERT INTO messages (username, message, user,did) VALUES (:name,:message,:user,:did)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':message' => $message, ':user' => $user,':did' => $did);
        $query->execute($parameters);
    }
    
 public function getAllStudent()
    {
        $sql = "SELECT * FROM ol_student";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function statusInit($sid,$status)
    {
        $sql = "UPDATE ol_student SET status = :status WHERE sid = :sid ";
        $query = $this->db->prepare($sql);

         $parameters = array(':status' => $status, ':sid' => $sid );
        $query->execute($parameters);
    }
public function getStudentProf($id){
            $sql = "SELECT * FROM ol_student WHERE sid = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }
       public function getOnedars($id,$oid){
            $sql = "SELECT * FROM ol_dars WHERE did = :id and o_id = :oid LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id,':oid' => $oid);

            $query->execute($parameters);

            return $query->fetch();

        }
        public function adddars($post_data=array(),$oid)
    {
        $sql = "INSERT INTO ol_dars (dname,dyear,o_id,dkynde,status) VALUES (:dname,:dyear,:o_id,:dkynde,:status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':dname' => $post_data->dname, ':dyear' => $post_data->dyear, ':dkynde' => $post_data->dkynde, ':status' => $post_data->status, ':o_id' => $oid);
        $query->execute($parameters);
    }
        
    public function editdars($post_data=array())
    {
        $sql = "UPDATE ol_dars SET dname = :dname, dyear = :dyear, dkynde = :dkynde, status = :status WHERE did = :did ";
        $query = $this->db->prepare($sql);

         $parameters = array(':dname' => $post_data->dname, ':dyear' => $post_data->dyear, ':dkynde' => $post_data->dkynde, ':status' => $post_data->status,':did' => $post_data->did );
        $query->execute($parameters);
    }
     
// ///////////////////////////
 public function showDars($id){
            $sql = "SELECT * FROM ol_dars WHERE did = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['dars_data'][]= $row;
           }

            return $film;

        }
        public function showDarss($id){
            $sql = "SELECT * FROM ol_dars o,takhsis t WHERE t.s_id=:id and t.d_id=o.did GROUP by o.dname";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['darssq_data'][]= $row;
           }

            return $film;

        }

 public function showFilms($id){
            $sql = "SELECT * FROM films WHERE did = :id ORDER BY `date` DESC ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['film_data'][]= $row;
           }

            return $film;

        }
        
        public function showTest($id){
            $sql = "SELECT * FROM `text` WHERE `d_id` = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['test_data'][]= $row;
           }

            return $film;

        }
        public function showStudent($id){
            $sql = "SELECT * FROM ol_student ,takhsis WHERE `d_id` = :id and `s_id` = sid GROUP by sname";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['stu_data'][]= $row;
           }

            return $film;

        }
        public function showFiles($id){
            $sql = "SELECT * FROM files WHERE did = :id ORDER BY `date` DESC";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['file_data'][]= $row;
           }

            return $film;

        }
        public function showNotif($id){
            $sql = "SELECT * FROM notifs WHERE did = :id ORDER BY `date` DESC";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['notif_data'][]= $row;
           }

            return $film;

        }
        
        
        public function showOneFilm($id){
            $sql = "SELECT * FROM films WHERE fid = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['filmo_data'][]= $row;
           }

            return $film;

        }
        public function showOneFile($id){
            $sql = "SELECT * FROM files WHERE iid = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['fileo_data'][]= $row;
           }

            return $film;

        }
        public function delNotifNum($sid,$did){
        $sql = "DELETE FROM seenNotif where s_id=:sid and d_id=:did  ";
            $parameters = array(':sid' => $sid,':did'=>$did);
        

        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        }
        public function showNotifNum($sid,$did){
            $sql = "SELECT count(*) as dd FROM seenNotif WHERE s_id=:sid and d_id=:did ";
            $parameters = array(':sid' => $sid,':did'=>$did);
            
            $query = $this->db->prepare($sql);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['sfnn'][]= $row;
           }

            return $film;

        }
public function getmutid($sid,$did){
            $sql = "SELECT tid as tt FROM takhsis WHERE s_id=:sid and d_id=:did ";
            $parameters = array(':sid' => $sid,':did'=>$did);
            
            $query = $this->db->prepare($sql);

            $query->execute($parameters);


           
           return $query->fetch();
         
           

            

        }

         public function showOneNot($id){
            $sql = "SELECT * FROM notifs WHERE nid = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['notif_data'][]= $row;
           }

            return $film;

        }
        public function showOneText($id){
            $sql = "SELECT * FROM `text` WHERE qid = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['test_data'][]= $row;
           }

            return $film;

        }
        
        public function addNewFilms($post_data=array(),$did){
        $sql = "INSERT INTO `films` (`did`,`name`,`title`,`tozih`,`type`,`link`) VALUES (:did,:name,:title,:tozih,:type,:link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did, ':name' => $post_data->name, ':title' => $post_data->title, ':tozih' => $post_data->tozih, ':type' => $post_data->type, ':link' => $post_data->link);
        $query->execute($parameters);
    }

 public function addNewFiles($post_data=array(),$did){
        $sql = "INSERT INTO `files` (`did`,`name`,`type`,`title`,`tozih`,`link`) VALUES (:did,:name,:type,:title,:tozih,:link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did, ':name' => $post_data->name, ':title' => $post_data->title, ':tozih' => $post_data->tozih, ':type' => $post_data->type, ':link' => $post_data->link);
        $query->execute($parameters);
    }
     public function addnewNotif($post_data=array(),$did){
        $sql = "INSERT INTO `notifs` (`did`,`title`,`tozih`) VALUES (:did,:title,:tozih)";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did, ':title' => $post_data->title, ':tozih' => $post_data->tozih);
        $query->execute($parameters);
    }
    public function addnewTest($post_data=array(),$did){
        $sql = "INSERT INTO `text` (`d_id`,`title`,`point`,`quest`,`an_1`,`an_2`,`an_3`,`an_4`,`right_an`) VALUES (:did,:title,:point,:quest,:an_1,:an_2,:an_3,:an_4,:right_an)";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did, ':title' => $post_data->title, ':point' => $post_data->point, ':quest' => $post_data->quest, ':an_1' => $post_data->an_1, ':an_2' => $post_data->an_2, ':an_3' => $post_data->an_3, ':an_4' => $post_data->an_4, ':right_an' => $post_data->right_an);
        $query->execute($parameters);
    }

    public function deletFilm($fid){
        $sql = "DELETE FROM films WHERE fid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function deletFile($fid){
        $sql = "DELETE FROM files WHERE iid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function deletNotif($fid){
        $sql = "DELETE FROM notifs WHERE nid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function deletStu($fid){
        $sql = "DELETE FROM takhsis WHERE tid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function deletTest($fid){
        $sql = "DELETE FROM `text` WHERE qid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function getAllStudents(){
            $sql = "SELECT * FROM ol_student ";
            $query = $this->db->prepare($sql);
            

            $query->execute();

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film['allstudent_data'][]= $row;
           }

            return $film;

        }
        public function addToDarss($sid,$did,$oid){

            $sql1 = "SELECT * FROM takhsis WHERE s_id=:sid and d_id=:did ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':sid' => $sid, ':did' => $did);

            $query1->execute($parameters1);

          if($query1->fetch()){
            return false;
          }else{
            $sql = "INSERT INTO `takhsis` (`s_id`,`d_id`,`o_id`) VALUES (:sid,:did,:oid)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sid' => $sid, ':oid' => $oid, ':did' => $did);
        $query->execute($parameters);
        return true;
          }

          

        
    }
    
        public function addNewStu($post_data=array())
    {
        $sql = "INSERT INTO ol_student (sncode,sname,sfamily,sfather,sbrdate,suser,spass,status) VALUES (:sncode,:sname,:sfamily,:sfather,:sbrdate,:suser,:spass,1)";
        $query = $this->db->prepare($sql);
        $parameters = array(':sncode' => $post_data->sncode, ':sname' => $post_data->sname, ':sfamily' => $post_data->sfamily, ':sfather' => $post_data->sfather, ':sbrdate' => $post_data->sbrdate, ':suser' => $post_data->suser, ':spass' => $post_data->spass);
        $query->execute($parameters);
    }

 public function sabtjavaban($tid,$qid,$qss)
    {
        $sql = "UPDATE anserstoquez SET  s_an = :qss WHERE t_id = :tid   and  q_id = :qid ";
        $query = $this->db->prepare($sql);

         $parameters = array( ':tid' => $tid, ':qid' => $qid, ':qss' => $qss );
        $query->execute($parameters);
    }





}
