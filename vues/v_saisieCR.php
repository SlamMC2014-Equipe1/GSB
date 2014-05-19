<div id="contenu">
    <h1>Rapport de visite</h1>
    <form method="POST" action="index.php?uc=gererCR&action=insertCR" name="formSaisieCR">
        <div class="corpsForm">
            <!--
            ---- Partie Informations
            --->
            <h2>Informations</h2>
            
            <label for="dateVisite">Date visite : </label><input type="date" name="dateVisite" size="15"/><br/>

            <label for="praticien">Praticien : </label>
            <select name="praticien">
                <option value="0">Choisir</option>
                <?php
                foreach($lesPraticiens as $unPraticien) {
                    echo '<option value='.$unPraticien['PRA_NUM'].'>'.$unPraticien['PRA_NOM'].' '.$unPraticien['PRA_PRENOM'].' &emsp;&emsp;'.$unPraticien['PRA_COEFNOTORIETE'].'</option>';   
                }
                ?> 
            </select><br/>
            <label for="remplacant">Remplaçant : </label><input type="checkbox" name="remplacant" value="oui"/><br/><br/>

            <label for="motif">Motif : </label>
            <select name="motif">
                <option value="Activité annuelle">Activité annuelle</option>
                <option value="Baisse activité">Baisse d'activité</option>
                <option value="Rapport annuel">Rapport annuel</option>
            </select><br/>

            <label for="bilan">Bilan : </label><textarea cols="50" rows="5" name="bilan"></textarea><br/><br/>
            
            <!--
            ---- Partie Eléments présentés
            --->
            <h2>Eléments présentés</h2>
            
            <label for="produit1">Produit 1 : </label>
            <select name="produit1">
                <option value="0">Produit</option>
                <?php
                foreach($lesMedicaments as $unMedicament) {
                    echo '<option value='.$unMedicament['MED_DEPOTLEGAL'].'>'.$unMedicament['MED_NOMCOMMERCIAL'].'</option>';   
                }
                ?>
            </select>
            <input type="text" name="echantProduit1" id="echantProduit1" value="0" size="2"/>
            <input type="button" name="ajoutEchant1" id="ajoutEchant1" value="+"/>
            <input type="button" name="enlevEchant1" id="enlevEchant1" value="-"/><br/>
            
            <label for="produit2">Produit 2 : </label>
            <select name="produit2">
                <option value="0">Produit</option>
                <?php
                foreach($lesMedicaments as $unMedicament) {
                    echo '<option value='.$unMedicament['MED_DEPOTLEGAL'].'>'.$unMedicament['MED_NOMCOMMERCIAL'].'</option>';   
                }
                ?>
            </select>
            <input type="text" name="echantProduit2" id="echantProduit2" value="0" size="2"/>
            <input type="button" name="ajoutEchant2" id="ajoutEchant2" value="+"/>
            <input type="button" name="enlevEchant2" id="enlevEchant2" value="-"/><br/>
            
            <label for="doc">Documentation offerte : </label><input type="checkbox" name="doc" value="oui"/><br/><br/>
            
            <center><input type="submit" value="Envoyer" /></center>
            <script src="js/jquery.js"></script>
            <script>
                $(function() {
                    // Gestion des boutons + et - pour les échantillons
                    $("#ajoutEchant1").click(function() {
                        var valChamp = $("#echantProduit1").val();
                    
                        if (valChamp == "") {
                            valChamp = 0;
                        } else {
                            valChamp = parseInt(valChamp);
                        }
                        $("#echantProduit1").val(valChamp+1);
                    });
                    
                    $("#enlevEchant1").click(function() {
                        var valChamp = $("#echantProduit1").val();
                    
                        if (valChamp == "") {
                            valChamp = 0;
                        } else {
                            valChamp = parseInt(valChamp);
                        }
                        $("#echantProduit1").val(valChamp-1);
                    });
                    
                    $("#ajoutEchant2").click(function() {
                        var valChamp = $("#echantProduit2").val();
                    
                        if (valChamp == "") {
                            valChamp = 0;
                        } else {
                            valChamp = parseInt(valChamp);
                        }
                        $("#echantProduit2").val(valChamp+1);
                    });
                    
                    $("#enlevEchant2").click(function() {
                        var valChamp = $("#echantProduit2").val();
                    
                        if (valChamp == "") {
                            valChamp = 0;
                        } else {
                            valChamp = parseInt(valChamp);
                        }
                        $("#echantProduit2").val(valChamp-1);
                    });
                });
            </script>
        </div>
    </form>
</div>
