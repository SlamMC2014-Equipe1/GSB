<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];

// Récupère l'objet User
$user = unserialize($_SESSION['user']);
$idVisiteur = $user->getMatricule();

switch ($action) {
    case 'insertCR' :
        /*
         * Informations
         */
        $dateVisite = isset($_POST['dateVisite']) ? $_POST['dateVisite'] : null;
        $praticien = isset($_POST['praticien']) ? $_POST['praticien'] : null;
        $remplacant = isset($_POST['remplacant']) && ($_POST['remplacant'] == "oui") ? 1 : null;
        $motif = isset($_POST['motif']) ? $_POST['motif'] : null;
        $bilan = isset($_POST['bilan']) ? $_POST['bilan'] : null;
        /*
         * Eléments présentés
         */
        $produit1 = isset($_POST['produit1']) ? $_POST['produit1'] : null;
        $produit2 = isset($_POST['produit2']) ? $_POST['produit2'] : null;
        $qte1 = isset($_POST['echantProduit1']) ? $_POST['echantProduit1'] : null;
        $qte2 = isset($_POST['echantProduit2']) ? $_POST['echantProduit2'] : null;
        $doc = isset($_POST['doc']) && ($_POST['doc'] == "oui") ? 1 : null;
        
        /*
         * verifInsertCR renvoi une variable globale $lesMedicaments
         */
        $lesMedicaments = array();
        verifInsertCR($praticien, $dateVisite, $bilan, $motif, $produit1, $produit2, $qte1, $qte2, $lesMedicaments);
        
        /*
         * Insertion
         */
        if (nbErreurs() == 0) {
            $resultInsert = $pdo->insertRapportVisite($idVisiteur, $praticien, $dateVisite, $bilan, $motif, $remplacant, $lesMedicaments, $doc);
            echo "Tout s'est bien passé";
            header('Location: index.php');
        } else {
            $lesPraticiens = $pdo->getLesPraticiens();
            $lesMedicaments = $pdo->getLesMedicaments();
            include("vues/v_erreurs.php");
            include("vues/v_saisieCR.php");
        }
        break;
        
    case 'saisieCR' :
        $lesPraticiens = $pdo->getLesPraticiens();
        $lesMedicaments = $pdo->getLesMedicaments();
        include('vues/v_saisieCR.php');
        break;
    
    case 'consulterMesCR' :
        $lesComptesRendus = $pdo->getLesComptesRendus($user->getMatricule());
        include('vues/v_consulterMesCR.php');
        break;
    
    case 'consulterCR' :
        if (isset($_GET['num'])) {
            $num = $_GET['num'];
            $compteRendu = $pdo->getCompteRendu($num);
            $produitsPresentes = $pdo->getProduitsPresentes($num);
            
            if ($compteRendu != null) {
                if (!is_null($compteRendu['RAP_REMPLACANT']))
                {
                    $compteRendu['PRA_NOM'] = 'Remplaçant de ' . $compteRendu['PRA_NOM'];
                }
                include('vues/v_consulterCRDetail.php');
            } else {
                ajouterErreur('Le contrat n°'.$num.' n\'éxiste pas.');
                include('vues/v_erreurs.php');
            }
        }
        else
            header('Location: index.php');
        break;
}
?>