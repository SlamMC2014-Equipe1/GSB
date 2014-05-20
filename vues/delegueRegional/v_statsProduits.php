<div class="title-bar title-bar-orange">
    <h1>Statistiques : Produits Présentés</h1>
</div>

<div id="content">
    <h2>Graphe</h2><br/>
    <center><img src="images/graphs/statsProduits.png" alt="Graphique statistique"/></center>
    <br/>
    
    <span class="table-title-cadre">Données</span>
    
    <table class="table table-100">
        <thead>
            <tr>
                <th>Dépot légal</th>
                <th>Nom Com.</th>
                <th>Nombre</th>
                <th>%</th>
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
