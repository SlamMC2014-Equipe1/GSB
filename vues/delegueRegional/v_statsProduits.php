<div id="contenu">
    <h1>Statistiques sur les Produits Présentés</h1>
    <br/>
    
    <h2>Graphe</h2><br/>
    <center><img src="images/graphs/statsProduits.png" alt="Graphique statistique"/></center>
    <br/>
    
    <h2>Données</h2>
    
    <table style="margin: auto">
        <thead>
            <tr>
                <th>Dépot légal</th>
                <th>Nom Com.</th>
                <th>Nombre</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($statsProduits as $unProduit) { ?>
            <tr>
                <td><?php echo $unProduit['MED_DEPOTLEGAL']; ?></td>
                <td><?php echo $unProduit['MED_NOMCOMMERCIAL']; ?></td>
                <td><?php echo $unProduit['NB_MED']; ?></td>
                <td><?php echo round(($unProduit['NB_MED']/$nbProduitsTot)*100); ?> %</td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>
