<?php $title = 'Ligne de commande'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <div class="row">
    <div class="col-sm-6">
      <h1 class="text-left"><?= $title ?></h1>
    </div>
    <div class="col-sm-6 text-right">
      <a href="index.php?controller=commande&amp;action=destroy&amp;commande_id=<?= $_GET['commande_id'] ?>" class="btn btn-danger ">Annuler la commande</a>
    </div>
  </div>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix HT</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($produits as $produit):?>
      <tr>
      
        <th scope="row"><?= $i ?></td>
        <td><?= $produit['nom_produit'] ?></td>
        <td><?= $produit['description_produit'] ?></td>
        <td><?= $produit['prix_ht'] ?></td>
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