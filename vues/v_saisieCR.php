<div class="title-bar title-bar-orange">
    <h1>Comptes Rendus</h1>
</div>
<div id="content">
    <h1>Rapport de visite</h1>
    <form method="POST" action="index.php?uc=gererCR&action=insertCR" name="formSaisieCR">
        <div class="form">
            <!-- ###################
            ---- Partie Informations
            ---- ################### ---> 
            <span class="table-title-cadre">Informations</span>
            
            <table class="form-table table">
                <tbody>
                    <tr class="table-line table-line-grey">
                        <td class="form-table form-table-label"><label for="dateVisite">Date visite</label></td>
                        <td><input type="date" name="dateVisite" size="35" placeholder="AAAA-MM-JJ"/></td>
                    </tr>
                    <tr class="table-line">
                        <td class="form-table form-table-label"><label for="praticien">Praticien</label></td>
                        <td>
                            <select name="praticien">
                                <option value="0">Choisir</option>
                                <?php
                                foreach($lesPraticiens as $unPraticien) {
                                    echo '<option value='.$unPraticien['PRA_NUM'].'>'.$unPraticien['PRA_NOM'].' '.$unPraticien['PRA_PRENOM'].' &emsp;&emsp;'.$unPraticien['PRA_COEFNOTORIETE'].'</option>';   
                                }
                                ?> 
                            </select>
                        </td>
                    </tr>
                    <tr class="table-line table-line-grey">
                        <td class="form-table form-table-label"><label for="remplacant">Remplaçant</label></td>
                        <td><input type="checkbox" name="remplacant" value="oui"/></td>
                    </tr>
                    <tr class="table-line table-line">
                        <td class="form-table form-table-label"><label for="motif">Motif</label></td>
                        <td>
                            <select name="motif">
                                <option value="Activité annuelle">Activité annuelle</option>
                                <option value="Baisse activité">Baisse d'activité</option>
                                <option value="Rapport annuel">Rapport annuel</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="table-line table-line-grey">
                        <td class="form-table form-table-label"><label for="bilan">Bilan</label></td>
                        <td><textarea cols="50" rows="5" name="bilan"></textarea></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- ##################
            ---- Elements présentés
            ---- ################## --->
            
            <span class="table-title-cadre">Elements présentés</span>
            
            <table class="form-table table">
                <tbody>
                    <tr class="table-line table-line-grey">
                        <td class="form-table form-table-label"><label for="produit1">Produit 1</label></td>
                        <td>
                            <select name="produit1">
                                <option value="0">Produit</option>
                                <?php
                                foreach($lesMedicaments as $unMedicament) {
                                    echo '<option value='.$unMedicament['MED_DEPOTLEGAL'].'>'.$unMedicament['MED_NOMCOMMERCIAL'].'</option>';   
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="echantProduit1" id="echantProduit1" value="0" size="2"/>
                            <input class="btn btn-2 btn-2a" type="button" name="ajoutEchant1" id="ajoutEchant1" value="+"/>
                            <input class="btn btn-2 btn-2a" type="button" name="enlevEchant1" id="enlevEchant1" value="-"/>
                        </td>
                    </tr>
                    <tr class="form-table table-line">
                        <td class="form-table form-table-label"><label for="produit1">Produit 2</label></td>
                        <td class="form-cell-25">
                            <select name="produit2">
                                <option value="0">Produit</option>
                                <?php
                                foreach($lesMedicaments as $unMedicament) {
                                    echo '<option value='.$unMedicament['MED_DEPOTLEGAL'].'>'.$unMedicament['MED_NOMCOMMERCIAL'].'</option>';   
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="echantProduit2" id="echantProduit2" value="0" size="2"/>
                            <input class="btn btn-2 btn-2a" type="button" name="ajoutEchant2" id="ajoutEchant2" value="+"/>
                            <input class="btn btn-2 btn-2a" type="button" name="enlevEchant2" id="enlevEchant2" value="-"/>
                        </td>
                    </tr>
                    <tr class="form-table table-line-grey">
                        <td class="form-table form-table-label"><label for="doc">Documentation offerte</label></td>
                        <td colspan="2"><input type="checkbox" name="doc" value="oui"/></td>
                        
                    </tr>
                </tbody>
            </table>
            
            <center><input class="btn btn-2 btn-2a" type="submit" value="Envoyer" /></center>
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
