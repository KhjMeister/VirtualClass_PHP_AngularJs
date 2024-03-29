<?php

class Controller
{

    public $db = null;


    public $model = null;


    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    private function openDatabaseConnection()
    {

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    public function loadModel()
    {
        require APP . 'model/model.php';
        require APP . 'model/users.php';
          require APP . 'model/ostads.php';
          require APP . 'model/posts.php';
          require APP . 'model/students.php';

        $this->model = new Model($this->db);
        $this->users = new users($this->db);
         $this->posts = new posts($this->db);
         $this->ostads = new Ostads($this->db);
         $this->students = new Students($this->db);
    }
}
