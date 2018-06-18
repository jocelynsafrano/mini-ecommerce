<?php

class categorie{
    use Genos;
    
    public $id;
    public $nom;
    public $description;
    public $date_creation;
    public $date_modification;
    public $is_deleted;
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
        $query = 'SELECT id, nom, description, date_creation, date_modification FROM categorie WHERE is_deleted = 0';
        $returnFields = ['id', 'nom', 'description', 'date_creation', 'date_modification'];
        
        $categories = $this->StructList($query, $returnFields);
        
        return require '../views/templates/categorie/index.php';
    }

    public function create(){
        return require '../views/templates/categorie/create.php';
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
                'body' => "Vous devrez être administrateur pour effectuer cette action",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        if(!isset($this->get['categorie_id']) || empty($this->get['categorie_id'])){
            
            $_SESSION['messages'] = [
                'body' => "Malheuresement, vous n've aps sélectionné une catégorie !",
                'type' => "danger"
            ];

            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } 
            
            header('Location: index.php?controller=auth&action=index');
            exit;
        }

        $query = 'SELECT id, nom, description, date_creation, date_modification FROM categorie WHERE id = :id';
        $fields = ['id', 'nom', 'description', 'date_creation', "date_modification"];
        $bind = array ( "id" => $this->get["categorie_id"]);
        
        $categorie = $this->StructList($query, $fields, $bind);

        $categorie = $categorie[0];
        require '../views/templates/categorie/edit.php';
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
            echo 'Vous n\'êtes pas autorisé visualiser la liste des catégories';
            return;
        }

        if(!isset($this->post['nom']) || empty($this->post['nom'])){
            echo "Aucun nom n'est attribué";
            return;
        }
        if(!isset($this->post['description']) || empty($this->post['description'])){
            echo "Aucun prenom n'est attribué";
            return;
        }

        if(!isset($this->post['categorie_id']) || empty($this->post['categorie_id'])){
            echo "Aucun prenom n'est attribué";
            return;
        }

        $this->Set('id', $this->post['categorie_id']);

        $this->Load();

        $this->Set('nom', $this->post['nom']);
        $this->Set('description',$this->post['description']);
        $this->Set('date_modification', date('Y-m-d'));

        $this->Update();
        
        $_SESSION['messages'] = [
            'body' => "Catégorie a été modifé!",
            'type' => "success"
        ];

        header('Location: index.php?controller=categorie&action=index');
        exit;    
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

        if($_SESSION['role_id'] != 1){

            $_SESSION['messages'] = [
                'body' => "Malheureusement ! Vous n'êtes pas autorisé à effectuer cette action !",
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

        $this->Set('nom', $this->post['nom']);
        $this->Set('description', $this->post['description']);
        $this->Set('date_creation', date('Y-m-d'));
        $this->Set('date_modification', date('Y-m-d'));
        $this->Set('is_deleted', 0);

        $this->Add();
        
        $this->index();

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
        if(!isset($this->get['categorie_id']) || empty($this->get['categorie_id'])){
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

        $this->Set('id', $this->get['categorie_id']);

        $this->Load();

        $this->Set('is_deleted', 1);

        $this->Update();

        $query = 'SELECT id, nom, prenom, email, date_creation, date_modification FROM utilisateur WHERE is_deleted = 0';
        $returnFields = ['id', 'nom', 'prenom', 'email', 'date_creation', 'date_modification'];
        
        $users = $this->StructList($query, $returnFields);
        
        return $this->index();
    }

    public static function select_cat(){
        $query = 'SELECT * FROM categorie';
        $fields = ['id', 'nom'];

        $c = new categorie;
        $categorie = $c->StructList($query, $fields);

        require '../views/templates/categorie/index.php';
    ?>
        <select name="id" class="form-control">
            <?php foreach($categories as $categorie){ ?>
                    <option value="<?php echo categories['id'] ?>" > <?php echo $categories['nom'] ?></option>
            <?php } ?>
        </select>
    <?php }
    
}
    