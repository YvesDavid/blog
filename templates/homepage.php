<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
      <h1>Le super blog de l'AVBN !</h1>
      <p>Derniers billets du blog :</p>

      <?php
        foreach ($posts as $post) {
        ?>
      <div class="news">
         <h3> 
         <!-- short echo tag = On retire la balise + le echo afin de rendre le code plus propre ( <php  echo htmlspecialchars($post['title']); ?> ) -->
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->french_creation_date; ?></em>
         </h3>
         <p>
         
         <!-- On affiche le contenu du billet -->
                <?=   nl2br ( htmlspecialchars( $post->content)); ?>
         
         <br />
         <em><a href="index.php?action=post&id=<?= urlencode($post->id) ?>">Voir les commentaires</a></em>
         </p>
      </div>
      <?php
      } // Fin de la boucle des billets
      ?>
      
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
