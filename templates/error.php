<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
      <h1>Le super blog de l'AVBN !</h1>

      <div class="news">
         <h3> 
         <p>Une erreur est survenue : <?= $errorMessage ?>
         <em><a href="index.php">Retour sur les articles</a></em> </p>


</h3>
</div>
      <?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>