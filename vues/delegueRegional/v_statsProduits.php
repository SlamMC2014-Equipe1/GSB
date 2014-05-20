<div class="title-bar title-bar-orange">
    <h1>Statistiques : Produits Présentés</h1>
</div>

<div id="content">
    <div id="graphique" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    
    <!-- Génération du graphe -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/highcharts/highcharts.js"></script>
    <script src="js/highcharts/modules/exporting.js"></script>
    <script type="text/javascript">
    $(function () {
        $('#graphique').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Statistiques des produits présentés'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    <?php 
                    // Variables qui permettent de ne pas mettre la virgule sur la dernière itération
                    $c = 1;
                    $count = count($statsProduits);
                    
                    // Données du graphe, formatté comme suit : ['NomObjet', pourcentage], ...
                    foreach($statsProduits as $unProduit) { 
                        echo '[\'' . $unProduit['MED_NOMCOMMERCIAL'] . '\', ' . round(($unProduit['NB_MED']/$nbProduitsTot)*100). ']';
                        if ($c != $count)
                            echo ',';
                        $c++;
                    } 
                    ?>
                ]
            }]
        });
    });
    </script>
    
    <!-- Affichage des données en brut -->
    <span class="table-title-cadre">Données</span>
    
    <table class="table table-100">
        <thead>
            <tr>
                <th>Dépot légal</th>
                <th>Nom Commercial</th>
                <th>Nombre</th>
                <th>Pourcentage (%)</th>
            </tr>
        </thead>
        <tbody>
    <?php 
        $c = 1;
        $class = '';
        foreach($statsProduits as $unProduit) {
            if ($c % 2 == 0)
                $class = 'table-line-grey';
            else
                $class = 'table-line';
            $c++;
    ?>
            <tr class="<?php echo $class; ?>">
                <td><?php echo $unProduit['MED_DEPOTLEGAL']; ?></td>
                <td><?php echo $unProduit['MED_NOMCOMMERCIAL']; ?></td>
                <td><?php echo $unProduit['NB_MED']; ?></td>
                <td><?php echo round(($unProduit['NB_MED']/$nbProduitsTot)*100); ?> %</td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>
