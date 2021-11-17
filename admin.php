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

try {
    
    $q = $pdo->prepare(
        'SELECT users.id, nickname, first_name, last_name, email, role.id as roleId, role.nom as roleName
        FROM users
        INNER JOIN role ON role.id = users.role_id
        WHERE users.id = :id'
    );
    $q->execute([':id' => $admin_id]);
    $user = $q->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}


if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $sql = 'SELECT title, posts.id AS post_id, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            ORDER BY posts.created_at DESC
            LIMIT 10';
    try {
        $db = new Database;    
        $posts = $db->findAll($sql);

    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }    
}

require 'views-admin/admin.phtml';
?>