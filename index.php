<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/addComment.php');

try {
if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
            post($id);
            
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');

        }
    } elseif ($_GET['action'] === 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];

            addComment($id, $_POST);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
/*
            Comme vous pouvez le voir, je teste si on a bien un ID de billet. Si c'est le cas, j'appelle le contrôleuraddComment, 
            qui appelle le modèle pour enregistrer les informations en base. Pour la validation des champs du formulaire, 
            on a donné cette responsabilité au contrôleur, alors on lui passe la variable$_POSTdirectement
    */ }
    } else {
        throw new Exception("La page que vous recherchez n'existe pas.");
    }
} else {
    homepage();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();

       require('templates/error.php');
}

/** try {
*  if (isset($_GET['action']) && $_GET['action'] === 'post' && isset($_GET['id'])) {
*     post($_GET['id']);
* } else {
*    homepage(); // par défaut
* } 
* } catch (Exception $e) {
*   echo 'Erreur : ' . $e->getMessage();
* }
*/