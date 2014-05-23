<div class="td-div">
<div class="title-bar title-bar-orange">
    <h1>Comptes Rendus</h1>
</div>
<div id="content">
    <div class="table-div table-100">
        <div class="tr-div">
            <div class="td-div table-double">
                <span class="table-title-cadre">Praticien</span>
                
                <table class="table table-100">
                    <tbody>
                        <tr>
                            <td class="form-table-label">Nom</td>
                            <td><?php echo $compteRendu['PRA_NOM']. ' ' . $compteRendu['PRA_PRENOM']; ?></td>
                        </tr>
                        <tr class="table-line-grey">
                            <td>Adresse</td>
                            <td><?php echo $compteRendu['PRA_ADRESSE'] . ' ' . $compteRendu['PRA_CP'] . ' ' . $compteRendu['PRA_VILLE']; ?></td>
                        </tr>
                        <tr>
                            <td>Pratique</td>
                            <td><?php echo $compteRendu['TYP_LIBELLE']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="td-div table-double">
                <span class="table-title-cadre">Visiteur</span>
                
                <table class="table table-100">
                    <tbody>
                        <tr>
                            <td>Nom</td>
                            <td><?php echo $compteRendu['VIS_NOM']. ' ' . $compteRendu['VIS_PRENOM']; ?></td>
                        </tr>
                        <tr class="table-line-grey">
                            <td>Matricule</td>
                            <td><?php echo strtoupper($compteRendu['VIS_MATRICULE']); ?></td>
                        </tr>
                        <tr>
                            <td>Code Region</td>
                            <td><?php echo $compteRendu['REG_CODE']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <span class="table-title-cadre">Rapport no <?php echo $compteRendu['RAP_NUM']; ?></span>
    
    <table class="table table-100">
        <tbody>
            <tr>
                <td class="form-table-label">Date</td>
                <td><?php echo substr($compteRendu['RAP_DATE'], 0, 10); ?></td>
            </tr>
            <tr class="table-line-grey">
                <td>Motif</td>
                <td><?php echo $compteRendu['RAP_MOTIF']; ?></td>
            </tr>
            <tr>
                <td>Bilan</td>
                <td><?php echo $compteRendu['RAP_BILAN']; ?></td>
            </tr>
            <tr>
                <td>Documentation offerte</td>
                <td><?php echo is_null($compteRendu['RAP_DOC']) ? 'Non' : 'Oui'; ?></td>
            </tr>
        </tbody>
    </table>
    
    <?php if (!empty($produitsPresentes)) {?>
    <span class="table-title-cadre">Produits Presentés</span>
    
    <table class="table table-100">
        <thead>
            <th>Depot légal</th>
            <th>Nom</th>
            <th>Echantillon</th>
        </thead>
        <tbody>
            <?php 
            $c = 1;
            $class = '';
            foreach($produitsPresentes as $produit) {
                $class = $c % 2 == 0 ? 'table-line-grey' : 'table-line';
                $c++;
            ?>
            <tr class="<?php echo $class; ?>">
                <td><?php echo $produit['MED_DEPOTLEGAL']; ?></td>
                <td><?php echo $produit['MED_NOMCOMMERCIAL']; ?></td>
                <td><?php echo $produit['OFF_QTE']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</div>
</div>