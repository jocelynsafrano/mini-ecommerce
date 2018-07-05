<nav id="slide-menu">
	<ul>
		<?php if(isset($_SESSION['id'])) :?>
		<li>Bonjour <?= $_SESSION['prenom']?></li>
		<li class="sep"></li>		
		<li >
			<a href="index.php?controller=produit&amp;action=index">Produits</a>
		</li>

		<li>
			<a href="index.php?controller=categorie&amp;action=index">Catégories</a>
		</li>

		<li>
			<a href="index.php?controller=commande&amp;action=index">Commandes</a>
		</li>

		<?php if($_SESSION['role_id'] == 1) :
            
            $controller = "panier";
          else: 
            $controller = "panier_produit"
            ?>            
          <?php endif;?>
		<li>
			<a href="index.php?controller=<?= $controller ?>&amp;action=index">Panier</a>
		</li>

			<?php if($_SESSION['role_id'] == 1) :?>
		
		<li>
			<a href="index.php?controller=utilisateur&amp;action=index">Clients</a>
		</li>          

		<?php endif;?>
		<li class="se-deconnecter">
        	<a href="index.php?controller=auth&amp;action=logout">Se déconnecter</a>
		</li>

	

		
		<?php else : ?>
		
		<li>
        	<a href="index.php?controller=auth&amp;action=index">S'inscrire</a>
     	</li>

		<li>
			<a href="index.php?controller=auth&amp;action=index">Se connecter</a>
		</li>
		<?php endif; ?>
		
	</ul>
</nav>
