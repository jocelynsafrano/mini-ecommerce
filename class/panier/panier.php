<?php

class panier{
    use Genos;
    
    public $id;
    public $utilisateur_id;
    public $date_creation;

    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
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
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 1){
            
            $_SESSION['messages'] = [
                'body' => "Vous devrez être administrateur pour effectuer cette action !",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        // TODO select all the products in the cart
        $query = 'SELECT p.id, u.nom, u.prenom, u.email FROM panier AS p INNER JOIN utilisateur AS u ON p.utilisateur_id=u.id';
        $returnFields = ['id', 'nom', 'prenom', 'email'];
        
        $paniers = $this->StructList($query, $returnFields);
        
        require '../views/templates/panier/index.php';
    }

    public function create(){
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
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        

        $query = 'SELECT id, nom, prenom, email, cp, ville_id , telephone, role_id FROM utilisateur WHERE role_id = 2 and id = :id';
        $fields = ['id', 'nom', 'prenom', 'email', "cp", "ville_id", "telephone", "role_id" ];
        $bind = array ( "id" => $this->get["id"]);
        
        $user = $this->StructList($query, $fields, $bind);

        $user = $user[0];

        require '../views/templates/utilisateur/show.php';
    }
}