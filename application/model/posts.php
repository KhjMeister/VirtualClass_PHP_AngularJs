<?php

class Posts
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function countAllPosts()
    {
        $sql = "SELECT count(*) AS dd FROM posts";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    public function getLimitPosts($start,$limit)
    {
        $sql = "SELECT * FROM posts LIMIT $start,$limit";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getPost($post_id)
    {
        $sql = "SELECT * FROM posts WHERE id = :post_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':post_id' => $post_id);
        $query->execute($parameters);
        return $query->fetch();
    }


    public function addPost($id,$title,$content,$create_at,$auther)
    {
        $sql = "INSERT INTO posts (id,title,content,create_at,auther) VALUES (:id, :title, :content,:create_at,:auther)";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':title' => $title, ':content' => $content, ':create_at'=>$create_at,':auther'=>$auther);


        $query->execute($parameters);
    }
    public function deletePost($post_id)
    {
        $sql = "DELETE FROM posts WHERE id = :post_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':post_id' => $post_id);
        $query->execute($parameters);
    }
}
