<?php

class produit{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $utilisateur_id;
    public $prix_ht = '0000000000';
    public $date_creation;
    public $date_modification;
    public $is_deleted;
    public $post;
    public $get;
    public $categorie;

    public function __construct($post = NULL, $get = NULL, categorie $categorie = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
        $this->categorie = $categorie;
    }

    public function index(){
        $query = 'SELECT p.id, p.nom, p.description, GROUP_CONCAT(c.nom) AS nom_categorie, p.prix_ht, p.date_creation, p.date_modification FROM produit AS p LEFT JOIN categorie_produit AS cp ON p.id = cp.produit_id LEFT JOIN categorie AS c ON cp.categorie_id = c.id WHERE p.is_deleted = 0 GROUP BY p.id';
    
        $returnFields = ['id', 'nom', 'description', 'nom_categorie', 'prix_ht', 'date_creation', 'date_modification'];
        
        $produits = $this->StructList($query, $returnFields);
        
        $config['attr']['id'] = "categorie"; 
        $config['attr']['class'] = "custom-select col-sm-6 "; 
        ob_start();
        $this->categorie->SelectList( "categorie_id" , "id" , "nom" , $config);
        $categorieListe = ob_get_clean();

      /*  echo "<pre>";
        var_dump($produits);
        echo "</pre>";
die(); */
        if(isset($_SESSION['id'])){
            if($_SESSION['role_id'] == 1){
                return require '../views/templates/produit/index.php';
            }
        }
        
        return require '../views/templates/produit/front/index.php';
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
        
        if(!isset($this->post['query']) || empty($this->post['query'])){
            //var_dump($this->post['query']);
        }


        $query = "SELECT p.id, p.nom, p.description, GROUP_CONCAT(c.nom) AS nom_categorie, p.prix_ht, p.date_creation, p.date_modification FROM produit AS p LEFT JOIN categorie_produit AS cp ON p.id = cp.produit_id LEFT JOIN categorie AS c ON cp.categorie_id = c.id WHERE p.is_deleted = 0 AND p.nom LIKE :nom OR p.description LIKE :description OR c.nom LIKE :nom_categorie GROUP BY p.id";
        
        $bind = [
            'nom' => '%' . $this->post['query'] . '%',
            'description' => '%' . $this->post['query'] . '%',
            'nom_categorie' => '%' . $this->post['query'] . '%',
        ];

        $returnFields = ['id', 'nom_categorie', 'date_creation', 'date_modification', 'nom', 'description', 'prix_ht'];
        
        echo $produits = $this->StructList($query, $returnFields, $bind, "json");        
        return true;
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
        $this->Set('is_deleted', 0);
        
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
        $produit = $produit[0];
        // todo : preselect the desired categories

        ob_start();
        $options['class'] = "custom-select";
        $options['attr']['multiple'] = "multiple";
        $this->categorie->SelectList("categorie_id[]", "id", "nom", $options);
        $categorieSelectList = ob_get_clean();


        if(!empty($produit)){
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

        if(!isset($this->post['categorie_id']) || empty($this->post['categorie_id'])){
            echo "Aucune catégorie n'est séléctionnée !";
            return;
        }

        $this->Set('id', $this->post['produit_id']);

        $this->Load();

        $this->Set('nom', $this->post['nom']);
        $this->Set('description',$this->post['description']);
        $this->Set('prix_ht', intval($this->post['prix_ht']));
        $this->Set('date_modification', date('Y-m-d'));

        $this->Update();
        
        //die();
        

        foreach($this->post['categorie_id'] as $categorie_id){
        $this->categorie_produit->Set('produit_id', $this->post['produit_id']);
            
            $this->categorie_produit->Set('categorie_id',   $categorie_id);
            $this->categorie_produit->Add();
        }
        
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

    public function filter() { // Passage de l'id en paramètre
    $query = 'SELECT p.id, p.nom, c.nom AS nom_categorie, p.description, p.prix_ht, p.date_creation, p.date_modification FROM categorie_produit INNER JOIN categorie AS c ON c.id = categorie_produit.categorie_id INNER JOIN produit AS p ON p.id = categorie_produit.produit_id WHERE c.id = :id_categorie';

        $bind = ['id_categorie' => $this->get['categorie_id']];
        
        $returnFields = ['id', 'nom', 'description', 'nom_categorie', 'prix_ht', 'date_creation', 'date_modification'];

        $json  = $this->StructList($query, $returnFields, $bind,"json");
        
        echo $json;
    }
}