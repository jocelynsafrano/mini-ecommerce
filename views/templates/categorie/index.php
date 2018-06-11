<?php $title = 'Liste des catégories'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scop="col">Nom</th>
        <th scop="col">Description</th>
        <th scop="col">Date de création</th>
        <th scop="col">Date de modification</th>
        <th scope="col">Actions</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 1;
  foreach($categories as $categorie):?>
      <tr>
      
      <th scope="row"><?= $i ?></td>
      <td><?= $categorie['nom'] ?></td>
      <td><?= $categorie['description'] ?></td>
      <td><?= $categorie['date_creation'] ?></td>
      <td><?= $categorie['date_modification'] ?></td>
      <td><a href="index.php?controller=categorie&amp;action=edit&amp;categorie=<?= $categorie['id'] ?>">Modifier la catégorie</a></td>
      <td><a href="index.php?controller=categorie&amp;action=destroy&amp;categorie=<?= $categorie['id'] ?>">Supprimer la catégorie</a>        
      </tr>
  <?php 
  $i++;
  endforeach;?>
    </tbody>
  </table>

</div>  

<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>