<?php

//récupère tous les derniers posts de blog.
function getPosts(){
   // Connexion à la base de données
   $database = dbConnect();
   // On récupère les 5 derniers billets
   $statement = $database->query(
      'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
      AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5'
   );
   $posts = [];
   while (($row = $statement->fetch())) {
      $post = [
            'title' => $row['title'],
            'french_creation_date' => $row['french_creation_date'],
            'content' => $row['content'],
            'id' => $row['id'],
      ];

      $posts[] = $post;
   }

      return $posts;
}

//Récupère un post précis en fonction de son ID
function getPost($id) {
   $database = dbConnect();
   $statement = $database->prepare(
       "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
       AS french_creation_date FROM posts WHERE id = ?"
   );
   $statement->execute([$id]);

   // Vérifiez si un post a été trouvé
   $row = $statement->fetch();

   // Si aucun post n'est trouvé, retourner false ou null
   if (!$row) {
      return false;  // Aucun post trouvé
      echo "Il n'y a pas de commentaire";
   }

   $post = [
      'title' => $row['title'],
      'french_creation_date' => $row['french_creation_date'],
      'content' => $row['content'],
      'id' => $row['id'],
   ];

   return $post;
}
/*
//récupère les commentaires associés à un ID de post.
function getComments($id){
   $database = dbConnect();
   $statement = $database->prepare(
       "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') 
       AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
   );
   $statement->execute([$id]);

   $comments = [];
   while (($row = $statement->fetch())) {
       $comment = [
           'author' => $row['author'],
           'french_creation_date' => $row['french_creation_date'],
           'comment' => $row['comment'],
       ];
       $comments[] = $comment;
   }

   return $comments;
}

function addComment($id){
   $database = dbConnect();
   $statement = $database->prepare(
       "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') 
       AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
   );
   $statement->execute([$id]);

   $comments = [];
   while (($row = $statement->fetch())) {
       $comment = [
           'author' => $row['author'],
           'french_creation_date' => $row['french_creation_date'],
           'comment' => $row['comment'],
       ];
       $comments[] = $comment;
   }

   return $comments;
}

*/

   // Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect(){
        $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', null);
        return $database;
}