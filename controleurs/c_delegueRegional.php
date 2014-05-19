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
        include('class/graph.class.php');
        $Graph = new Graph();
        
        // Récupère les données pour le graphe
        $statsProduits = $pdo->getNbOccurenceProduits();
        $nomsProduits = array();
        $nbProduits = array();
        $nbProduitsTot = 0;
        
        foreach($statsProduits as $produit) {
            $nomsProduits[] = $produit['MED_NOMCOMMERCIAL'];
            $nbProduits[] = $produit['NB_MED'];
            $nbProduitsTot += $produit['NB_MED'];
        }
        
        // Génére le graphe et affiche la vue
        $Graph->getPieChart($nomsProduits, $nbProduits, 280, 200, 'statsProduits.png');
        include('vues/delegueRegional/v_statsProduits.php');
        break;
}
?>
