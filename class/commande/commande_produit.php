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
    
    public function __construct($post = NULL, $get = NULL, commande $c){
        $this->post = $post;
        $this->get = $get;
        $this->commande = $c;
    }

    public function store(){

        // TODO restrict the connection on the routes
        if(!isset($_SESSION['id'])){

            $_SESSION['messages'] = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        // Vérifier si le panier n'est pas vide question de ne pas créer des commandes vides

        $req = "SELECT COUNT(*) FROM `panier_produit` LEFT JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :id";

        $bind = array(
            "id" => $_SESSION['id'],
        );

        $fields = ['COUNT(*)'];
        $result = $this->Sql($req, "COUNT(*)", $bind);

        var_dump($result);
        if(intval($result[0]["COUNT(*)"]) == 0){
            
            $messages = [
                'body' => "Votre panier est vide ! Vous ne pouvez pas valider une commande !",
                'type' => "danger"
            ];
            // TODO : Verifier cette ligne
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
            //exit;
        }
        
        // Créer la commande

        $commande_id = $this->commande->store();

        // Copier les produits du panier et les assigner à la commande
        $req = "INSERT INTO commande_produit (commande_id, produit_id)
        SELECT :commande_id, produit_id
        FROM panier_produit 
        INNER JOIN panier ON panier_produit.panier_id = panier.id
        INNER JOIN produit ON produit.id = panier_produit.produit_id
        WHERE panier.utilisateur_id = :id";
        
        $bind = array(
            "id" => $_SESSION['id'],
            "commande_id" => $commande_id
        );

        //var_dump($this->StructList($req, $fields, $bind));
        $this->Sql($req, $bind);

        // Vider le panier
        
        $req = "DELETE FROM `panier_produit` USING panier_produit LEFT JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :id";

        $bind = array(
            "id" => $_SESSION['id'],
        );

        $this->Sql($req, $bind);
        
 
        $_SESSION['messages'] = [
            'body' => "Votre panier a été validé",
            'type' => "success"
        ];
        header('Location: index.php?controller=commande&action=index');
        exit;
    }

    public function show(){
        if(!isset($_SESSION['id'])){

            $_SESSION['messages'] = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }
       
        $req = "SELECT commande_produit.id, `commande_id`, `produit_id`, produit.nom nom_produit, produit.description description_produit , prix_ht FROM `commande_produit` INNER JOIN produit ON produit.id = commande_produit.produit_id LEFT JOIN commande ON commande.id = commande_produit.commande_id WHERE commande_produit.commande_id = :commande_id AND commande.utilisateur_id = :utilisateur_id";
        
        $bind = array(
            "commande_id" => $this->get['commande_id'],
            "utilisateur_id" => $_SESSION['id']
        );

        $produits = $this->Sql($req, 'commande_id','nom_produit', 'description_produit', 'prix_ht', $bind);
        
        require '../views/templates/commande/show.php';
        // TODO : add total in cart

    }

    public function destroy(){
        if(!isset($_SESSION['id'])){

            $_SESSION['messages'] = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }
        
        if($_SESSION['role_id'] != 2){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $this->Set('id', $this->get['panier_produit_id']);
        $deleted = $this->Delete();

        if(!$deleted){
            echo 'Couldn\'t take the product off the cart';
            return;
        }
        // TODO : pass the error messages by session variables
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}