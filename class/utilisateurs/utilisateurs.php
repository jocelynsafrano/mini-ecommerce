<?php

class utilisateurs{
    use Genos;
    
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $telephone = '0000000000';
    public $cp = '0000';
    public $ville_id = 0;
    public $role_id = 2;
    public $post;
    public $get;

    public function __construct($post, $get){
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
        $query = 'SELECT id, nom, prenom, email FROM utilisateurs WHERE role_id = 2';
        $returnFields = ['id', 'nom', 'prenom', 'email'];
        
        $users = $this->StructList($query, $returnFields);
        
        require '../views/templates/utilisateurs/index.php';
    }

    public function show(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        if($_SESSION['role_id'] != 2){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        

        $query = 'SELECT id, nom, prenom, email, cp, ville_id , telephone, role_id FROM utilisateurs WHERE role_id = 2 and id = :id';
        $fields = ['id', 'nom', 'prenom', 'email', "cp", "ville_id", "telephone", "role_id" ];
        $bind = array ( "id" => $this->get["id"]);
        
        $user = $this->StructList($query, $fields, $bind);
        
        $user = $user[0];

        require '../views/templates/utilisateurs/show.php';
    }
}