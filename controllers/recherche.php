<?php
require_once('../models/connexion.php');

if (isset($_POST['ok'])) {
    if (!empty($_POST['option'])) {
        $option = htmlspecialchars($_POST['option']);

        $candidats = rechercheCandidats($option);
        /*$stmt = rechercheCandidats($option);*/
        
        //compter le numbre candidats par filere
        $total_cadits = countCandidats($option);
       
    } else {
        $_SESSION['error'] = 'Indiquez l\'option svp';
    } 
}

//les filieres
$filieres = getFilieres();