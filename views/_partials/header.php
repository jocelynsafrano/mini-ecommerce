<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Mini E-commerce Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
    <?php if(isset($_SESSION['id'])):?>
      <li class="nav-item active">
        <a class="nav-link" href="#"><?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modules
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if($_SESSION['role_id'] == 1) : ?>
        
          <a class="dropdown-item" href="index.php?controller=utilisateur&amp;action=index">Clients</a>        
        
<?php endif; ?>
        
          <a class="dropdown-item" href="index.php?controller=produit&amp;action=index">Produits</a>
          <a class="dropdown-item" href="index.php?controller=categorie&amp;action=index">Catégories</a>

          <a class="dropdown-item" href="index.php?controller=commande&amp;action=index">Commandes</a>
      
          <?php if($_SESSION['role_id'] == 1) :?>            
          <a class="dropdown-item" href="index.php?controller=utilisateur&amp;action=index">Clients</a>
      
        
          <?php endif;?>
          <?php if($_SESSION['role_id'] == 1) :
            
            $controller = "panier";
          else: 
            $controller = "panier_produit"
            ?>            
          <?php endif;?>

          <a class="dropdown-item" href="index.php?controller=<?= $controller ?>&amp;action=index">Panier</a>
          
        </div>
      </li>
    </ul>
      
      <?php endif; ?>
    <ul class="navbar-nav">
    
    <?php if(isset($_SESSION['id'])) :?>
      <li class="nav-item ">
        <a class="nav-link" href="index.php?controller=auth&amp;action=logout">Logout</a>
      </li>
    <?php else : ?>
      <li class="nav-item ">
        <a class="nav-link" href="index.php?controller=auth&amp;action=index">Login</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="index.php?controller=auth&amp;action=index">Register</a>
      </li>
    <?php endif; ?>
    </ul>
      
  </div>
</nav>
