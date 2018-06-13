<?php

class commande{
    use Genos;
    
    public $id;
    public $utilisateur_id;
    public $post;
    public $get;
    public $date_creation;
    
    // Add inheritance for the post and the get requests variables
    
    public function __construct($post = NULL, $get = NULL){
        $this->post = $post;
        $this->get = $get;
        $this->date_creation = date('Y-m-d');
        
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

        if($_SESSION['role_id'] == 1){
            $query = 'SELECT id, date_creation FROM commande';

        }else{
            $query = 'SELECT id, date_creation FROM commande WHERE utilisateur_id = :id';
        }
        // TODO: Ajouter temps création
        $returnFields = ['id', 'date_creation'];
        
        $bind = [
            'id' => $_SESSION['id']
        ];
        
        $commandes = $this->StructList($query, $returnFields, $bind);
        
        require '../views/templates/commande/index.php';
    }

    public function store(){

        // TODO restrict the connection on the routes
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

        if($_SESSION['role_id'] != 2){
            $messages = [
                'body' => "Vous n'êtes pas autorisé visualiser la liste des clients",
                'type' => "danger"
            ];
            return require '../views/templates/auth/index.php';
        }
        
        $this->Set('utilisateur_id' , $_SESSION['id']);
        
        // add the product id and the cart id the this class's table

        return $this->Add();;

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
        // TODO : Vérifier si on est bien le propriatire de qu'on upprime et édite

        if(!isset($this->get['commande_id']) || empty($this->get['commande_id'])){
            $_SESSION['messages'] = [
                'body' => "Aucune commande n'est séléctionné",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=commande&action=index');
            exit;
        }

        $query = 'DELETE FROM `commande_produit` USING commande_produit WHERE commande_id = :id';

        $bind = [
            'id' => $this->get['commande_id']
        ];

        $this->Sql($query, $bind);

        $this->Set('id', $this->get['commande_id']);
        $this->Delete();

        $_SESSION['messages'] = [
            'body' => "Commande annulée aces succès !",
            'type' => "success"
        ];

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}