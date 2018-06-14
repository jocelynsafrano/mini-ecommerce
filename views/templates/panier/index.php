<?php $title = 'Liste des panier ouverts par les clients';?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
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