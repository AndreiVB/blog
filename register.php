<?php

require 'lib/session.php';
Session::init();
require 'lib/Database.php';
require 'lib/conf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
     $errors = [];

    if (isset($_POST) && !empty($_POST))
    {      
        
        foreach ($_POST as $k => $value) {
            if (empty($value))
            {
                array_push($errors, "The field $k is empty");
            }
            
        }

        if (count($errors) > 0)
        {
            $_SESSION['errors'] = $errors;
        } else {
            
            extract($_POST);
                   
            $username = $_POST['username'];
            $email = $_POST['email'];
    
            try {
                $q = $pdo->prepare('SELECT nickname, email from users
                WHERE nickname = :nickname OR
                email =:email');
                $q->execute([
                    ':nickname' => $username,
                    ':email' => $email
                ]);
                $user = $q->fetch();
                if($user) {
                array_push($errors, "User or mail already taken");
            }   else {
                try {
                $q = $pdo->prepare(
                'INSERT INTO users (nickname, first_name, last_name, email, password, created_at)
                VALUES (:nickname, :first_name, :last_name, :email, :password, now())'
            );
            
            $q->execute([
                ':nickname' => $username,
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT)               
            ]);

                         
            } catch (PDOException $e) {
                echo $e->getMessage();
                array_push($errors, $e->getMessage());
                $_SESSION['error'] = $errors;
                
            }  
            
            $_SESSION['info'] = "<p class=\"php-notifications php-succes\">$username has been registered</p>";
            }    
            
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }  
        }
    }
}

if(!empty($errors)) {
$array = count($errors);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
                    {
                    unset($_SESSION['error']);
                                           
                    }
require_once 'views/register.phtml';