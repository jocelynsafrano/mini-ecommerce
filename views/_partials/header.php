<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if(isset($_SESSION['id'])):?>
      <li class="nav-item active">
        <a class="nav-link" href="#"><?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modules
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Produits</a>
          <a class="dropdown-item" href="#">Clients</a>
          <a class="dropdown-item" href="#">Commandes</a>
          <a class="dropdown-item" href="#">Panier</a>
        </div>
      </li>
    </ul>
      
      <?php endif; ?>
 
    <form class="form-inline mr-auto ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav ml-auto">
    
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
