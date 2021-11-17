<?php

require 'lib/session.php'; 
require 'lib/conf.php'; 
require 'lib/Database.php';

Session::init();
$admin_id = intval($_SESSION['user']['role']);
$is_admin = $_SESSION['user']['role'] == 'admin' ? true : false;
if(!$is_admin) {
    header("Location: login.php");
} 

if (isset($_GET) && array_key_exists('id', $_GET) && is_int(intval($_GET['id'])))
    {   
            try {
                
                $q = $pdo->prepare(
                    'DELETE FROM posts WHERE id = :id'
                );
                $q->execute([':id' => $_GET['id']]);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
            $_SESSION['info'] = "<p class=\"php-notifications php-succes\">The post has been deleted</p>";

            header("Location: admin-posts.php");
            exit();
        
    }

    exit;