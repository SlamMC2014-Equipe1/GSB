<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];

if ($user->getRole() != User::$DELEGUE)
{
    $action = 'accessDenied';
}

switch ($action) {
    case 'accessDenied' :
        ajouterErreur("Vous n'avez pas l'autorisation de consulter cette page");
        include("vues/v_erreurs.php");
        break;
    
    case 'statsProduits' :
        // Récupère les données pour le graphe
        $statsProduits = $pdo->getNbOccurenceProduits();
        $nbProduitsTot = 0;
        
        foreach($statsProduits as $produit) {
            $nbProduitsTot += $produit['NB_MED'];
        }
        
        include('vues/delegueRegional/v_statsProduits.php');
        break;
}
?>
