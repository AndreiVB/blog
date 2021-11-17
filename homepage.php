<?php 

require 'lib/session.php';
require 'lib/conf.php';
require 'lib/Database.php';

Session::init();

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $sql = 'SELECT title, posts.id AS post_id, content, picture, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            ORDER BY posts.created_at DESC';
    try {
        
        $db = new Database;    
        $posts = $db->findAll($sql);

    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $user_id = intval($_SESSION['user']['id']);

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

}

require 'views/homepage.phtml';