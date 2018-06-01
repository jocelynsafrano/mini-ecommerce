<?php $title = 'Liste des utilisateurs'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left">Liste des clients</h1>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  $i = 0;
  foreach($users as $user):?>
      <tr>
      
        <th scope="row"><?= $user['id'] ?></td>
        <td><?= $user['nom'] ?></td>
        <td><?= $user['prenom'] ?></td>
        <td><a href="index.php?controller=utilisateurs&amp;action=show&amp;id=<?= $user['id'] ?>">Voir</a>
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