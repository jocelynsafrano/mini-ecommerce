<?php

class produit{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $utilisateur_id;
    public $prix_ht = '0000000000';

    public function __construct($post = NULL, $get = NULL){
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
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        $query = 'SELECT id, nom, description, prix_ht FROM produit';
        $returnFields = ['id', 'nom', 'description', 'prix_ht'];
        
        $produits = $this->StructList($query, $returnFields);
        
        require '../views/templates/produit/index.php';
    }

}