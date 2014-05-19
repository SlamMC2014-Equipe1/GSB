<div id="contenu">
    <form method="POST" action="index.php?uc=connexion&action=valideConnexion">
        <div class="corpsForm">
            <h2>Identification utilisateur</h2>
            
            <label for="nom">Login*</label>
            <input id="login" type="text" name="login"  size="30" maxlength="45" /><br/>

            <label for="mdp">Mot de passe*</label>
            <input id="mdp"  type="password"  name="mdp" size="30" maxlength="45" /><br/>

            <center>
                <input type="submit" value="Valider" name="valider" />
                <input type="reset" value="Annuler" name="annuler" />
            </center>
        </div>
    </form>

</div>