<?php

class produit{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $utilisateur_id;
    public $prix_ht;
    public $date_creation;
    public $date_modification;
    public $is_deleted;
    public $post;
    public $get;   

    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
    }

    public function index($messages = NULL){
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
        $query = 'SELECT id, date_creation, date_modification, nom, description, prix_ht FROM produit WHERE is_deleted = 0';
        $returnFields = ['id','date_creation', 'date_modification', 'nom', 'description', 'prix_ht'];
        
        $produits = $this->StructList($query, $returnFields);
        
        require '../views/templates/produit/index.php';
    }

    public function create(){
        return require '../views/templates/produit/create.php';
    }

    public function search(){
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
        
        if(empty($this->post['nom_produit'])){
            return $this->index();
        }

        $query = "SELECT id, date_creation, date_modification, nom, description, prix_ht FROM produit WHERE is_deleted = 0 AND nom LIKE :nom";
        
        $bind = ['nom' => '%' . $this->post['nom_produit'] . '%'];

        $returnFields = ['id','date_creation', 'date_modification', 'nom', 'description', 'prix_ht'];
        
        $produits = $this->StructList($query, $returnFields, $bind);
        require '../views/templates/produit/index.php';
    }

    public function store(){
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

        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            echo "Can't find any product name";
            return;
        }
        if(!isset($this->post['description']) || empty($this->post['description'])){
            echo "Can't find any product description";
            return;
        }
        if(!isset($this->post['prix_ht']) || empty($this->post['prix_ht'])){
            echo "Can't find any HT price";
            return;
        }

        $this->Set('utilisateur_id', $_SESSION['id']);
        $this->Set('nom', $this->post['nom']);
        $this->Set('description', $this->post['description']);
        $this->Set('prix_ht', intval($this->post['prix_ht']));
        
        
        $this->Add();
        
        $this->index();

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
            echo 'Vous n\'êtes pas autorisé visualiser la liste des clients';
            return;
        }

        $query = 'SELECT id, nom, description, prix_ht FROM produit WHERE id = :id';
        $returnFields = ['id','nom', 'description', 'prix_ht'];
        
        $bind = ['id' => $this->get['produit_id']];
        
        $produit = $this->StructList($query, $returnFields, $bind);

        if(!empty($produit)){
            $produit = $produit[0];
            return require '../views/templates/produit/edit.php';
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

        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            echo "Aucun nom n'est attribué";
            return;
        }
        if(!isset($this->post['description']) || empty($this->post['description'])){
            echo "Aucun prenom n'est attribué";
            return;
        }
        if(!isset($this->post['prix_ht']) || empty($this->post['prix_ht'])){
            echo "Aucun email n'est attribué";
            return;
        }

        if(!isset($this->post['produit_id']) || empty($this->post['produit_id'])){
            echo "Aucun email n'est attribué";
            return;
        }

        $this->Set('id', $this->post['produit_id']);

        $this->Load();

        $this->Set('nom', $this->post['nom']);
        $this->Set('description',$this->post['description']);
        $this->Set('prix_ht', intval($this->post['prix_ht']));
        $this->Set('date_modification', date('Y-m-d'));

        $this->Update();
        
        $_SESSION['messages'] = [
            'body' => "Produit a été modifé!",
            'type' => "success"
        ];

        header('Location: index.php?controller=produit&action=index');
        exit;    
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
        
        if(!isset($this->get['produit_id']) || empty($this->get['produit_id'])){
            echo "Can't find any product id";
            return;
        }

        $req = "UPDATE produit SET is_deleted = 1 WHERE id = :id" ;
        
        $bind = ['id' => $this->get['produit_id']];
        
        $deleted = $this->Sql($req, $bind);
        
        $this->index();
    }
}