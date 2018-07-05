<?php $title = 'Créer une nouvelle catégorie'?>

<?php ob_start(); ?>
<div class="container mt-4" >

<h1><?= $title ?></h1>
    <div class="col-md-6 offset-md-3 mt-4">
        <form action="index.php?controller=categorie&amp;action=store" method="POST">
        <div class="form-group">
            <label for="nom">Email address</label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom produit">
        </div>
        <div class="form-group">
            <label for="description">Password</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="Description">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>