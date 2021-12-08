<?php
session_start();

class Home extends Controller
{

    public function index()
    {
        $title="خانه";
        $pageID="home";

        $allpics=$this->users->getCrusPics();


        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
   public function connectToMe()
    {
        $title="ارتباط با طراح";
        $pageID="connect";

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/cnnectToMe.php';
        require APP . 'view/_templates/footer.php';
    }
    public function aboutThis()
    {
        $title="درباره سایت";
        $pageID="about_this";

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/aboutThis.php';
        require APP . 'view/_templates/footer.php';
    }
     public function contactUs()
    {
        $title="درباره سایت";
        $pageID="about_this";
        $allqusan=$this->users->getallquan();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/contactUs.php';
        require APP . 'view/_templates/footer.php';
    }
     public function RepErr()
    {
        if(isset($_POST)){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $kynde = $_POST['kynde'];
            $textt = $_POST['textt'];
        $this->users->sendRepErr($name,$email,$kynde,$textt);
         $_SESSION['msgg']="ارسال شد";
            header('location: ' . URL . 'home/contactUs');
            

        }else{
         $_SESSION['msgg']="ارسال نشد";

            header('location: ' . URL . 'home');
        }
    }
    public function Posts()
    {
        $title="درباره سایت";
        $pageID="about_this";



        $limit = 4;  
        $countPosts = $this->posts->countAllPosts();
        $total_posts = $countPosts->dd;
        $lastpage = $total_posts / $limit;
       if (isset($_GET["page"])) { 
         if($_GET["page"]<=0){
            $page=1;
        }
            elseif($_GET["page"]>=($lastpage+1)){
                $page=$lastpage;
        }
            else{
             $page  = $_GET["page"];
            } 
        } else { 
            $page=1; 
            $_GET["page"]=1;
        }
        $start_from = ($page-1) * $limit;
        $allposts = $this->posts->getLimitPosts($start_from,$limit);
        // $allposts=$this->users->getallposts();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/posts.php';
        require APP . 'view/_templates/footer.php';
    }
    public function onePost()
    {
        $title="درباره سایت";
        $pageID="about_this";
        if($_GET){
            $oneposts=$this->users->getoneposts($_GET['id']);

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/onepost.php';
        require APP . 'view/_templates/footer.php';
       
        }else{
            header('location: ' . URL . 'home/posts');
        }
        
    }


}
