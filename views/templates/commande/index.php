<?php $title = 'Liste des commandes'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID commande</th>
        <th scop="col">Date création</th>
        <th scope="col">Actions</th>
        <th scope="col"> </th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($commandes as $commande):?>
      <tr>
      
      <th scope="row"><?= $i ?></td>
      <th><?= $commande['id'] ?></td>
      <th><?= $commande['date_creation'] ?></td>
      <td><a href="index.php?controller=commande&amp;action=destroy&amp;commande_id=<?= $commande['id'] ?>">Annuler la commande</a></td>
      <td><a href="index.php?controller=commande_produit&amp;action=show&amp;commande_id=<?= $commande['id'] ?>">Voir ligne de commande</a></td>
        
      </tr>
  <?php 
  $i++;
  endforeach;?>
    </tbody>
  </table>

</div>  

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>