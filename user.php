<?php

require 'lib/session.php';
require 'lib/Database.php';
require 'lib/conf.php';

Session::init();
if(empty($_SESSION['user'])) {
    header("Location: homepage.php");
}


$user_id = intval($_SESSION['user']['id']); // 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
try {
    
    $q = $pdo->prepare(
        'SELECT users.id, nickname, first_name, last_name, email, role.nom as role
        FROM users
        INNER JOIN role ON role.id = users.role_id
        WHERE users.id = :id'
        );      
    $q->execute(([':id' => $user_id])); 
    $user = $q->fetch();
    
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

 if($user) {
     $_SESSION['user'] = [
                            'id'        => $user['id'],
                            'nickname'  => $user['nickname'],
                            'email'     => $user['email'],
                            'role'      => $user['role']
                        ];
 }

// Get Posts
try {
    $q = $pdo->prepare(
        'SELECT posts.id, title, content, picture, posts.created_at, user_id
            FROM posts
            INNER JOIN users ON users.id = posts.user_id
            WHERE users.id = :id
            ORDER BY posts.created_at DESC
            '
    );
    $q->execute(([':id' => $user_id]));
    $posts = $q->fetchAll();
    
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
} 
}


require 'views/user.phtml';

 