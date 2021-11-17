<?php

require 'lib/session.php'; 
require 'lib/conf.php'; 
require 'lib/Database.php';

Session::init();
if(empty($_SESSION['user'])) {
    header("Location: homepage.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        extract($_POST);
    
        if (isset($_POST) && !empty($_POST))   
        {
            $user_id = intval($_SESSION['user']['id']); // convert to integer
            // Auth control
            if (array_key_exists('user_id', $_POST) && intval($_POST['user_id']) && $user_id == $_POST['user_id'])
            {           
                $errors = [];        
                foreach ($_POST as $k => $value) {
                    // Old photo doesn't matter
                    if ($k !== 'old-picture' && empty($value))
                    {
                        array_push($errors, "The field $k is empty");
                    }
                }
                // Test if errors
                if (count($errors) > 0)
                {
                    // Acces to sesion
                    $_SESSION['error'] = $errors;
                } else {
                    // extract Data
                    extract($_POST); // $email, $password
                    // Test picture
                    $hasFile = false;
                    if (array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name']))
                    {
                        // Picture exists?
                        $uploaddir = 'images/posts/'; //Destination path
                        $uploadfile = $uploaddir . basename($_FILES['picture']['name']); //Build path  
                        // No file by default
                        if (!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
                            array_push($errors, "One error has occured");
                        }else {
                            $hasFile = true; // need file here
                        }
                    }
                        // If Picture exists                       
                        if ($hasFile)
                        {
                            $sql = 'UPDATE posts
                                    SET
                                    title = :title,
                                    content = :content,
                                    picture = :picture
                                    WHERE id = :id';
                           $params = [
                                ':id' => $post_id,
                                ':title' => $title,
                                ':content' => $content,
                                ':picture' => $_FILES['picture']['name']
                            ];                           
                        }
                        else {
                            $sql = 'UPDATE posts
                            SET
                            title = :title,
                            content = :content
                            WHERE id = :id';
                    $params = [
                        ':id' => $post_id,
                        ':title' => $title,
                        ':content' => $content
                    ];                    
                        }                   
                    try {           
                    $q = $pdo->prepare($sql);
                    $q->execute($params);
                    } catch (PDOException $e) {
                        $e->getMessage();
                        die;
                    }
                    $_SESSION['info'] = "<p class=\"php-notifications php-succes\">The post has been modified</p>";     
                    goToDashBoard();
                }
            }   else {
                    $_SESSION['error'] = "<p class=\"php-notifications php-error\">The post has been registered</p>";
                    }
        }
    }    else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    header('Location: error-404.php');
    exit;
}
            if(isset($_GET['id'])) {
                $postId = $_GET['id'];
                $user_id = intval($_SESSION['user']['id']);
                    try {
                    // Recup post author
                    $q = $pdo->prepare(
                    'SELECT id, title, content, picture, user_id
                    FROM posts
                    WHERE posts.id = :id
                    AND posts.user_id = :user_id'
                    );
                    $q->execute([':id' => $postId, ':user_id' => $user_id]);
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

require 'views/edit-post.phtml';