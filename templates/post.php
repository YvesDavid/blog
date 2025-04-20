<?php $title = "Le blog de l'AVBN"; ?>
     
<?php ob_start(); ?>
      <h1>Le super blog de l'AVBN !</h1>
      <em><a href="index.php">Retour sur les articles</a></em>  
      <div class="news">
         <h3> 
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->french_creation_date; ?></em>
         </h3>
         <p>
         
         <!-- On affiche le contenu du billet -->
                <?= nl2br (htmlspecialchars($post->content));
         ?>
         </p>
          </div>
         
         <br />
         <h2>Commentaires</h2>

            <form action="index.php?action=addComment&id=<?= $post->id ?>" method="post">
               <div>
               <label for="author">Auteur</label><br />
               <input type="text" id="author" name="author" />
               </div>
               <div>
               <label for="comment">Commentaire</label><br />
               <textarea id="comment" name="comment"></textarea>
               </div>
               <div>
               <input type="submit" />
               </div>
            </form>

         <?php
        foreach ($comments as $comment) {
        ?>
     
      <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?></p>
        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
        <?php
        }
        ?>
  
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>