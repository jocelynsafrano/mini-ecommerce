<?php

class produit{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $utilisateur_id;
    public $nom_categorie;
    public $prix_ht = '0000000000';
    public $date_creation;
    public $date_modification;

    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
    }

    public function index(){
       if(!isset($_SESSION['id'])){
            echo 'Vous devez être connecté pour effectuer cette action';
            return;
        }
        // TODO : swith to == when admin login is added
        $query = 'SELECT p.id, p.nom, p.description, c.nom AS nom_categorie, p.prix_ht, p.date_creation, p.date_modification FROM produit
         AS p INNER JOIN categorie_produit AS cp ON p.id = cp.id_produit INNER JOIN categorie AS c ON cp.id_categorie = c.id';
        $returnFields = ['id', 'nom', 'description', 'nom_categorie', 'prix_ht', 'date_creation', 'date_modification'];
        
        $produits = $this->StructList($query, $returnFields);
        
        require '../views/templates/produit/index.php';
    }

    public function create(){
        require '../views/templates/produit/create.php';
    }


    public function store(){
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

    public function destroy(){

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