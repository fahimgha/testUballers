<?php
    session_start();

    include('../modele/connexionDB.php');

        if (isset($_SESSION['id'])){
        header('Location: ../index.php');
        exit;
    }
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
        // On se place sur le bon formulaire grâce au "name" de la balise button
        if (isset($_POST['register'])){
            $firstname  = htmlentities(trim($firstname));
            $secondname  = htmlentities(trim($secondname));
            $email = htmlentities(strtolower(trim($email)));
            $password  = htmlentities(trim($password));
            

                // On vérifit que le mail est disponible
                $req_email = $DB->query("SELECT email FROM utilisateur WHERE email = ?",
                    array($email));

                $req_email = $req_email->fetch();

                if ($req_email['email'] <> ""){
                    $valid = false; 
                    $er_email = "Ce email existe déjà"; // Ne s'affiche pas !
                    echo "<script>alert(\"le mail est déjà utilisé. La création de ce compte ne peut pas ce faire (retourner en arrière)\")</script>";
                }
            

            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){
                
                $DB->insert("INSERT INTO utilisateur(prenom,nom,email,mdp) VALUES 
                    (?, ?, ?, ?)", 
                    array( $firstname , $secondname ,$email, $password));
                    
                header('Location: ../index.php');
                exit;
            }
        }
    }
    require("../register.php");
?>