<?php $title = 'Liste de nos produits'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>
  <div class="row mb-4">
    <form action="index.php?controller=produit&amp;action=search" method="POST" class="form-inline col-sm-6">
      <input name="nom_produit" class="form-control mr-sm-2 col-sm-8" type="search" id="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  <?php 
      //categorie::select_cat();
      echo $categorieListe;
  ?>
  </div>
<div class="row">
  <div class="d-flex justify-content-between flex-wrap">
  <?php foreach($produits as $produit):?>
    <div class="card mb-4" style="width: 22rem">
      <h5 class="card-header"><?= $produit['nom'] ?></h5>
      <div class="card-body">
        <h5 class="card-title">Prix HT :<?= $produit['prix_ht'] ?> €</h5>
        <p class="card-text"><?= $produit['description'] ?></p>
        <a class="btn btn-primary" href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=<?= $produit['id'] ?>">Ajouter au panier</a>

      </div>
    </div>
<?php endforeach;?>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php'; ?>