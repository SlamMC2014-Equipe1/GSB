<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application exempleMVC du cours sur la bdd bddemployés
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdo qui contiendra l'unique instance de la classe
 * @package default
 * @author AP
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	/*private static $serveur='mysql:host=172.20.201.204';
      	private static $bdd='dbname=gsb_visiteurs';   		
      	private static $user='bdg5' ;    		
      	private static $mdp='bdg5' ;*/
        private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=gsb_visiteurs';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;
        private static $monPdo;
	private static $monPdoGsb=null;

/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
        try {
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	
        } catch (Exception $e) {
            throw new Exception("Erreur à la connexion \n" . $e->getMessage());
        }
        }

	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe PdoExemple
 
 * Appel : $instancePdoExemple = PdoExemple::getPdoExemple();
 
 * @return l'unique objet de la classe PdoExemple
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
        
   /**
    * Récupère les informations du visiteurs et son statut
    * Last MAJ : CHT - 14/02/2014
    * 
    * @return array Tableau associatif réprésentant les données de la table
    */
   public function getInfosVisiteur($login, $mdp){
       // retourne un tableau associatif contenant le visiteur
       // $req="select VIS_MATRICULE, VIS_NOM ,VIS_PRENOM from visiteur where LOGIN = '$login' and MDP = '$mdp'";
       // $req="select VIS_MATRICULE, VIS_NOM ,VIS_PRENOM from visiteur where LOGIN = 'test' and MDP = 'test'";
        $req = "SELECT v.VIS_MATRICULE, VIS_NOM ,VIS_PRENOM, TRA_ROLE 
                FROM visiteur v, travailler t
                WHERE v.VIS_MATRICULE = t.VIS_MATRICULE
                AND LOGIN = '$login' AND MDP = '$mdp'
                AND JJMMAA = (SELECT MAX(JJMMAA)
                              FROM travailler t2, visiteur v2
                              WHERE v2.VIS_MATRICULE = t2.VIS_MATRICULE
                              AND LOGIN = '$login' AND MDP = '$mdp')";
        $rs = PdoGsb::$monPdo->query($req);
	$ligne = $rs->fetch(PDO::FETCH_ASSOC);
	return $ligne;
   }
   
   public function getLesVisiteurs() {
     // retourne un tableau associatif contenant tous les visiteurs
         $req="select vis_matricule, VIS_NOM, VIS_VILLE from visiteur";
         $rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetchAll(PDO::FETCH_ASSOC);
		return $ligne;
        // ou return $this->_pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * getLesMedicaments()
     * Renvoi tous les médicaments présents dans la table medicament
     * Crée le : 06/11/2013
     * Par : omar
     * 
     * @returns array
     */
    public function getLesMedicaments() {
        //retourne un tableau associatif contenant tous les médicaments.
        $req = "SELECT MED_DEPOTLEGAL, MED_NOMCOMMERCIAL, FAM_CODE, MED_COMPOSITION, MED_EFFETS, MED_CONTREINDIC, MED_PRIXECHANTILLON, MED_PRESENTATION
                 FROM medicament";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchALL(PDO::FETCH_ASSOC);
        return $ligne;
    }
    
    /**
     * Retourne un tableau associatif contenant les médicaments saisis dans la barre de recherche
     * Crée le : 12/11/2013
     * Par : omar
     * 
     * @param string $recherche
     * @return type
     */
    public function rechercheMedicaments($recherche){
       $recherche += "%";
       $req = "SELECT * FROM medicament WHERE MED_NOMCOMMERCIAL LIKE ':recherche' LIMIT 0,20";
       
       $rs = PdoGsb::$monPdo->prepare($req);
       $rs->bindValue(":recherche", $recherche, PDO::PARAM_STR);
       $rs->execute();
       
       $ligne = $rs->fetchALL(PDO::FETCH_ASSOC);
       return $ligne;       
   }
    
    /**
     * getLesPraticiens()
     * Renvois tous les praticiens présents dans la table praticien
     * Crée le : 06/11/2013
     * Par : Firas
     * 
     * @returns array
     */
    //firas le 06/11/2013
    public function getLesPraticiens() {
        $req="select praticien.PRA_NUM, praticien.PRA_NOM, praticien.PRA_PRENOM, praticien.PRA_ADRESSE, praticien.PRA_CP, praticien.PRA_VILLE, praticien.PRA_COEFNOTORIETE, praticien.TYP_CODE, type_praticien.TYP_CODE, type_praticien.TYP_LIBELLE, type_praticien.TYP_LIEU 
            FROM praticien, type_praticien
            WHERE praticien.TYP_CODE=type_praticien.TYP_CODE
            ORDER BY praticien.PRA_NOM ASC";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $ligne;
    }
    
    //firas le 27/11/2013
    public function getLesDetails($num) {
       $req="SELECT * 
            FROM praticien
            LEFT JOIN posseder on praticien.PRA_NUM=posseder.PRA_NUM
            LEFT JOIN specialite on specialite.SPE_CODE=posseder.SPE_CODE
            LEFT JOIN type_praticien on type_praticien.TYP_CODE=praticien.TYP_CODE
            where praticien.PRA_NUM=:num";
       $rs = PdoGsb::$monPdo->prepare($req);        
       $rs->bindValue(":num", $num, PDO::PARAM_INT);
       $rs->execute();
       $ligne=$rs->fetchAll(PDO::FETCH_ASSOC);      
       return $ligne;
    }
    
    //firas le 10/12/2013
    public function getLeMax() {
        $req="select max(PRA_COEFNOTORIETE) from praticien";
        $rs = PdoGsb::$monPdo->query($req);
        $ligne = $rs->fetchColumn();
        return $ligne;
    }
    
    /*
     * insertRapportVisite()
     * Insertion des informations saisie dans le compte rendu de visite
     * Crée le : 11/11/2013
     * Par : CHT
     * 
     * @return nombre de lignes affectées
     */
    public function insertRapportVisite($idVisiteur, $praticien, $dateVisite, $bilan, $motif, $remplacant, $lesMedicaments, $doc) {
        $insertRapVisite = 'INSERT INTO rapport_visite(VIS_MATRICULE, RAP_NUM, PRA_NUM, RAP_DATE, RAP_BILAN, RAP_MOTIF, RAP_REMPLACANT, RAP_DOC)
                            VALUES (:idVisit, :numeroRap, :praticien, :dateVisite, :bilan, :motif, :remplacant, :doc)';
        
        $insertPresenter = 'INSERT INTO presenter(VIS_MATRICULE, RAP_NUM, MED_DEPOTLEGAL, OFF_QTE)
                            VALUES (:idVisite, :numeroRap, :medDepotLegal, :offQte)';
        
        try {
            $numeroRap = PdoGsb::$monPdo->query('SELECT MAX(RAP_NUM) as NB FROM rapport_visite')->fetch(PDO::FETCH_ASSOC);
            $numeroRap = intval($numeroRap['NB']) + 1;
            
            $prep = PdoGsb::$monPdo->prepare($insertRapVisite);
        
            $prep->bindValue(':idVisit', $idVisiteur, PDO::PARAM_STR);
            $prep->bindValue(':numeroRap', $numeroRap, PDO::PARAM_INT);
            $prep->bindValue(':praticien', $praticien, PDO::PARAM_INT);
            $prep->bindValue(':dateVisite', $dateVisite);
            $prep->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $prep->bindValue(':motif', $motif, PDO::PARAM_STR);
            $prep->bindValue(':remplacant', $remplacant);
            $prep->bindValue(':doc', $doc);
        
            $prep->execute();
            $nb = $prep->rowCount();
            $prep->closeCursor();
        } catch (PDOException $e) {
            throw new PDOException('Erreur '.$e->getMessage.' à la ligne <strong>'.$e->getLine.'</strong>');
        }
        
        foreach($lesMedicaments as $medicaments) {
            try {
                $prep = PdoGsb::$monPdo->prepare($insertPresenter);

                $prep->bindValue(':idVisite', $idVisiteur, PDO::PARAM_STR);
                $prep->bindValue(':numeroRap', $numeroRap, PDO::PARAM_INT);
                $prep->bindValue(':medDepotLegal', $medicaments["nom"], PDO::PARAM_STR);
                $prep->bindValue(':offQte', $medicaments["qte"], PDO::PARAM_INT);

                $prep->execute();
                $nb += $prep->rowCount();
                $prep->closeCursor();
            } catch (PDOException $e) {
                throw new PDOException('Erreur '.$e->getMessage.' à la ligne <strong>'.$e->getLine.'</strong>');
            }
        }
        
        // On retourne le nombre de lignes affectées
        return $nb;
    }
    
    /*
     * Retourne un tableau qui contient, par produits, le nombre de fois où il a été présenté
     * 
     * Par : CHT
     * Le : 05/03/2014
     */
    public function getNbOccurenceProduits() {
        $selectNbProduits = 'SELECT MED_NOMCOMMERCIAL, m.MED_DEPOTLEGAL, COUNT(*) AS NB_MED
                             FROM presenter p, medicament m 
                             WHERE m.MED_DEPOTLEGAL = p.MED_DEPOTLEGAL 
                             GROUP BY MED_NOMCOMMERCIAL';
        
        return PdoGsb::$monPdo->query($selectNbProduits)->fetchAll(PDO::FETCH_ASSOC);
    }
}   
?>