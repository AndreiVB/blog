 <?php

require 'lib/conf.php'; 
require 'lib/session.php';
require 'lib/Database.php';

Session::init();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
         if(empty($_POST['username']) || empty($_POST['password'])) {
            
            $errors = [];
            foreach ($_POST as $k => $value) {
            if (empty($value))
            {
                array_push($errors, "The field $k is empty");
            }
        }     
        if (count($errors) > 0)
        {
            $_SESSION['error'] = $errors;       
        }  

        }  
        
    if (isset($_POST) && !empty($_POST))
    {       
        $errors = [];
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
            try {
                
                $q = $pdo->prepare(
                    'SELECT users.id, nickname, first_name, email, password, role.nom as role
                    FROM users
                    INNER JOIN role ON role.id = users.role_id
                    WHERE nickname = :nickname'
                );
                
               
                $q->execute([
                    ':nickname' => $username
                ]);         
                $user = $q->fetch();
                    
                        
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            } 

            if ($user)
            {
                    if (password_verify($password, $user['password']))
                    {
                        
                        $_SESSION['info'] = "<p class=\"php-notifications php-succes\">You are logged in</p>";
                        $_SESSION['user'] = [
                            'id'        => $user['id'],
                            'nickname'  => $user['nickname'],                          
                            'email'     => $user['email'],
                            'role'      => $user['role']
                        ];
                         goToDashBoard();
                    } else {
                        // Wrong password message       
                        array_push($errors, "Wrong password");
                    }
            }else {              
                // Wrong username mesage              
                    array_push($errors, "Wrong username");         
            }  
          unset($_SESSION['error']);         
        }
    }
    $_SESSION['error'] = $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
            { 
                unset($_SESSION['info']);
                unset($_SESSION['error']);
            }

require_once 'views/login.phtml';


      