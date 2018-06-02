<?php

class commandes{
    use Genos;
    
    public $id;
    public $utilisateur_id;
    public $post;
    public $get;
    
    // Add inheritance for the post and the get requests variables
    
    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
    }

    public function store(){

        // TODO restrict the connection on the routes
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }

        $this->Set('utilisateur_id' , $_SESSION['id']);
        
        // add the product id and the cart id the this class's table

        return $this->Add();;

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