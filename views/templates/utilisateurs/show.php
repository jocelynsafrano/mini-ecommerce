<?php $title = 'Liste des utilisateurs'?>

<?php ob_start(); ?>

    <h1 class="display-4">Fluid jumbotron</h1>
    
    <p class="lead">Nom : <?= $user['nom']?></p>
    <p class="lead">Prenom : <?= $user['prenom']?></p>
    <p class="lead">Ville Id : <?= $user['ville_id']?></p>
    <p class="lead">Code postale : <?= $user['cp']?></p>
    <p class="lead">Telephone : <?= $user['telephone']?></p>
    <p class="lead">email : <?= $user['email']?></p>
    <p class="lead">Role Id : <?= $user['role_id']?></p>

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>