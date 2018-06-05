<?php

class utilisateur{
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
    public $date_creation;
    public $date_modification = 0;
    public $post;
    public $get;

    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
    }

    public function index(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
<<<<<<< Updated upstream:class/utilisateur/utilisateur.php
        $query = 'SELECT id, nom, prenom, email, date_creation, date_modification FROM utilisateur';
        $returnFields = ['id', 'nom', 'prenom', 'email', 'date_creation', 'date_modification'];
=======

        //$query = 'SELECT id, nom, prenom, email FROM utilisateurs WHERE role_id = 2';
        $query = 'SELECT id, nom, prenom, email FROM utilisateurs';
        
        $returnFields = ['id', 'nom', 'prenom', 'email'];
>>>>>>> Stashed changes:class/utilisateurs/utilisateurs.php
        
        $users = $this->StructList($query, $returnFields);
        
        require '../views/templates/utilisateur/index.php';
    }

    public function show(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        

        $query = 'SELECT id, nom, prenom, email, cp, ville_id , telephone, role_id, date_creation, date_modification FROM utilisateurs WHERE role_id = 2 and id = :id';
        $fields = ['id', 'nom', 'prenom', 'email', "cp", "ville_id", "telephone", "role_id", "date_creation", "date_modification" ];
        $bind = array ( "id" => $this->get["id"]);
        
        $user = $this->StructList($query, $fields, $bind);

        $user = $user[0];

        require '../views/templates/utilisateurs/show.php';
    }

    public function search(){
        $query = 'SELECT id, nom, prenom, email FROM utilisateurs WHERE role_id = 2';
        $fields = ['id', 'nom', 'prenom', 'email'];
        
        $res = $this->StructList($query,$fields, "json" );
        echo $res;
        
    }

    public function destroy(){
        if(!isset($this->get['utilisateur_id']) || empty($this->get['utilisateur_id'])){
            echo 'Please specify a user to delete';
        }
        // TODO : add javascript delete confirmation
        $this->Set('id', $this->get['utilisateur_id']);
        $deleted = $this->Delete();
    
        if($deleted){
            return $this->index();
        }

        echo 'Can\'t delete the user';
        return;
    }

    public function edit(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }

        //$query = 'SELECT id, nom, prenom, email FROM utilisateurs WHERE role_id = 2';
        $query = 'SELECT id, nom, prenom, email FROM utilisateurs';
        
        $returnFields = ['id', 'nom', 'prenom', 'email'];
        
        $users = $this->StructList($query, $returnFields);
        
        require '../views/templates/utilisateurs/edit.php';
    }
}