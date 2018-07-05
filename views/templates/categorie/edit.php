<?php $title = 'Liste des catégories'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

    <div class="container">
        <form action="index.php?controller=categorie&amp;action=updateDb" method="POST">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input name="nom" type="text" class="form-control" id="nom" value="<?= $categorie['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="desciption">Description</label>
                <input name="description" type="text" class="form-control" id="desciption" value="<?= $categorie['description'] ?>">
            </div>
            
            <input name="categorie_id" type="hidden" value="<?= $categorie['id'] ?>">
            
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>  
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>