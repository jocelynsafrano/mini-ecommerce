<?php $title = 'Liste des utilisateurs'?>

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
        <th scope="col">Date de création</th>
        <th scope="col">Date de modification</th>
        <th scope="col">Action</th>
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
            <td class="email"><?= $user['email'] ?></td>
            <td class="date_creation"><?= $user['date_creation'] ?></td>
            <td class="date_modif"><?= $user['date_modification'] ?></td>
            <td class="actions"><a href="index.php?controller=utilisateur&amp;action=show&amp;id=<?= $user['id'] ?>">Voir</a>
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