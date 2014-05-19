<!-- firas le 06/11/2013 -->
<div id="contenu">
    <h2>Les praticiens</h2>
        <table>
            <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Notoriété</th>
            <th>Type</th>
            <th>Lieu </th>
            <th>Informations</th>
            </tr>

<?php 
foreach ($lesPraticiens as $unPraticien) {
            $num= $unPraticien["PRA_NUM"];
            $nomPraticien= $unPraticien["PRA_NOM"];
            $prenomPraticien= $unPraticien["PRA_PRENOM"];
            $adressePraticien= $unPraticien["PRA_ADRESSE"];
            $cpPraticien= $unPraticien["PRA_CP"];
            $villePraticien= $unPraticien["PRA_VILLE"];
            $coefPraticien= $unPraticien["PRA_COEFNOTORIETE"];
            $libPraticien= $unPraticien["TYP_LIBELLE"];
            $lieuPraticien= $unPraticien["TYP_LIEU"];
?>
            <tr> <td><?php echo $nomPraticien ?></td>
            <td><?php echo $prenomPraticien ?></td>	
            <td> 
            <span class="stat_notoriete">
            <span class="remplissage" style="width : <?php echo (intval($coefPraticien)*180/intval($leMax)).'px'; ?>"><?php echo $coefPraticien ?></span></span>
            </td>
            <td><?php echo $libPraticien ?></td>
            <td><?php echo $lieuPraticien ?></td>
            <td><center><img src="images/information.png" onclic.k="self.location.href='index.php?uc=praticien&num=<?php echo $num ?>&action=detail'"</center></td>
            </tr>
	
<?php 
                                            }
?>
         </table>
</div>
		