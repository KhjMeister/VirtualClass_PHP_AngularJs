<?php

class Problem extends Controller
{

    public function index()
    {
      $title="ارور";
      $pageID="problem";
		
		require APP . 'view/_templates/header.php';
   
        require APP . 'view/problem/404.php';
        
        require APP . 'view/_templates/footer.php';
        
    }
}
