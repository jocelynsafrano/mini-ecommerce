<?php

class Auth{
    use Genos;

    public $u;
    public $post;
    public $get;

    public function __construct($post = NULL, $get = NULL ,utilisateur $u = NULL){
        $this->u = $u;
        $this->post = $post;
        $this->get = $get;
    }

    public function index(array $messages = NULL){
        return require '../views/templates/auth/index.php';
    }

    public function login(){
        if(!isset($this->post['email']) || empty($this->post['email'])){
            $messages = [
                'body' => "Can't find any email",
                'type' => "danger"
            ];
            return $this->index($messages);
        }

        if(!isset($this->post['mdp']) || empty($this->post['mdp'])){
            $messages = [
                'body' => "Can't find any password",
                'type' => "danger"
            ];
            return $this->index($messages);
        }


        $search = array();
        $search['email'] = $this->post['email'];
        $result = $this->u->Find($search);
        
        if(empty($result)){
            $messages = [
                'body' => "Can't find an account associated to this email",
                'type' => "danger"
            ];
            return $this->index($messages);
        }

        if($result[0]['mdp'] != md5($this->post['mdp'])){
            $messages = [
                'body' => "Wrong Password",
                'type' => "danger"
            ];
            return $this->index($messages);
        }

        $this->u->Set('id', $result[0]['id']);
        $this->u->Load();

        $_SESSION['id'] = $this->u->id;
        $_SESSION['nom'] = $this->u->nom;
        $_SESSION['prenom'] = $this->u->prenom;
        $_SESSION['email'] = $this->u->email;
        $_SESSION['cp'] = $this->u->cp;
        $_SESSION['ville_id'] = $this->u->ville_id;
        $_SESSION['role_id'] = $this->u->role_id;
        
        $messages = [
            'body' => "Vous êtes connecté ! Bienvenue !",
            'type' => "primary"
        ];
        return require '../views/index.php';
    }

    public function signup(){
        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            $messages = [
                'body' => "Please specify a name",
                'type' => "danger"
            ];
            return $this->index($messages);
        }
        if(!isset($this->post['prenom']) || empty($this->post['prenom'])){
            $messages = [
                'body' => "Please specify a first name",
                'type' => "danger"
            ];
            return $this->index($messages);
        }
        if(!isset($this->post['email']) || empty($this->post['email'])){
            $messages = [
                'body' => "Please specify an email",
                'type' => "danger"
            ];
            return $this->index($messages);
        }
        if(!isset($this->post['mdp']) || empty($this->post['mdp'])){
            $messages = [
                'body' => "Please specify a password",
                'type' => "danger"
            ];
            return $this->index($messages);
        }

        $search = array();
        $search['email'] = $this->post['email'];
        $result = $this->u->Find($search);

        if($result){
            $messages = [
                'body' => "This account already exists you must login",
                'type' => "danger"
            ];
            return $this->index($messages);
        }

        $this->u->Set('nom', $this->post['nom']);
        $this->u->Set('prenom', $this->post['prenom']);
        $this->u->Set('email', $this->post['email']);
        $this->u->Set('mdp', md5($this->post['mdp']));
        $this->u->Set('role_id', $this->post['role']);

        $this->u->Add();

        require '../views/index.php';
    }

    public function logout(){
        session_unset();
        session_destroy();
        $messages = [
            'body' => "Vou êtes déconnecté !",
            'type' => "success"
        ];
        $this->index($messages);

    }
}