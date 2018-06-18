<?php $title = 'Liste des produits'?>

<?php ob_start(); ?>
<div class="container pt-4">
  <h1 class="text-left"><?= $title ?></h1>
  <div class="container d-flex m-4">
    <form action="index.php?controller=produit&amp;action=search" method="POST" class="form-inline ml-auto">
      <input name="nom_produit" class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <?php 
      //categorie::select_cat();
      echo $categorieListe;
      if($_SESSION['role_id'] == 1):
  ?>
  <a class="btn btn-primary m-4" href="index.php?controller=produit&amp;action=create" role="button">Créer un produit</a>
  <?php 
      endif;
  ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Prix HT</th>
        <th scope="col">Date de création</th>
        <th scope="col">Date de modification</th>
        <th scope="col">Action</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody id='display_products'>
      <?php 
      $i = 0;
      foreach($produits as $produit):?>
          <tr>
          
            <th scope="row"><?= $produit['id'] ?></td>
            <td><?= $produit['nom'] ?></td>
            <td><?= $produit['description'] ?></td>
            <td><?= $produit['nom_categorie'] ?></td>
            <td><?= $produit['prix_ht'] ?></td>
            <td><?= $produit['date_creation'] ?></td>
            <td><?= $produit['date_modification'] ?></td>

            <td>
            <?php if($_SESSION['role_id'] == 1): ?>

            <a href="index.php?controller=produit&amp;action=edit&amp;produit_id=<?= $produit['id'] ?>">Modifier</a> </td>
            <td> <a href="index.php?controller=produit&amp;action=destroy&amp;produit_id=<?= $produit['id'] ?>">Supprimer</a> </td>
            
            <?php else:  ?>
            <a href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=<?= $produit['id'] ?>">Ajouter au panier</a>
            
            <?php endif;  ?>
            </td>
          </tr>
      <?php 
      $i++;
      endforeach;?>
    </tbody>
  </table>
</div>
<script>
  
  $(document).ready(function(){
    $('#categorie').change(function() {
        var id = $(this).val();
        $.ajax({
          url:"index.php?controller=produit&action=filter&categorie_id=" + id,
          method:"GET",          
          success:function(data){
            data = JSON.parse(data);
            console.log(data[0]);    
            var content = "";       
            for(i=0; i<data.length; i++){
              
              content += '<tr> <td>' + data[i].id +'</td> <td>' + data[i].nom + '</td> <td>' + data[i].description + '</td> <td>' + data[i].nom_categorie + '</td> <td>' + data[i].prix_ht + '</td> <td>' + data[i].date_creation + '</td> <td>' + data[i].date_modification + '</td> <td>  <a href="index.php?controller=panier_produit&amp;action=store&amp;produit_id=<?= $produit['id'] ?>">Ajouter au panier</a> </td> </tr>';
            }

            $('#display_products').html(content);
          }
        });
      });
    });
  </script>
<?php $content = ob_get_clean(); ?>

<?php require '../views/index.php';?>