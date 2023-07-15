<?php
require_once('../models/connexion.php');

if (isset($_POST['enregistrer'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['option'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $datnais = htmlspecialchars($_POST['datnais']);
        $ville = htmlspecialchars($_POST['ville']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $option = htmlspecialchars($_POST['option']);

        if ($datnais && $ville && $sexe) {
            $stmt = addCandidat($nom, $prenom, $datnais, $ville, $sexe, $option);
            ($stmt) ? $_SESSION['success'] = 'Enregistrment effectué avec succès' : $_SESSION['error'] = 'Erreur d\'enregistrement';
        } else {
            $datnais = null;
            $ville = null;
            $sexe = null;

            $stmt = addCandidat($nom, $prenom, $datnais, $ville, $sexe, $option);
            ($stmt) ? $_SESSION['success'] = 'Enregistrment effectué avec succès' : $_SESSION['error'] = 'Erreur d\'enregistrement';
        }
        
    } else {
        $_SESSION['error'] = 'Nom, prénom et option sont obligatores';
    }
    
    // Fermer l'écriture de la session
    session_write_close();
    header('Location: ../');

}