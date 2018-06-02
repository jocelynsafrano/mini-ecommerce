<?php $title = 'Liste des commandes'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID commande</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($commandes as $commande):?>
      <tr>
      
      <th scope="row"><?= $i ?></td>
      <th><?= $commande['id'] ?></td>
        <td><a href="index.php?controller=commandes &amp;action=destroy&amp;commande_id=<?= $commande['id'] ?>">Annuler la commande</a>
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