<?php $title = 'Panier'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix HT</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($produits as $produit):?>
      <tr>
      
        <th scope="row"><?= $i ?></td>
        <td><?= $produit['nom'] ?></td>
        <td><?= $produit['description'] ?></td>
        <td><?= $produit['prix_ht'] ?></td>
        <td><a href="index.php?controller=panier_produit&amp;action=destroy&amp;panier_produit_id=<?= $produit['id'] ?>">Retirer du panier</a>
        </td>
        
      </tr>
  <?php 
  $i++;
  endforeach;?>
    </tbody>
  </table>
<a class="btn btn-primary" href="index.php?controller=commande_produit&amp;action=store&amp;commande_id" role="button">Valider la commande</a>
  
</div>  

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>