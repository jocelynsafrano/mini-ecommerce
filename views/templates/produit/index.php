<?php $title = 'Liste des produits'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>
  <?php if($_SESSION['role_id'] == 1):?>
  <a class="btn btn-primary m-4" href="index.php?controller=produit&amp;action=create" role="button">Créer un produit</a>
<?php endif; ?>
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Prix HT</th>
        <th scope="col">Date de création</th>
        <th scope="col">Date de modification</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i = 0;
      foreach($produits as $produit):?>
          <tr>
          
            <th scope="row"><?= $produit['id'] ?></td>
            <td><?= $produit['nom'] ?></td>
            <td><?= $produit['description'] ?></td>
            <td><?= $produit['nom_categorie'] ?></td>
            <td><?= $produit['prix_ht'] ?></td>
            <td><?= $produit['date_creation'] ?></td>
            <td><?= $produit['date_modification'] ?></td>

            <td>
            <?php if($_SESSION['role_id'] == 1): ?>

<<<<<<< HEAD
            <a href="index.php?controller=produit&amp;action=destroy&amp;produit_id=<?= $produit['id'] ?>">Supprimer produit</a>
            <a href="index.php?controller=produit&amp;action=edit&amp;produit_id=<?= $produit['id'] ?>">Editer produit</a>
=======
            <a href="index.php?controller=produit&amp;action=destroy&amp;produit_id=<?= $produit['id'] ?>">Supprimer le produit</a>
>>>>>>> editCategorie
            
            <?php else:  ?>
            <a href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=<?= $produit['id'] ?>">Ajouter au panier</a>
            
            <?php endif;  ?>
            </td>
          </tr>
      <?php 
      $i++;
      endforeach;?>
    </tbody>
  </table>
</div>  
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>