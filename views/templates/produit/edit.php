<?php $title = 'Liste des produits'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

    <div class="container">
        <form action="index.php?controller=produit&amp;action=updateDb" method="POST">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input name="nom" type="text" class="form-control" id="nom" value="<?= $produit['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="desciption">Description</label>
                <input name="description" type="text" class="form-control" id="desciption" value="<?= $produit['description'] ?>">
            </div>
            <div class="form-group">
                <label for="prix_ht">Prix HT</label>
                <input name="prix_ht" type="text" class="form-control" id="prix_ht" value="<?= $produit['prix_ht'] ?>">
            </div>
            
            <input name="produit_id" type="hidden" value="<?= $produit['id'] ?>">
            
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>  
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>