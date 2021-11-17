<?php
declare(strict_types=1);

require 'lib/session.php'; 
require 'lib/conf.php'; 
require 'lib/Database.php';

Session::init();

$is_admin = $_SESSION['user']['role'] == 'admin' ? true : false;
if(!$is_admin) {
    header("Location: login.php");
}

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
    { 
        if (isset($_POST) && !empty($_POST))   
        {        
            
            if (array_key_exists('user_id', $_POST))
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
                    $_SESSION['error'] = $errors;
                    } else  {                          
                            extract($_POST); 
                            // Test picture
                            $hasFile = false;
                            var_dump($hasFile);
                            if (array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name']))
                            {
                                var_dump($hasFile);
                                // Picture exists?
                                $uploaddir = 'images/posts/'; //Destination path
                                $uploadfile = $uploaddir . basename($_FILES['picture']['name']); //Build path with file name
                                // No file by default
                                if (!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
                                    var_dump($hasFile);
                                    array_push($errors, "One error has occured");
                                } else {
                                    var_dump($hasFile);
                                    $hasFile = true; // need file here
                                }
                            }
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
                                } else {
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
                    header('Location: homepage.php');
                    exit();
                }
        }
    } 
  

 else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
                'SELECT id, title, content, picture
                FROM posts
                WHERE posts.id = :id
                '
                );
                $q->execute([':id' => $postId]);
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

require 'views-admin/admin-editpost.phtml';