<?php
    session_start(); // Permet de savoir s'il y a une session. C'est à dire si un utilisateur c'est connecté à votre site.

    include('modele/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD
    // include('controle/register.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="vue/css/style.css" />
    <title>Test</title>
  </head>
  <body>
    <div class="login-form">
      <form class="form" action="controle/login.php" method="post" class="form-example">
        <div class="input-login">
          <label for="email">Adresse e-mail ou mobile</label><br />

          <input type="text" id="email" name="emailLogin" placeholder="Votre login" value="<?php if(isset($emailLogin)){ echo $emailLogin; }?>" />
          <small>error</small>
        </div>
        <div class="input-login">
          <label for="password">Mot de passe </label><br />

          <input
            type="password"
            name="passwordLogin"
            id="login-password"
            placeholder="Votre mot de passe"
            value="<?php if(isset($passwordLogin)){ echo $passwordLogin; }?>"
          />
          <small>error</small>
          <p style="color: white">Information du compte oubliées ?</p>
        </div>
        <div class="input-submit">
          <button
            id="login-submit"
            class="login-submit"
            onclick="login()"
            type="submit"
            name="login"
          >
            Connexion
          </button>
        </div>
      </form>
    </div>

    <div class="container">
      <h1>Inscription</h1>
      <h2 class="info-title">C'est gratuit (et ça le restera toujours)</h2>

      <!-- <div class="signup-form"> -->
      <form class="signup-form" action="controle/register.php" method="post" >
        <div class="input-form">
          <div class="signup-name">
            <div class="input-name-signup" style="margin-right: 15px">
              <input
                type="text"
                name="firstname"
                id="signup-secondname"
                placeholder="Prénom"
                 value="<?php if(isset($firstname)){ echo $firstname; }?>"
              />
              <small>error</small>
            </div>

            <div class="input-name-signup">
              <input
                type="text"
                name="secondname"
                id="signup-firstname"
                placeholder="Nom de famille"
                 value="<?php if(isset($secondname)){ echo $secondname; }?>"
              />
              <small>error</small>
            </div>
          </div>
            <?php
                if (isset($er_email)){
            ?>
                <div><?= $er_email ?></div>
            <?php   
                }
            ?>
          <div class="input-signup">
            <input
              type="text"
              name="email"
              id="signup-email"
              placeholder="Numéro de mobile ou email"
              value="<?php if(isset($email)){ echo $email; }?>"
            />
            <br />
            <small>error</small>
          </div>
          <div class="input-signup">
            <input
              type="text"
              name="confirmemail"
              id="signup-confirm-email"
              placeholder="Confirmer numéro de mobile ou email"
            />

            <br />
            <small>error</small>
          </div>
          
          <div class="input-signup">

            <input
              type="password"
              name="password"
              id="signup-password"
              placeholder="Nouveau mot de passe"
              value="<?php if(isset($mdp)){ echo $mdp; }?>"
            />
            <br />
            <small>error</small>
          </div>
        </div>
        <div class="date-naissance">
          <h3>Date de naissance</h3>
          <div class="date-input">
            <div>
              <input type="date" name="date" id="date" placeholder="Jour" />
            </div>
            <div>
              <p>Pourquoi indiquer ma date de naissance ?</p>
            </div>
          </div>
        </div>
        <div class="genre-form">
          <div class="genrefemme">
            <input type="radio" id="femme" name="genre" value="FEMME" />
            <label for="femme">Femme</label><br />
          </div>
          <div class="genrehommme"></div>
          <input type="radio" id="homme" name="genre" value="HOMME" />
          <label for="homme">Homme</label><br />
        </div>
        <div class="condition-utilisation">
          En cliquant sur Inscription, vous acceptez nos Conditions et indiquez
          que vous avez lu notre Politique d'utilisation des données, y compris
          notre Utilisation des cookies. Vous pourrez recevoir des notifications
          par texto de la part de Facebook et pouvez vous désabonner à tout
          moment
        </div>
        <div class="form-submit">
          <button
            id="signup-submit"
            onclick="signUp()"
            class="button-inscription"
            type="submit"
            name="register"
          >
            Inscription
          </button>
        </div>
      </form>

      <!-- </div> -->
    </div>
  </body>
  <script src="vue/js/script.js"></script>
</html>
