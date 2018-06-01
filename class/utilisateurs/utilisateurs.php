<?php

class utilisateurs{
    use Genos;
    

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $telephone = 0;
    public $cp = 0;
    public $ville_id = 0;
    public $role_id = 2;
}