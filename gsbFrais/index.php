<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require_once 'model/class.pdogsb.php';
include 'views/layout/vue_entete.php';


require_once 'doc/fct.inc.php';
// connexion à la base de données
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
// Routeur--------------------------------
if (!isset($_REQUEST['uc'])|| !$estConnecte)
    $uc = 'connexion';
else
    $uc = $_REQUEST['uc'];

//Répartiteur-------------------------------
switch ($uc) {
    case 'connexion':
    {
        include 'controllers/c_connexion.php';
        break;
    }
    case 'etatFrais' :{
        include("controllers/c_etatFrais.php");
        break;
    }
    case 'suiviFrais':
    {
        include ("controllers/c_suiviFrais.php");
        break;
    }
    case 'suivi1D':
    {
        include ("controllers/c_suivi1D.php");
        break;
    }
    case 'gestionFrais':
    {
        include("controllers/c_gestionFrais.php");
    }
}

include 'views/layout/vue_pied.php';
