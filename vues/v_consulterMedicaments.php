<!--Omar le 27.11-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="java/jquery-2.0.2.js"></script>
<script type="text/javascript" src="java/dataTables.js"></script>
<script type="text/javascript" src="java/jquery-ui-1.10.3.custom.min.js"></script>

<div id="contenu">
    <center><h1>Consultation des médicaments</h1></center>
    
    <style>
        .testOverflow {
            display : block;
            white-space: nowrap; 
            height : 50px;
            width: 80px;
            overflow : hidden;
            text-overflow:ellipsis;
        }
    </style>
    
    
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableauMedicaments" width="100%">    
        <thead>
            <tr>
                <th>Dépot légal</th>
                <th>Nom commercial</th>
                <th>Code</th>
                <th>Composition</th>
                <th>Effets</th>
                <th>Contreindications</th>
            </tr>
         </thead>
         <tbody> 
            <tr> 
                <?php   
                    foreach ($lesMedicaments as $unMedicament) {
			$depotLegal = $unMedicament['MED_DEPOTLEGAL'];
			$nomCommercial = $unMedicament['MED_NOMCOMMERCIAL'];
                        $codeFamille= $unMedicament['FAM_CODE'];
                        $composition= $unMedicament['MED_COMPOSITION'];
                        $effets = $unMedicament ['MED_EFFETS'];
                        $contrindication = $unMedicament['MED_CONTREINDIC'];
                        $prixEchantillon = $unMedicament['MED_PRIXECHANTILLON'];
                 ?>
                
                 <td> <?php echo $depotLegal?></td>
                 <td> <?php echo $nomCommercial?></td>
                 <td> <?php echo $codeFamille?></td>
                 <td> <?php echo $composition?></td>
                 <td> <?php echo $effets?></td>
                 <td> <?php echo $contrindication?></td>
                
            </tr>
                <?php
                     }
                 ?>
            <tfoot> 
                 <tr>
                <th>Dépot légal</th>
                <th>Nom commercial</th>
                <th>Code</th>
                <th>Composition</th>
                <th>Effets</th>
                <th>Contreindications</th>
            </tr>
         </tfoot>
    </table>
</div> 

<script type="text/javascript">
    $(document).ready(function() {
        $('#tableauMedicaments').dataTable({
            "bJQueryUI": true,
            "iDisplayLength": 5,
            "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "Tout"]],
            "oLanguage" : {
                "sProcessing": "Chargement...",
                "sLengthMenu": "Afficher _MENU_ enregistrements",
                "sZeroRecords": "No matching records found",
                "sInfo": "Enregistrements _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Page 0 de 0 sur 0 entries",
                "sInfoFiltered": "(filtrer sur _MAX_ total enregistrements)",
                "sInfoPostFix": "",
                "sSearch": "Recherche:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sPrevious": "Precedent",
                    "sNext":     "Suivant",
                    "sLast":     "Dernier"
                }
            }
        });
    });
</script>

<?php
    function raccourcir($chaine, $tailleMax)
  {
    // Variable locale
    $positionDernierEspace = 0;
    if( strlen($chaine) >= $tailleMax )
    {
      $chaine = substr($chaine,0,$tailleMax);
      $positionDernierEspace = strrpos($chaine,' ');
      $chaine = substr($chaine,0,$positionDernierEspace).'...';
    }
    return $chaine;
  }
?>