<?php
session_start();

    include('../modele/connexionDB.php'); 

    // S'il n'y a pas de session alors on ne va pas sur cette page
    if (!isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }

    // On récupére les informations de l'utilisateur connecté
    $afficher_profil = $DB->query("SELECT * FROM utilisateur WHERE id = ?",
        array($_SESSION['id']));

    $afficher_profil = $afficher_profil->fetch();

    require ("../vue/profil.tpl");

?>