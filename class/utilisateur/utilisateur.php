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
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }
        
        $query = 'SELECT id, nom, prenom, email, date_creation, date_modification FROM utilisateur';
        $returnFields = ['id', 'nom', 'prenom', 'email', 'date_creation', 'date_modification'];
        
        $users = $this->StructList($query, $returnFields);
        
        return require '../views/templates/utilisateur/index.php';
    }

    public function show(){
        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
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

    public function search(){
        $query = 'SELECT id, nom, prenom, email FROM  WHERE role_id = 2';
        $fields = ['id', 'nom', 'prenom', 'email'];
        
        $res = $this->StructList($query,$fields, "json" );
        echo $res;
        
    }

    public function destroy(){
        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if(!isset($this->get['id']) || empty($this->get['id'])){
            echo 'Please specify a user to delete';
            // TODO :: create a message variable and require the view
        }
        // TODO : add javascript delete confirmation
        $this->Set('id', $this->get['id']);
        $deleted = $this->Delete();
    
        if($deleted){
            return $this->index();
        }

        echo 'Can\'t delete the user he has orders';
        return;
    }

    public function edit(){

        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }

        //$query = 'SELECT id, nom, prenom, email FROM utilisateurs WHERE role_id = 2';
        $query = 'SELECT id, nom, prenom, email FROM utilisateur WHERE id = :id';
        
        $returnFields = ['id', 'nom', 'prenom', 'email'];
        
        $bind = ['id' => $this->get['utilisateur_id']];
        
        $user = $this->StructList($query, $returnFields, $bind);
        
        if(!empty($user)){
            $user = $user[0];
            return require '../views/templates/utilisateur/edit.php';
        }

        header('Location : ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function update(){

        if(!isset($_SESSION['id'])){
            $messages = [
                'body' => "Vous devrez être connecté pour effectuer cette action !",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }

        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            $message = "Aucun nom n'est attribué";
            $this->index();
        }
        if(!isset($this->post['prenom']) || empty($this->post['prenom'])){
            $message = "Aucun prenom n'est attribué";
            $this->index();
        }
        if(!isset($this->post['email']) || empty($this->post['email'])){
            $message = "Aucun email n'est attribué";
            $this->index();
        }

        $this->Set('id', $this->post['utilisateur_id']);

        $this->Load();

        $this->Set('nom', $this->post['nom']);
        $this->Set('prenom', $this->post['prenom']);
        $this->Set('email', $this->post['email']);

        $this->Update();

        header('Location : ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}