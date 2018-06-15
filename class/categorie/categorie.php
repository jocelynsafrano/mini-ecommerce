<?php

class categorie{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
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
            echo 'Vous n\'êtes pas autorisé visualiser la liste des catégories';
            return;
        }
        $query = 'SELECT id, nom, description, date_creation, date_modification FROM categorie';
        $returnFields = ['id', 'nom', 'description', 'date_creation', 'date_modification'];
        
        $categories = $this->StructList($query, $returnFields);
        
        require '../views/templates/categorie/index.php';
    }

    public function edit(){
        if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        if($_SESSION['role_id'] != 1){
            echo 'Vous n\'êtes pas autorisé à modifier une catégorie';
            return;
        }
        

        $query = 'SELECT id, nom, description, date_creation, date_modification FROM categorie WHERE id = :id';
        $fields = ['id', 'nom', 'description', 'date_creation', "date_modification"];
        $bind = array ( "id" => $this->get["id"]);
        
        $categorie = $this->StructList($query, $fields, $bind);

        $categorie = $categorie[0];
        require '../views/templates/categorie/edit.php';
    }

    public function destroy(){
        if(!isset($this->get['categorie_id']) || empty($this->get['categorie_id'])){
            return $this->index();
            echo 'Choisissez une catégorie à supprimer';
        }
        else if($deleted){
            return $this->index();

        echo 'Impossible de supprimer cette catégorie';
        return;
        }
        else {
             // TODO : add javascript delete confirmation
        $this->Set('id', $this->get['categorie_id']);
        $deleted = $this->Delete();
        }

    public function filter_categorie(){
        $query = 'SELECT id, nom FROM categorie';
        $returnFields = ['id', 'nom'];

        require '../views/template/produit/index.php';
    }
    }
}