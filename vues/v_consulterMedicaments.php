<div class="td-div">
<div class="title-bar title-bar-orange">
    <h1>Médicaments</h1>
</div>

<div id="content">
    
    <link rel="stylesheet" href="styles/jquery.dataTables.css" type="text/css"/>
    <script type="text/javascript" src="java/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="java/dataTables.js"></script>
    <script type="text/javascript" src="java/jquery-ui-1.10.3.custom.min.js"></script>
    
    <table class="table table-100" id="tableauMedicaments">
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
            <?php   
                $c = 1;
                $class = '';
                foreach ($lesMedicaments as $unMedicament) {
                    $class = $c % 2 == 0 ? 'table-line-grey' : 'table-line';
                    $c++;
                    
                    $depotLegal = $unMedicament['MED_DEPOTLEGAL'];
                    $nomCommercial = $unMedicament['MED_NOMCOMMERCIAL'];
                    $codeFamille= $unMedicament['FAM_CODE'];
                    $composition= $unMedicament['MED_COMPOSITION'];
                    $effets = $unMedicament ['MED_EFFETS'];
                    $contrindication = $unMedicament['MED_CONTREINDIC'];
                    $prixEchantillon = $unMedicament['MED_PRIXECHANTILLON'];
             ?>
            <tr>
                 <td><?php echo $depotLegal?></td>
                 <td><?php echo $nomCommercial?></td>
                 <td><?php echo $codeFamille?></td>
                 <td><?php echo $composition?></td>
                 <td><?php echo $effets?></td>
                 <td><?php echo $contrindication?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
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
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableauMedicaments').dataTable({
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
                    "sSearch": "Recherche :",
                    "sUrl": ""
                }
            });
        });
    </script>
</div>
</div>