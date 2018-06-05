<?php $title = 'Liste des produits d\'un panier';?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>
  <a class="btn btn-primary" href="index.php?controller=produit&action=create" role="button">Créer un produit</a>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($paniers as $panier):?>
      <tr>
      <!--// TODO : take the content of this file to show.php and use this file to display the list of carts-->
        <th scope="row"><?= $i ?></td>
        <td><?= $panier['nom'] ?></td>
        <td><?= $panier['prenom'] ?></td>
        <td><?= $panier['email'] ?></td>
        <td><a href="index.php?controller=panier_produit&amp;action=index&amp;utilisateur_id=<?= $produit['id'] ?>">Retirer du panier</a>
        </td>
        
      </tr>
  <?php 
  $i++;
  endforeach;?>
    </tbody>
  </table>
<a class="btn btn-primary" href="index.php?controller=commande_produit&amp;action=store" role="button">Valider la commande</a>
  
</div>  

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>