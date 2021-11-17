<?php

require 'lib/conf.php';
require 'lib/session.php';
require 'lib/Database.php';

Session::init();

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (array_key_exists('search-post', $_POST) && !empty($_POST['search-post'])) {
        $q = $pdo->prepare( 
        "SELECT title, posts.id AS post_id, content, picture, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            WHERE title LIKE :keyword OR nickname LIKE :keyword
            ORDER BY posts.created_at DESC"); 
        try {           
        $q->execute([':keyword' => '%'.$_POST['search-post'].'%']); 
        $posts = $q->fetchAll();
     
        } catch (PDOException $e) {
            echo $e->getMessage();
             die;
        }
    }   
} 

require 'views/search.phtml';
?>