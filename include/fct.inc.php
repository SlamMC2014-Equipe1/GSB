<?php
/**
 * Fonctions pour l'application GSB

 * @package default
 * @author Cheri Bibi
 * @version    1.0
 */

/**
 * Transforme une date au format français jj/mm/aaaa vers le format anglais aaaa-mm-jj

 * @param $madate au format  jj/mm/aaaa
 * @return la date au format anglais aaaa-mm-jj
 */
function dateFrancaisVersAnglais($maDate) {
    @list($jour, $mois, $annee) = explode('/', $maDate);
    return date('Y-m-d', mktime(0, 0, 0, $mois, $jour, $annee));
}

/**
 * Transforme une date au format format anglais aaaa-mm-jj vers le format français jj/mm/aaaa 

 * @param $madate au format  aaaa-mm-jj
 * @return la date au format format français jj/mm/aaaa
 */
function dateAnglaisVersFrancais($maDate) {
    @list($annee, $mois, $jour) = explode('-', $maDate);
    $date = "$jour" . "/" . $mois . "/" . $annee;
    return $date;
}

/**
 * retourne le mois au format aaaamm selon le jour dans le mois

 * @param $date au format  jj/mm/aaaa
 * @return le mois au format aaaamm
 */
function getMois($date) {
    @list($jour, $mois, $annee) = explode('/', $date);
    if (strlen($mois) == 1) {
        $mois = "0" . $mois;
    }
    return $annee . $mois;
}

/**
 * Vérifie si une date est inférieure d'un an à la date actuelle

 * @param $dateTestee 
 * @return vrai ou faux
 */
function estDateDepassee($dateTestee) {
    $dateActuelle = date("d/m/Y");
    @list($jour, $mois, $annee) = explode('/', $dateActuelle);
    $annee--;
    $AnPasse = $annee . $mois . $jour;
    @list($jourTeste, $moisTeste, $anneeTeste) = explode('/', $dateTestee);
    return ($anneeTeste . $moisTeste . $jourTeste < $AnPasse);
}

/**
 * Vérifie la validité du format d'une date française jj/mm/aaaa 

 * @param $date 
 * @return vrai ou faux
 */
function estDateValide($date) {
    $tabDate = explode('/', $date);
    $dateOK = true;
    if (count($tabDate) != 3) {
        $dateOK = false;
    } else {
        if (!estTableauEntiers($tabDate)) {
            $dateOK = false;
        } else {
            if (!checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
                $dateOK = false;
            }
        }
    }
    return $dateOK;
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 

 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg) {
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}

/**
 * Retoune le nombre de lignes du tableau des erreurs 

 * @return le nombre d'erreurs
 */
function nbErreurs() {
    if (!isset($_REQUEST['erreurs'])) {
        return 0;
    } else {
        return count($_REQUEST['erreurs']);
    }
}

/**
 * Vérifie si les champs de l'insertion du compte-rendu sont corrects
 * Renvois un booleen
 * 
 * @params $praticien, $dateVisite, $bilan, $motif, $remplacant, $produit1, $produit2, $qte1, $qte2
 */
function verifInsertCR($praticien, $dateVisite, $bilan, $motif, $produit1, $produit2, $qte1, $qte2, &$lesMedicaments) {
    // Champ praticien
    if (empty($praticien) || $praticien == "0" || $praticien === null) {
        ajouterErreur('Le <strong>praticien</strong> n\'est pas renseigné, veuillez en choisir un');
    }

    // Champ dateVisite
    if (!empty($dateVisite) && ($dateVisite !== null)) {
        if (!preg_match('#[0-9]{4}-[0-9]{2}-[0-9]{2}#', $dateVisite)) {
            ajouterErreur('La <strong>date de visite</strong> n\'a pas un format AAAA-MM-JJ');
        }
    } else {
        ajouterErreur('La <strong>date de visite</strong> n\'est pas renseignée');
    }

    // Champ bilan
    if (!empty($bilan) && ($bilan !== null)) {
        if (strlen($bilan) > 255) {
            ajouterErreur('Le <strong>bilan</strong> excède 255 caractères');
        }
    } else {
        ajouterErreur('Le champ <strong>bilan</strong> n\'est pas renseigné');
    }

    // Champ motif
    if (empty($motif) || $motif == "0" || $motif === null) {
        ajouterErreur('Le champ <strong>motif</strong> n\'est pas renseigné');
    }
    
    /**
     * Les échantillons
     */
    
    // Produit 1
    if ($produit1 != '0' && ($produit1 !== null)) {
        if (preg_match('#^[0-9]+$#', $qte1)) {
            $qte1 = intval($qte1);
            
            $lesMedicaments[] = array( 'nom' => $produit1,
                                       'qte' => $qte1);
        } else {
            ajouterErreur('La quantité du <strong>premier produit</strong> doit être un entier');
        }
    }
    
    // Produit 2
    if ($produit2 != '0' && ($produit2 !== null)) {
        if (preg_match('#^[0-9]+#', $qte2)) {
            $qte2 = intval($qte2);
            
            $lesMedicaments[] = array( 'nom' => $produit2,
                                       'qte' => $qte2);
        } else {
            ajouterErreur('La quantité du <strong>second produit</strong> doit être un entier');
        }
    }
}
?>