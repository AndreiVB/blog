<?php 

require 'lib/session.php';
require 'lib/conf.php';
require 'lib/Database.php';

Session::init();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $q = $pdo->prepare( 
        "SELECT title, posts.id AS post_id, content, picture, posts.created_at, posts.user_id, users.id, nickname 
            FROM posts 
            INNER JOIN users ON users.id = posts.user_id 
            WHERE title LIKE :keyword OR nickname LIKE :keyword
            ORDER BY posts.created_at DESC"); 
        try {           
        $q->execute([':keyword' => '%'.$_POST['query'].'%']); 
        $posts = $q->fetchAll();
        

        $output = '';
        if(!empty($posts)) {
            foreach ($posts as $post) {
         $output .=  '    <div class="post-content"> '.
           '   <h3 class="post-title">' . htmlspecialchars($post['title']) . '</h3> '.
             ' <p class="p-limited">' . htmlspecialchars($post['content']) . '</p> ' .
             ' <a href="post-details.php?id=' . $post['post_id']  . '" class="btn btn-read btn-in-dropdown">Read more</a> ' .

             ' <div class="posted-by"> ' . 
              '  <p>by <span> ' . htmlspecialchars($post['nickname'])  . ' </span> <span ' .
           ' class="posted-at"> ' . date_create($post['created_at'])->format('d/M/Y H:i') . '</span></p>' .
            ' </div> ' ;
             if ($post['picture'] !== null) {
                 $output .= '<div class="post-image">' . '
            <a href="post-details.php?id=' . $post['post_id'] . ' "><img src="images/posts/' . htmlspecialchars($post['picture']) . '" alt="an image"></a> ' .
            '</div>';
                        } 

            else {
            $output .= '<div class="post-image hide">'.
            ' <a href="post-details.php?id=' . $post['post_id'] . '"><img src="images/posts/' . htmlspecialchars($post['picture']) . ' " alt="an image"></a> ' .
            '</div>' ;
            }

            $output .= '</div>' ;

            }
            } else {
            $output = 'Sorry, no results for your search';
            }
            echo $output;

} catch (PDOException $e) {
echo $e->getMessage();
die;
}
    }

}
