<div class ="erreur">
    <h1>Erreur</h1>
    <ul>
        <?php 
        foreach($_REQUEST['erreurs'] as $erreur) {
            echo "<li>$erreur</li>";
        }
        ?>
    </ul>
</div>
