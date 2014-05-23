<div class="td-div">
<div class="title-bar title-bar-orange">
    <h1>Comptes Rendus</h1>
</div>
<div id="content">
    <span class="table-title-cadre"><?php echo $user->getNom() . ' ' . $user->getPrenom(); ?></span>
    
    <!-- Affiche les comptes rendus si ils existent -->
    <?php if(count($lesComptesRendus) > 0) {?>
    
    <table class="table table-100">
        <thead>
            <th>Numéro</th>
            <th>Date</th>
            <th>Praticien</th>
            <th>Motif</th>
        </thead>
        <tbody>
            <?php 
            $c = 1;
            $class = '';
            foreach($lesComptesRendus as $compteRendu) {
                $class = $c % 2 == 0 ? 'table-line-grey' : 'table-line';
                $c++;
            ?>
            <tr class="<?php echo $class; ?> cursor-pointer" 
                onclick="document.location.href='index.php?uc=gererCR&action=consulterCR&num=<?php echo $compteRendu['RAP_NUM']; ?>'">
                <td><?php echo $compteRendu['RAP_NUM']; ?></td>
                <td><?php echo substr($compteRendu['RAP_DATE'], 0, 10); ?></td>
                <td><?php echo $compteRendu['PRA_NOM'] . ' ' . $compteRendu['PRA_PRENOM']; ?></td>
                <td><?php echo $compteRendu['RAP_MOTIF']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } 
    else { ?>
    <span>Vous n'avez rédigé aucun comptes rendus.</span>
    <?php } ?>
</div>
</div>