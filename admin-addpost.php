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

if(isset($_SESSION['user'])) {
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
            $hasFile = false;
            // Work with file
            if (array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name']))
            {
                // Picture exists?
                $uploaddir = 'images/posts'; // Destination path
                $uploadfile = $uploaddir . basename($_FILES['picture']['name']); // Build path with file name
                
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
                extract($_POST); 
                if ($hasFile)
                {
                    $query = 'INSERT INTO posts (title, content, picture, created_at, user_id)
                    VALUES (:title, :content, :picture, NOW(), :user_id)';
                    $params = [                   
                        ':title' => $title,
                        ':content' => $content,                
                        ':picture' => $_FILES['picture']['name'],
                        ':user_id' => intval($admin_id)                   
                    ];
                }   else {
                    $query = 'INSERT INTO posts (title, content, posts.created_at, user_id )
                    VALUES (:title, :content, NOW(), :user_id)';
                $params = [
                    ':title' => $title,
                    ':content' => $content,               
                    ':user_id' => intval($admin_id)
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
                goToDashBoard();
                
            }
        }
    }
    
} else {
    header("Location: homepage.php");
}

require 'views-admin/admin-addpost.phtml';