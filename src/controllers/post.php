<?php

require_once('src/model/comment.php');
require_once('src/model/post.php');
require_once('src/lib/database.php');


function post(string $id)
{
    // DEBUG temporaire :
   // var_dump($id); exit;

    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $post = $postRepository->getPost($id);
//Verification que le post existe ( par securité )
    if (!$post) {
        // Tu peux afficher une page 404 custom ou rediriger
        throw new Exception("Le billet demandé n'existe pas.");
    }

    $comments = getComments($id);
    
    require('templates/post.php');
}
