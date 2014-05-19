<?php
session_start();

/* Inclusions */
require_once("include/fct.inc.php");
require_once("include/modele.inc.php");
require_once("class/user.class.php");
include("vues/v_entete.php");

$pdo = PdoGsb::getPdoGsb();
if(!isset($_SESSION['user'])) {
    $_REQUEST['uc'] = 'connexion';
}
else {
    //On rend accessible l'objet User en session
    $user = unserialize($_SESSION['user']);
}
$uc = isset($_REQUEST['uc']) ? $_REQUEST['uc'] : 'connexion';

switch($uc){
    case 'connexion': {
            include("controleurs/c_connexion.php");
            break;
        }
       
    // Ajout CHT - 14/02/2014
    case 'gererCR':
        include('controleurs/c_gererCR.php');
        break;
    
    case 'delegueRegional': 
        include('controleurs/c_delegueRegional.php');
        break;
    
    case 'medicament':
        include("controleurs/c_consulterMEdicaments.php");
        break;
    
    //firas le 06/11/2013
    case 'praticien':
        include("controleurs/c_consulterPraticiens.php");
        break;
    
    case 'test':
        include('vues/v_sommaire.php');
        include('vues/v_statsProduits.php');
        break;
}
include("vues/v_pied.php");
?>
