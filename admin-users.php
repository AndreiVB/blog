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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Recuperation of users
    $q = $pdo->prepare( 
        'SELECT users.id, first_name, last_name, email, role.nom as role
        FROM users
        INNER JOIN role ON role.id = users.role_id
        ORDER BY users.created_at DESC'); 
        try {           
        $q->execute(); 
        $users = $q->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
} 

else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (array_key_exists('user_search', $_POST) && !empty($_POST['user_search'])) {
        $search_term = $_POST['user_search'];
        $q = $pdo->prepare( 
        "SELECT users.id, first_name, last_name, email, role.nom as role
        FROM users
        INNER JOIN role ON role.id = users.role_id
        WHERE first_name LIKE :keyword
        OR last_name LIKE :keyword "); 
        try {           
        $q->execute([':keyword' => '%'.$search_term.'%']); 
        $users = $q->fetchAll();
        
        } catch (PDOException $e) {
            echo $e->getMessage();
             die;
        }
    } else {
        $_SESSION['info'] = "<p class=\"php-notifications php-error\">No users</p>";
    }  
} 

else {
   header('Location: admin-users.php');
}
require 'views-admin/admin-users.phtml';
?>