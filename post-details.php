<?php 

require 'lib/session.php';
require 'lib/conf.php';
require 'lib/Database.php';

Session::init();

if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    header('Location: error-404.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
  if(isset($_GET['id']) && !empty($_GET['id'])) {
            
            $postId = $_GET['id'];
            
            try {
            $q = $pdo->prepare(
            $sql = 'SELECT posts.id, title, content, picture, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            
            INNER JOIN users ON users.id = posts.user_id
            WHERE posts.id = :post_id ');
            
        $q->execute([':post_id' => $postId]);
        $post = $q->fetch();
        
        if($post === false)
{
    header('Location: error-404.php');
    exit;
}
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }
        }
}

require 'views/post-details.phtml';