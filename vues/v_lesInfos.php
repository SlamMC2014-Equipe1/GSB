<!-- firas le 06/11/2013 -->


<div id="contenu">
    <h2>Informations complémentaires</h2>
        <TABLE border="1" align="center"> 
            
            
            
 <?php 
foreach ($lesDetails as $unDetail){
            $num= $unDetail["PRA_NUM"];
            $nomPraticien= $unDetail["PRA_NOM"];
            $prenomPraticien= $unDetail["PRA_PRENOM"];
            $adressePraticien= $unDetail["PRA_ADRESSE"];
            $cpPraticien= $unDetail["PRA_CP"];
            $villePraticien= $unDetail["PRA_VILLE"];
            $notorietePraticien= $unDetail["PRA_COEFNOTORIETE"];
            $typePraticien= $unDetail["TYP_LIBELLE"];
            $lieuPraticien= $unDetail["TYP_LIEU"];
            $libelleSpecialitePraticien= $unDetail["SPE_LIBELLE"];
            $diplomePraticien= $unDetail["POS_DIPLOME"]; 
            $coefPrescription= $unDetail["POS_COEFPRESCRIPTION"];
            
?>
            <tr><th>Nom</th><td><?php echo $nomPraticien ?></td>
            <tr><th>Prénom</th><td><?php echo $prenomPraticien ?></td>
            <tr><th>Adresse</th><td><?php echo $adressePraticien ."<br>". $cpPraticien ."<br> ". $villePraticien ?></td>    
            <tr><th>Coefficient de notoriété</th><td><?php echo $notorietePraticien?></td>
            <tr><th>Type</th><td><?php echo $typePraticien ?></td>
            <tr><th>Lieu</th><td><?php echo $lieuPraticien ?></td>
            <tr><th>Spécialité</th><td><?php echo $libelleSpecialitePraticien ?></td>
            <tr><th>Diplôme</th><td><?php echo $diplomePraticien ?></td>  
            <tr><th>Prescription</th><td><?php echo $coefPrescription ?></td>
                
<?php
}
?>
     
        </table>
    <br><center><img src="images/fleche.png" width="50" onclick="self.location.href='index.php?uc=praticien&action=liste'"></center>
</div>    
 