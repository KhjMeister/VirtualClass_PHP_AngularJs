<?php

class Ostads
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

public function resetmessages($did)
    {
      
      $sql = "DELETE FROM messages WHERE did = :did ";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did);
        $query->execute($parameters);

    }
 public function getAllOstads()
    {
        $sql = "SELECT * FROM ol_ostad";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function darsDetails($id)
        {

            $sql = "SELECT * FROM ol_dars Where o_id=:id ORDER BY did desc  ";
            $parameters = array(':id' => $id);

            $query = $this->db->prepare($sql);
            $query->execute($parameters);
           


             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['dars_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) as cou FROM ol_dars ";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }
     public function EditSecSetting($post_data=array())
    {
        $sql = "UPDATE ol_ostad SET   ouser = :ouser, opass=:opass, opercode=:opercode  WHERE `oid` = :oid";
        $query = $this->db->prepare($sql);

         $parameters = array( ':opass' => $post_data->opass, ':opercode' => $post_data->opercode,':oid' => $post_data->oid,':ouser' => $post_data->ouser);
        $query->execute($parameters);
    }
     public function EditOstadSetting($post_data=array())
    {
        $sql = "UPDATE ol_ostad SET  oname = :oname, ofamily = :ofamily, ophone = :ophone,  obio = :obio ,opic=:opic WHERE `oid` = :oid";
        $query = $this->db->prepare($sql);

         $parameters = array( ':oname' => $post_data->oname, ':ofamily' => $post_data->ofamily, ':ophone' => $post_data->ophone,':oid' => $post_data->oid,':obio' => $post_data->obio,':opic' => $post_data->opic);
        $query->execute($parameters);

        unlink("assets/myimg/".$post_data->lopic);

    }
    public function showResaultTest($qid){
            $sql = "SELECT * FROM anserstoquez WHERE q_id =:qid ";
            $parameters = array(':qid'=>$qid);
            
            $query = $this->db->prepare($sql);

            $query->execute($parameters);


             // $ostad=array();
           
           // while ($row = ) {
           //    $ostad['res_test'][]= $row;
           // }

            return $query->fetchAll();
         
        }
        public function getonestudent($id){
            $sql = "SELECT * FROM ol_student WHERE sid = :id LIMIT 1";
            $query = $this->db->prepare($sql);

            $parameters = array(':id' => $id);

            $query->execute($parameters);

            $film=array();
           
           while ($row = $query->fetchAll()) {
              $film= $row;
           }

            return $film;

        }
    public function endQuezTime($qid)
    {
        $sql = "UPDATE `text` SET state = 0 WHERE qid = :qid ";
        $query = $this->db->prepare($sql);

         $parameters = array( ':qid' => $qid );
        $query->execute($parameters);
    }
    public function statusInit($oid,$status)
    {
        $sql = "UPDATE ol_ostad SET status = :status WHERE oid = :oid ";
        $query = $this->db->prepare($sql);

         $parameters = array(':status' => $status, ':oid' => $oid );
        $query->execute($parameters);
    }
 public function getOstadProf($id){
            $sql = "SELECT * FROM ol_ostad WHERE oid = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

            return $query->fetch();

        }

    public function getAlldars($page=1,$oid,$search_input='')
        {
            $perpage=10;
            $page=($page-1)*$perpage;
           
            $search='';

            if($search_input!=''){
                $search="WHERE  ( dname LIKE '%$search_input%' OR dyear like '%$search_input%' OR dkynde like '%$search_input%' OR status like '$search_input%')";  
            }


            $sql = "SELECT * FROM ol_dars $search and o_id=$oid  ORDER BY did desc LIMIT $page,$perpage";
            $query = $this->db->prepare($sql);
            $query->execute();
            // return $query->fetchAll();

             $ostad=array();
           
           while ($row = $query->fetchAll()) {
              $ostad['ostad_data'][]= $row;
           }
           
           
           
        $count_sql = "SELECT COUNT(*) FROM ol_dars $search";
        $query1 = $this->db->prepare($count_sql);
        $query1->execute();
        $total = $query1->fetchAll();
        
        $ostad['total'][]= $total;
       
       
        return $ostad; 

        }


    public function deldars($id,$oid){
            $sql = "DELETE FROM ol_dars WHERE did = :id and o_id=:oid";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id,':oid' => $oid);
        $query->execute($parameters);

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
            $sql = "SELECT * FROM ol_dars WHERE o_id=:id ";
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
        public function showmyTextright($id){
            $sql = "SELECT * FROM `text` WHERE qid = :id ";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);

            $query->execute($parameters);

        

            return $query->fetch();

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
         public function getsid($did)
             {
                 $sql = "SELECT * FROM takhsis where d_id=:did ";
            $query = $this->db->prepare($sql);
            $parameters = array(':did' => $did);
            

            $query->execute($parameters);
             return $query->fetchAll();
             }
     public function addtoelnotifs($did,$sid)
             {
                          $sql2 = "INSERT INTO `seennotif` (`s_id`,`d_id`) VALUES (:sid,:did)";
                $query2 = $this->db->prepare($sql2);
                $parameters2 = array(':did' => $did, ':sid' => $sid);
                 $query2->execute($parameters2);
             }
     public function addnewNotif($post_data=array(),$did){
                


        $sql1 = "INSERT INTO `notifs` (`did`,`title`,`tozih`) VALUES (:did,:title,:tozih)";
        $query1 = $this->db->prepare($sql1);
        $parameters1 = array(':did' => $did, ':title' => $post_data->title, ':tozih' => $post_data->tozih);
        $query1->execute($parameters1);
    }
      public function returnqid($title){
          $sql0 = "SELECT qid as qq FROM text where title=:title ";
            $query0 = $this->db->prepare($sql0);
            $parameters0 = array(':title' => $title);
            $query0->execute($parameters0);
            
        return $query0->fetch();
      }
     public function returntid($did){
          $sql1 = "SELECT * FROM takhsis where d_id=:did ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':did' => $did);
            $query1->execute($parameters1);

           
            return $query1->fetchAll();
      }
         public function addtoan($tid,$qid,$sid){

                $sql2 = "INSERT INTO `ansersToquez` (`q_id`,`t_id`,`s_id`) VALUES (:qid,:tid,:sid)";
                $query2 = $this->db->prepare($sql2);
                $parameters2 = array( ':tid' => $tid,':qid'=>$qid,':sid'=>$sid);
                 $query2->execute($parameters2);
         }
    
    public function addnewTest($post_data=array(),$did){
        $sql = "INSERT INTO `text` (`d_id`,`title`,`point`,`quest`,`an_1`,`an_2`,`an_3`,`an_4`,`right_an`) VALUES (:did,:title,:point,:quest,:an_1,:an_2,:an_3,:an_4,:right_an)";
        $query = $this->db->prepare($sql);
        $parameters = array(':did' => $did, ':title' => $post_data->title, ':point' => $post_data->point, ':quest' => $post_data->quest, ':an_1' => $post_data->an_1, ':an_2' => $post_data->an_2, ':an_3' => $post_data->an_3, ':an_4' => $post_data->an_4, ':right_an' => $post_data->right_an);
        $query->execute($parameters);
        
        
        
    }

 public function delfilma($fid){
            $sql1 = "SELECT * FROM films WHERE did = :id ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':id' => $fid);
            $query1->execute($parameters1);
            $file= $query1->fetchAll();
            foreach ($file as $value) {
              
               $name= $value->name;
                unlink('uploads/films/'.$name);
            }
            // delete('$link');

        $sql = "DELETE FROM films WHERE did = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
    public function deletFilm($fid){
            $sql1 = "SELECT * FROM films WHERE fid = :id ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':id' => $fid);
            $query1->execute($parameters1);
            $file= $query1->fetch();
            $name= $file->name;
            unlink('uploads/films/'.$name);
            // delete('$link');

        $sql = "DELETE FROM films WHERE fid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        
        public function delfilea($fid){

            $sql1 = "SELECT * FROM files WHERE did = :id ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':id' => $fid);
            $query1->execute($parameters1);
            $file= $query1->fetchAll();
            foreach ($file as $value) {
              
              $name= $value->name;
              unlink('uploads/files/'.$name);
            }
            // delete('$link');



        $sql = "DELETE FROM files WHERE did = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        public function deletFile($fid){

            $sql1 = "SELECT * FROM files WHERE iid = :id ";
            $query1 = $this->db->prepare($sql1);
            $parameters1 = array(':id' => $fid);
            $query1->execute($parameters1);
            $file= $query1->fetch();
            $name= $file->name;
            unlink('uploads/files/'.$name);
            // delete('$link');



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
         public function delnotifsa($fid){
        $sql = "DELETE FROM notifs WHERE did = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
        
        public function delthakhsis($did){
        $sql = "DELETE FROM takhsis WHERE d_id = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $did);
        $query->execute($parameters);

        }
        public function deletStu($fid){
        $sql = "DELETE FROM takhsis WHERE tid = :id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $fid);
        $query->execute($parameters);

        }
         public function deltesta($fid){
        $sql = "DELETE FROM `text` WHERE d_id = :id ";
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
}
