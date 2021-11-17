<?php
// attempting to connect
try {
    $pdo = new PDO(
        'mysql:host=db.3wa.io;dbname=andreiban_blog;charset=UTF8',
        'andreiban',
        'b4ec4973be404a08524bbaddac31329d',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch(PDOException $e) {
    echo $e->getMessage();
    die;
}

function goToDashBoard() {
    // Redirect to the dashboard page in function of user type connected
    $role = $_SESSION['user']['role'] ?? 'admin'; 
    $url = $role.'.php'; 
    header("Location: $url");
    exit;
}