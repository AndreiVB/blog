<?php

require 'lib/session.php'; 
require 'lib/conf.php'; 
require 'lib/Database.php';

Session::init();
var_dump($_SESSION);
var_dump($_GET);

if (isset($_GET) && array_key_exists('id', $_GET) && is_int(intval($_GET['id'])))
{
    $user_id = intval($_SESSION['user']['id']);  
        try {
            
            $q = $pdo->prepare(
                'DELETE FROM posts WHERE id = :id
                AND user_id = :user_id'
            );
            $q->execute([':id' => $_GET['id'], ':user_id' => $user_id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
        $_SESSION['info'] = "<p class=\"php-notifications php-succes\">The post has been deleted</p>";

        // Redirection
        goToDashBoard();
    
}
 else {
        $_SESSION['info'] = "You are not authorized to delete this post";
 }
// Redirection
$role = $_SESSION['user']['role'] ?? 'admin';
$url = $role.'.php'; 

exit;