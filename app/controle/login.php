<?php
    session_start();

    include('../modele/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD


    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if (isset($_POST['login'])){

            $email = htmlentities(strtolower(trim($emailLogin)));
            $passwordLogin = trim($passwordLogin);

            // On fait une requete pour savoir si le couple mail / mot de passe existe bien car le mail est unique !
            $req = $DB->query("SELECT * 
                FROM utilisateur 
                WHERE email = ? AND mdp = ?",
                array($email, $passwordLogin));
                
            $req = $req->fetch();

            // Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
            if ($req['id'] == ""){
                $valid = false;
                $er_email = "Le mail ou le mot de passe est incorrecte";
                echo "<script>alert(\"Le mail ou le mot de passe est incorrecte(retourner en arrière)\")</script>";
            }
            if ($valid){
                $_SESSION['id'] = $req['id']; // id de l'utilisateur unique pour les requètes futures
                $_SESSION['email'] = $req['email'];
                //  echo "<script>alert(\"Connexion réussite\")</script>";
                header('Location: profil.php');
                exit;
                
            }   
        }
    }
    require ("../login.php");
?>