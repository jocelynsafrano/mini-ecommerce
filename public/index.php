<?php
/************************************************************
Ce fichier est un fichier de routing, ce qui veux dire que ce fichier va appeller la bonne aciton sur le bon controller du bon module situé dans le dossier "class" à la racine du dossier

Ces controlleurs vont, après avoir communiqué avec la base de données, générer les vues correspondantes qui sont à leurs tour situé dans le dossier "views" à la racine du projet.

Ces vues sont générés en utilisant le templating qui est expliqué dans le fichier README.md situé à la racine.

************************************************************/

// On requiert les /frameworks et les ficiers de configuration
require('../config.php');
require('../class/auth/auth.php');
require('../class/client/client.php');
require('../class/commande/commande.php');
require('../class/panier/panier.php');

// Si le paremetre controller est passé en url...
if(isset($_GET['controller']) && isset($_GET['action'])){

    $className = $_GET['controller'];

    $class = new $className;
    $functionName = $_GET['action'];
    $class->$functionName($_POST, $_GET);

}