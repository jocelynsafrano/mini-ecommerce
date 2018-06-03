<?php

class Auth{
    use Genos;

    public $u;
    public $post;
    public $get;

    public function __construct($post = NULL, $get = NULL ,utilisateurs $u){
        $this->u = $u;
        $this->post = $post;
        $this->get = $get;
    }

    public function index(){
        return require '../views/templates/auth/index.php';
    }

    public function login(){
        if(!isset($this->post['email'])){
            echo "Can't find any email";
            return;
        }
        $search = array();
        $search['email'] = $this->post['email'];
        $result = $this->u->Find($search);
        
        if(empty($result)){
            echo "Can't find this email";
            return;
        }

        if($result[0]['mdp'] != md5($this->post['mdp'])){
            echo "Wrong password";
            return;
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
        
        require '../views/index.php';
    }

    public function signup(){
        if(!isset($this->post['nom'])){
            echo "Can't find any name";
            return;
        }
        if(!isset($this->post['prenom'])){
            echo "Can't find any first name";
            return;
        }
        if(!isset($this->post['email'])){
            echo "Can't find any email";
            return;
        }
        if(!isset($this->post['mdp'])){
            echo "Can't find any password";
            return;
        }

        $search = array();
        $search['email'] = $this->post['email'];
        $result = $this->u->Find($search);

        if($result){
            echo "This account already exists you must login";
            return;
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
        
        $this->index();

    }
}