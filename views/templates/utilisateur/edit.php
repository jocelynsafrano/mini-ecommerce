<?php $title = 'Liste des produits'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

<div class="container">
    <form action="index.php?controller=utilisateur&amp;action=update" method="POST">
        <div class="form-group">
            <label for="nom">Email address</label>
            <input name="nom" type="text" class="form-control" id="nom" value="<?= $user['nom'] ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Password</label>
            <input name="prenom" type="text" class="form-control" id="prenom" value="<?= $user['prenom'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input name="email" type="text" class="form-control" id="email" value="<?= $user['email'] ?>">
        </div>
        
        <input name="utilisateur_id" type="hidden" value="<?= $user['id'] ?>">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>  
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>