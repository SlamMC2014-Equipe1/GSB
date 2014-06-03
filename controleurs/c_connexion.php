<?php
if(!isset($_REQUEST['action'])){
    if(!isset($user)) {
	$_REQUEST['action'] = 'demandeConnexion';
    } else {
        header('Location: index.php');
    }
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = isset($_REQUEST['login']) ? $_REQUEST['login'] : '';
		$mdp = isset($_REQUEST['mdp']) ? $_REQUEST['mdp'] : '';
                
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)) {
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else {
                    $matricule = $visiteur['VIS_MATRICULE'];
                    $role = $visiteur['TRA_ROLE'];
                    $nom =  $visiteur['VIS_NOM'];
		    $prenom = $visiteur['VIS_PRENOM'];
                    
                    $user = new User();
                        $user->setLogin($login);
                        $user->setPassword($mdp);
                        $user->setRole($role);
                        $user->setMatricule($matricule);
                        $user->setNom($nom);
                        $user->setPrenom($prenom);
                        
                    // Permet de transporter l'objet User en Session    
                    $_SESSION['user'] = serialize($user);
                    
                    //$_SESSION['vis_matricule']= $id;
                    //$_SESSION['nom']= $nom;
                    //$_SESSION['prenom']= $prenom;
                    header('Location: index.php');
		}
		break;
	}
        
        case 'deconnexion':
            unset($_SESSION['user']);
            include('vues/v_connexion.php');
            break;
        
	default :
            include("vues/v_connexion.php");
            break;
}
?>