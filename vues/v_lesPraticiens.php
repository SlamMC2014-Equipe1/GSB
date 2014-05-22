<div class="td-div">
<div class="title-bar title-bar-orange">
    <h1>Praticiens</h1>
</div>
<div id="content">
    <span class="table-title-cadre">Liste</span>
    <table class="table table-100">
        <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Notoriété</th>
        <th>Type</th>
        <th>Lieu </th>
        <th>Informations</th>
        </tr>

<?php 
$c = 1;
$class = '';
foreach ($lesPraticiens as $unPraticien) {
    $class = $c % 2 == 0 ? 'table-line-grey' : 'table-line';
    $c++;
    
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
        <tr class="<?php echo $class; ?>"> 
            <td><?php echo $nomPraticien ?></td>
            <td><?php echo $prenomPraticien ?></td>	
            <td> 
            <acronym title="<?php echo $coefPraticien ?>">
                <span class="stat_notoriete">
                    <span class="remplissage" style="width: <?php echo (intval($coefPraticien)*180/intval($leMax)).'px'; ?>"></span>
                </span>
            </acronym>
            </td>
            <td><?php echo $libPraticien ?></td>
            <td><?php echo $lieuPraticien ?></td>
            <td>
                <a href="index.php?uc=praticien&num=<?php echo $num ?>&action=detail" title="Informations">
                    <img src="images/information.png" onclic.k="self.location.href='" width="20" height="20"/>
                </a>
            </td>
        </tr>
<?php 
}
?>
    </table>
</div>
</div>	