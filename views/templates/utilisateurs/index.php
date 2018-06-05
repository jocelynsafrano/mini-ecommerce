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
    <tbody id="index-results">
  <?php 
  $i = 0;
  foreach($users as $user):?>
      <tr class="row-<?= $i ?>">
      
        <th scope="row" class="id"><?= $user['id'] ?></td>
        <td class="nom"><?= $user['nom'] ?></td>
        <td class="prenom"><?= $user['prenom'] ?></td>
        <td class="actions">
        <a href="index.php?controller=utilisateur&amp;action=show&amp;id=<?= $user['id'] ?>">Voir</a>
        <a href="index.php?controller=utilisateur&amp;action=edit&amp;id=<?= $user['id'] ?>">Editer</a>
        <a href="index.php?controller=utilisateur&amp;action=destroy&amp;utilisateur_id=<?= $user['id'] ?>">Supprimer</a>
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