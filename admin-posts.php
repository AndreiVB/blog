<?php

require 'lib/conf.php';
require 'lib/session.php';
require 'lib/Database.php';

Session::init();

$admin_id = intval($_SESSION['user']['id']); 
$is_admin = $_SESSION['user']['role'] == 'admin' ? true : false;
if(!$is_admin) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $sql = 'SELECT posts.id AS post_id, title, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            ORDER BY posts.created_at DESC';
    try {
        $q = $pdo->query($sql);
        $posts = $q->fetchAll(); 
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }    
}  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (array_key_exists('post_search', $_POST) && !empty($_POST['post_search'])) {
        $search_term = $_POST['post_search'];     
        $q = $pdo->prepare(
            'SELECT posts.id AS post_id, title, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            WHERE title like :keyword
            ORDER BY posts.created_at DESC'
        );
        try {
        $q->execute([':keyword' => '%'.$search_term.'%']);
        $posts = $q->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    } else {
            $_SESSION['info'] = "<p class=\"php-notifications php-error\">No posts</p>";
    }
        
} 

require 'views-admin/admin-posts.phtml';
?>