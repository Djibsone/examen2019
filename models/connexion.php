<?php
session_start();
//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=examen;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

//Récupérer tous les candidats
function getAllCandidats(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM candidat ORDER BY id DESC');
    $req->execute();
    return $req;
}


//Récupérer un candidat
function getCandidat($nom){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM candidat WHERE nom = ?');
    $req->execute(array($nom));
    return $req;
}

//Ajouter un candidat
function addCandidat($nom, $prenom, $datnais, $ville, $sexe, $option){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO candidat(nom,prenom,datnais,ville,sexe,codefil) VALUES(?,?,?,?,?,?)');

    if($req->execute(array($nom, $prenom, $datnais, $ville, $sexe, $option)))
        return true;
    else
        return false;
}

//rechercher les candidats d'une filière
function rechercheCandidats($option) {
    $db = dbConnect();
    $req = $db->prepare('SELECT *, nom, prenom, sexe FROM candidat WHERE codefil LIKE :option');
    $req->execute(array(':option' => '%' . $option . '%'));
    return $req;
}

// function rechercheCandidats($option){
//     $db = dbConnect();

//     $req = $db->prepare('SELECT nom,prenom,sexe FROM candidat WHERE codefil = LIKE "% ? %"');

//     $req->execute(array($option));
//     return $req;
// }

//Compter le nombre de candidat
function countCandidats($option) {
    $db = dbConnect();
    $stmt = $db->prepare('SELECT COUNT(*) AS total_cadits FROM candidat WHERE codefil = ?');
    $stmt->execute(array($option));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_cadits'];
}

//Supprimer l'nfos user dans la table password_reset
function delUser($token){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM password_reset WHERE token_user = ?');

    if($req->execute(array($token)))
        return true;
    else
        return false;
}

//Modifier un info user
function updateUser($password, $token){
    $db = dbConnect();

    $req = $db->prepare('UPDATE users SET password = ? WHERE token = ?');

    if($req->execute(array($password, $token)))
        return true;
    else
        return false;
}

