<?php $title = "Editer l'utilisateur"; ?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>


    <form action="index.php?controller=utilisateurs&amp;action=update" method="POST">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input name="nom" type="text" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Nom...">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom :</label>
            <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Prenom...">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="Email...">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>  
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>