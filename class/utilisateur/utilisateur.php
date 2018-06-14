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
    public $date_modification;
    public $is_deleted;
    public $post;
    public $get;

    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
        $this->date_modification = date('Y-m-d');
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
        if($_SESSION['role_id'] != 1){
            $_SESSION['messages'] = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            header('Location: index.php?controller=produit&action=index');
            exit;
        }
        
        $query = 'SELECT id, nom, prenom, email, date_creation, date_modification FROM utilisateur WHERE is_deleted = 0';
        $returnFields = ['id', 'nom', 'prenom', 'email', 'date_creation', 'date_modification'];
        
        $users = $this->StructList($query, $returnFields);
        
        return require '../views/templates/utilisateur/index.php';
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
        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        

        $query = 'SELECT id, nom, prenom, email, cp, ville_id , telephone, role_id, date_creation, date_modification FROM utilisateur WHERE role_id = 2 and id = :id';
        $fields = ['id', 'nom', 'prenom', 'email', "cp", "ville_id", "telephone", "role_id", "date_creation", "date_modification" ];
        $bind = array ( "id" => $this->get["id"]);
        
        $user = $this->StructList($query, $fields, $bind);

        $user = $user[0];
        require '../views/templates/utilisateur/show.php';
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
        if($_SESSION['role_id'] != 1){
            $_SESSION['messages'] = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }
        if(!isset($this->get['id']) || empty($this->get['id'])){
            $_SESSION['messages'] = [
                'body' => "Please specify a user to delete",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        $this->Set('id', $this->get['id']);

        $this->Load();

        $this->Set('is_deleted', 1);

        $this->Update();

        $query = 'SELECT id, nom, prenom, email, date_creation, date_modification FROM utilisateur WHERE is_deleted = 0';
        $returnFields = ['id', 'nom', 'prenom', 'email', 'date_creation', 'date_modification'];
        
        $users = $this->StructList($query, $returnFields);
        
        return require '../views/templates/utilisateur/index.php';
    }

    public function edit(){

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

        if($_SESSION['role_id'] != 1){
            $_SESSION['messages'] = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        $query = 'SELECT id, nom, prenom, email FROM utilisateur WHERE id = :id';
        
        $returnFields = ['id', 'nom', 'prenom', 'email'];
        
        $bind = ['id' => $this->get['id']];
        
        $user = $this->StructList($query, $returnFields, $bind);
        
        if(!empty($user)){
            $user = $user[0];
            return require '../views/templates/utilisateur/edit.php';
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function updateDb(){

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

        if($_SESSION['role_id'] != 1){
            $_SESSION['messages'] = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            $_SESSION['messages'] = [
                'body' => "Aucun nom n'est attribué",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }
        if(!isset($this->post['prenom']) || empty($this->post['prenom'])){
            $_SESSION['messages'] = [
                'body' => "Aucun prenom n'est attribué",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        if(!isset($this->post['email']) || empty($this->post['email'])){
            $_SESSION['messages'] = [
                'body' => "Aucun email n'est attribué",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        $this->Set('id', $this->post['utilisateur_id']);

        $this->Load();

        $this->Set('nom', $this->post['nom']);
        $this->Set('prenom', $this->post['prenom']);
        $this->Set('email', $this->post['email']);

        $this->Update();

        $_SESSION['messages'] = [
            'body' => "Utilisateur modifié avec succès !",
            'type' => "success"
        ];
        
        header('Location: index.php?controller=utilisateur&action=index');
        exit;
    }
}