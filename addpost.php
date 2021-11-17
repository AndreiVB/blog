<?php

require 'lib/session.php';
require 'lib/conf.php';
require 'lib/Database.php';

Session::init();
if(empty($_SESSION['user'])) {
    header("Location: homepage.php");
}

$user_id = intval($_SESSION['user']['id']);

if(isset($_SESSION['user']) || isset($_SESSION['admin'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Loginregister
    if (isset($_POST) && !empty($_POST))
    {      
        $errors = [];       
        foreach ($_POST as $k => $value) {
            if (empty($value))
            {
                array_push($errors, "The field $k is empty");
            }
        }
        // Work with file
        if (array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name']))
        {
            // Picture exists?
            $uploaddir = 'images/posts'; // Destination path
            $uploadfile = $uploaddir . basename($_FILES['picture']['name']); // Build path with file name

            // move_uploaded_file return true if ok => false if not
            $hasFile = false; // By default, no file
            if (!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
                array_push($errors, "One error has occured");
            }else {
                $hasFile = true; // need file here
            }
        }  
        // Test if errors
        if (count($errors) > 0)
        {
            $_SESSION['errors'] = $errors;
        } else {
            // extract Data
            extract($_POST); // $title, $content, $picture, $user_id
            var_dump($_POST);   
            if ($hasFile)
            {
                $query = 'INSERT INTO posts (title, content, picture, created_at, user_id)
                VALUES (:title, :content, :picture, NOW(), :user_id)';
                $params = [
                    ':title' => $title,
                    ':content' => $content,                
                    ':picture' => $_FILES['picture']['name'],
                    ':user_id' => intval($user_id)                   
                ];
            }   else {
                 $query = 'INSERT INTO posts (title, content, posts.created_at, user_id )
                VALUES (:title, :content, NOW(), :user_id)';
            $params = [
                ':title' => $title,
                ':content' => $content,               
                ':user_id' => intval($user_id)
            ];
            
            }
         
            try {
                // User register
                $q = $pdo->prepare($query);
                // Add parameters
                $q->execute($params);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
            
            $_SESSION['info'] = "<p class=\"php-notifications php-succes\">The post has been registered</p>";
            
            header('Location: user.php');
            exit();
        }
    }
}
    
} else {
    header("Location: homepage.php");
    exit();
}


require 'views/addpost.phtml';