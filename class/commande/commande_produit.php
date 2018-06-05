<?php

class commande_produit{
    use Genos;
    
    public $id;
    public $commande_id;
    public $produit_id;
    public $get;
    public $post;
    public $commande;
    
    // Add inheritance for the post and the get requests variables
    
    public function __construct($post = NULL, $get = NULL, commandes $c){
        $this->post = $post;
        $this->get = $get;
        $this->commande = $c;
    }

    public function store(){



        // On doit créer la commande et lui assigner les produits du panier en vidant le panier après

        // TODO restrict the connection on the routes
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added

        // Vérifier si le panier n'est pas vide question de ne pas créer des commandes vides

        $req = "SELECT COUNT(*) FROM `panier_produit` JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :id";

        $bind = array(
            "id" => $_SESSION['id'],
        );

        $fields = ['COUNT(*)'];
        $result = $this->Sql($req, "COUNT(*)", $bind);
        
        if(intval($result[0]["COUNT(*)"]) <= 0){
            echo "Votre panier est vide ! Vous ne pouvez pas valider une commande";
            return;
        }
        
        // Créer la commande

        $commande_id = $this->commande->store();

        // Copier les produits du panier et les assigner à la commande
        $req = "INSERT INTO commande_produit (commande_id, produit_id)
        SELECT :commande_id, produit_id
        FROM panier_produit, panier
        WHERE panier.utilisateur_id = :id";
        
        $bind = array(
            "id" => $_SESSION['id'],
            "commande_id" => $commande_id
        );

        //var_dump($this->StructList($req, $fields, $bind));
        $this->Sql($req, $bind);

        // Vider le panier
        
        $req = "DELETE FROM `panier_produit` USING panier_produit JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :id";

        $bind = array(
            "id" => $_SESSION['id'],
        );

        $this->Sql($req, $bind);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        
    }

    public function show(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
       
        $req = "SELECT commande_produit.id, `commande_id`, `produit_id`, produit.nom nom_produit, produit.description description_produit , prix_ht FROM `commande_produit` INNER JOIN produit ON produit.id = commande_produit.produit_id WHERE commande_produit.commande_id = :commande_id";
        
        $bind = array(
            "commande_id" => $this->get['commande_id']
        );

        $produits = $this->Sql($req, 'commande_id','nom_produit', 'description_produit', 'prix_ht', $bind);
        
        require '../views/templates/commande/show.php';
        // TODO : add total in cart

    }

    public function destroy(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }

        $this->Set('id', $this->get['panier_produit_id']);
        $deleted = $this->Delete();

        if(!$deleted){
            echo 'Couldn\'t take the product off the cart';
            return;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}