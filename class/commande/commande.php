<?php

class commande{
    use Genos;
    
    public $id;
    public $utilisateur_id;
    public $post;
    public $get;
    public $date_creation;
    
    // Add inheritance for the post and the get requests variables
    
    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
        
    }


    public function index(){
        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if($_SESSION['role_id'] == 1){
            $query = 'SELECT id, date_creation FROM commande';

        }else{
            $query = 'SELECT id, date_creation FROM commande WHERE utilisateur_id = :id';
        }
        // TODO: Ajouter temps création
        $returnFields = ['id', 'date_creation'];
        
        $bind = [
            'id' => $_SESSION['id']
        ];
        
        $commandes = $this->StructList($query, $returnFields, $bind);
        
        require '../views/templates/commande/index.php';
    }

    public function store(){

        // TODO restrict the connection on the routes
        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if($_SESSION['role_id'] != 2){
            $messages = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }
        
        $this->Set('utilisateur_id' , $_SESSION['id']);
        
        // add the product id and the cart id the this class's table

        return $this->Add();;

    }

    public function destroy(){
        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }
        // TODO : switch to == when admin login is adde

        $this->Set('id', $this->get['commande_id']);
        $deleted = $this->Delete();

        if(!$deleted){
            echo 'Can\'t delete the order it has products you must send';
            return;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}