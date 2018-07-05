<?php

class panier_produit{
    use Genos;
    
    public $id;
    public $panier_id;
    public $produit_id;
    public $panier;
    public $produit;
    public $post;
    public $get;
    
    // Add inheritance for the post and the get requests variables
    
    public function __construct($post = NULL, $get = NULL, produit $produit, panier $panier){
        $this->panier = $panier;
        $this->produit = $produit;
        $this->post = $post;
        $this->get = $get;
    }

    public function index(){
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
            $_SESSION['messages'] = [
                'body' => "Vous n\'êtes pas autorisé composer un panier",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=produit&action=index');
            exit;
        }

        // TODO select all the products in the cart
        $query = 'SELECT panier_produit.id, produit.nom, produit.description, produit.prix_ht FROM panier_produit LEFT JOIN produit ON produit.id = panier_produit.produit_id LEFT JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :utilisateur_id';
        if($_SESSION['role_id'] == 1){
            $utilisateur_id = $this->get['utilisateur_id'];
        }

        if($_SESSION['role_id'] == 2){
            $utilisateur_id = $_SESSION['id'];
        }

        $bind = array ( "utilisateur_id" => $utilisateur_id);
        $returnFields = ['id', 'nom', 'description', 'prix_ht'];
        $produits = $this->StructList($query, $returnFields, $bind);

        $query = "SELECT COUNT(*) FROM panier_produit INNER JOIN produit ON produit.id = panier_produit.produit_id INNER JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :utilisateur_id";
        
        $bind = array ( "utilisateur_id" => $utilisateur_id);
        $returnFields = ['COUNT(*)'];

        $nombreProduits = $this->StructList($query, $returnFields, $bind);


        if(intval($nombreProduits[0]['COUNT(*)']) === 0){
            $_SESSION['messages'] = [
                'body' => "Malheuresement, votre panier est vide.",
                'type' => "danger"
            ];
        }

        $query = "SELECT SUM(produit.prix_ht) AS total_panier_ht, SUM(produit.prix_ht + (produit.prix_ht * 20/100)) AS total_panier FROM panier_produit INNER JOIN produit ON produit.id = panier_produit.produit_id INNER JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :utilisateur_id";
        
        $bind = array ( "utilisateur_id" => $utilisateur_id);
        $returnFields = ['total_panier_ht', 'total_panier'];

        $totalPanier = $this->StructList($query, $returnFields, $bind);

        require '../views/templates/panier/show.php';
    }

    public function store(){

        if(!isset($_SESSION['id'])){

            $html_login_link = '<a href="index.php?controller=auth&action=index"><em>Se connecter / S\'inscrire</em></a>';
            $_SESSION['messages'] = [
                'body' => "Vous devrez être connecté pour effectuer cette action ! $html_login_link",
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
            $_SESSION['messages'] = [
                'body' => "Vous n\'êtes pas autorisé de construire un panier",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=produit&action=index');
            exit;
        }

        $search = array ();
        $search[ "utilisateur_id" ] = $_SESSION['id'];
        $result = $this->panier->Find($search);

        if(!$result){
            $this->panier->Set('utilisateur_id' , $_SESSION['id']);
            
            $this->panier->Add();
           
            $search = array ();
            $search[ "utilisateur_id" ] = $_SESSION['id'];
            $result = $this->panier->Find($search);

        }
        $this->Set('produit_id' , $this->get['produit_id']);
        $this->Set('panier_id' , $result[0]['id']);
        
        $added = $this->Add();

        if(!$added){
            $_SESSION['messages'] = [
                'body' => "Zuut ! Votre produit n'a pas été ajouté au panier !",
                'type' => "danger"
            ];

            header('Location: index.php&controller=produit&action=index');
            exit;
        }

        $html_cart_link = '<em><a href ="index.php?controller=panier_produit&action=index">Voir Panier</a></em>';

        $_SESSION['messages'] = [
            'body' => "Votre produit a été ajouté au panier $html_cart_link",
            'type' => "success"
        ];

        header('Location: index.php?controller=produit&action=index');
        exit;
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
            $_SESSION['messages'] = [
                'body' => "Vous n\'êtes pas autorisé composer un panier",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=produit&action=index');
            exit;
        }

        $this->Set('id', $this->get['panier_produit_id']);
        $deleted = $this->Delete();

        if(!$deleted){
            $_SESSION['messages'] = [
                'body' => "Couldn't take the product off the cart",
                'type' => "danger"
            ];
            
            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=produit&action=index');
            exit;
            // TODO : Create a helper class to manage messages
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}