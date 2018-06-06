<?php

// Ici on intiialise les sessions même si le'utilsateure n'est pas connecté. s'il est connécté on assignera alors les avariables de sessions
session_start();
/************************************************************
Ce fichier est un fichier de routing, ce qui veux dire que ce fichier va appeller la bonne aciton sur le bon controller du bon module situé dans le dossier "class" à la racine du dossier

Ces controlleurs vont, après avoir communiqué avec la base de données, générer les vues correspondantes qui sont à leurs tour situé dans le dossier "views" à la racine du projet.

Ces vues sont générés en utilisant le templating qui est expliqué dans le fichier README.md situé à la racine.

************************************************************/

// On requiert les /frameworks et les ficiers de configuration
require('../config.php');
require('../class/auth/auth.php');
require('../class/utilisateur/utilisateur.php');
require('../class/commande/commande.php');
require('../class/commande/commande_produit.php');
require('../class/panier/panier.php');
require('../class/produit/produit.php');
require('../class/panier/panier_produit.php');

if(isset($_GET['controller']) && isset($_GET['action'])){

    $className = $_GET['controller'];

    $functionName = $_GET['action'];

    if(!class_exists($className)){
        $auth = new Auth();

        $auth->index(
            $messages = [
                'body' => '404 error',
                'type' => 'danger'
            ]
        );
        exit;
    }

    if(!method_exists($className, $functionName)){
        $auth = new Auth();

        $auth->index(
            $messages = [
                'body' => '404 error',
                'type' => 'danger'
            ]
        );
        exit;
        //TODO add redirection after login
    }
    if($_GET['controller'] == 'auth'){
        $u = new utilisateur;
        $class = new $className($_POST, $_GET, $u);
        
    }elseif($_GET['controller'] == 'panier_produit'){
        $produit = new produit;
        $panier = new panier;
        $class = new $className($_POST, $_GET, $produit, $panier);
        
    }elseif($_GET['controller'] == 'commande_produit'){
        $commande = new commande;
        $class = new $className($_POST, $_GET, $commande);
        
    }else{
        $class = new $className($_POST, $_GET);
    }
    
    $class->$functionName();
}else{
    require '../views/index.php';
}