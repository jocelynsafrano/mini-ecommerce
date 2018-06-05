<?php

class produit{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $utilisateur_id;
    public $prix_ht = '0000000000';
    public $date_creation;
    public $date_modification;

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
        $query = 'SELECT id, date_creation, date_modification, nom, description, prix_ht FROM produit';
        $returnFields = ['id','date_creation', 'date_modification', 'nom', 'description', 'prix_ht'];
        
        $produits = $this->StructList($query, $returnFields);
        
        require '../views/templates/produit/index.php';
    }

    public function destroy(){
        if(!isset($_SESSION['id'])){
             echo 'Vous devez être connecté pour effectuer cette action';
             return;
         }
         // TODO : swith to == when admin login is added
         $this->Set('id' , $this->get['produit_id']);
         $deleted = $this->Delete();
         

         if(!$deleted){
            echo "Can't delete product";
            return;
         }

         require '../views/templates/produit/index.php';
     }

}