<!-- firas le 06/11/2013 -->
<?php
if( !isset($_REQUEST['action']) )
{
    $action = 'liste';
}
else { 
    $action=$_REQUEST['action'];
}   

switch ($action) {
    case "liste":
        include("vues/v_sommaire.php");
        $lesPraticiens = $pdo->getLesPraticiens();
        $leMax = $pdo->getLeMax();
        include("vues/v_lesPraticiens.php");
        include("vues/v_pied.php");
        break;

    case "detail":
        include("vues/v_sommaire.php");
        $lesDetails=$pdo-> getLesDetails($_REQUEST['num']);
        include("vues/v_lesInfos.php");
        include("vues/v_pied.php");
        break;
}
?>