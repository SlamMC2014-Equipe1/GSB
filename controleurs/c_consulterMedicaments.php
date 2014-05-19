<?php
/**
 * Omar 6/11/2013
 */
include("vues/v_sommaire.php");
$lesMedicaments = $pdo->getLesMedicaments();
include("vues/v_consulterMedicaments.php");
?>