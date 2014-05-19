<?php
class User {
    protected $login;
    protected $password;
    protected $role;
    
    protected $matricule;
    protected $nom;
    protected $prenom;
    
    public static $RESPONSABLE = 'Responsable';
    public static $DELEGUE = 'Délégué';
    public static $VISITEUR = 'Visteur';
    
    /**
     * Constructeur de la class User, autorise aucun paramètres
     * 
     * @param string $login
     * @param string $password
     * @param string $statut
     */
    function user($login = null, $password = null, $role = null) {
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }
    
    /**
     * Gets - Sets
     */
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function getMatricule() {
        return $this->matricule;
    }

    public function setMatricule($matricule) {
        $this->matricule = $matricule;
    }
}
?>
