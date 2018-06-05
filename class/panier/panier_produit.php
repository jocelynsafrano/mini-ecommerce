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
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé visualiser les produits d\'un panier en tant qu\'Admin';
            return;
        }

        // TODO select all the products in the cart
        $query = 'SELECT panier_produit.id, produit.nom, produit.description, produit.prix_ht FROM panier_produit INNER JOIN produit ON produit.id = panier_produit.produit_id INNER JOIN panier ON panier.id = panier_produit.panier_id WHERE panier.utilisateur_id = :utilisateur_id';

        if($_SESSION['role_id'] == 1){
            $utilisateur_id = $this->get['utilisateur_id'];
        }

        if($_SESSION['role_id'] == 2){
            $utilisateur_id = $_SESSION['id'];
        }

        $bind = array ( "utilisateur_id" => $utilisateur_id);
        $returnFields = ['id', 'nom', 'description', 'prix_ht'];
        
        $produits = $this->StructList($query, $returnFields, $bind);

        require '../views/templates/panier/show.php';
    }

    public function store(){

        // TODO restrict the connection on the routes
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé composer un panier';
            return;
        }

        $search = array ();
        $search[ "utilisateur_id" ] = $_SESSION['id'];
        $result = $this->panier->Find($search);

        if(!$result){
            $this->panier->Set('utilisateur_id' , $_SESSION['id']);
            
            $added = $this->panier->Add();

            if($added != 1){
                echo "Can't add the user' cart";
                return;
            }
            
            $search = array ();
            $search[ "utilisateur_id" ] = $_SESSION['id'];
            $result = $this->panier->Find($search);

        }
        $this->Set('produit_id' , $this->get['produit_id']);
        $this->Set('panier_id' , $result[0]['id']);
        
        // add the product id and the cart id the this class's table
        $this->Add();

        //header('Location : http://localhost/mini-ecommerce/public/index.php?controller=produit&action=index');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
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