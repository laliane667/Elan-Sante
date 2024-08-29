<?php
    include_once 'header.php';
    require_once 'includes/dbh.be.php';
    require_once 'includes/functions.be.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès - Élan Santé</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/font.css">
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/acces.css">
</head>

<?php
    include_once 'navbar.php';
?>
<div class="switch__container">
        <form action="includes/signup.be.php" method="post" class="adh_container" id="signup_container">
            <div style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 25px;">
                <h1 style="opacity: 0;">< Retour</h1>
                <h1 class="access-back-button">Retour ></h1>
            </div>

            <h1>Inscrivez-vous :</h1>

            <?php
                if(isset($_GET["signupError"])){
                    if($_GET["signupError"] == "emptyInput"){
                        echo "<p style='color: red; background-color: rgba(0,0,0,0.5); width: 100%; text-align: center; margin-top: 10px; padding: 5px 0;'>Veuillez remplir tous les champs.</p>";
                    }

                    if($_GET["signupError"] == "incorrectPasswordConfirmation"){
                        echo "<p style='color: red; background-color: rgba(0,0,0,0.5); width: 100%; text-align: center; margin-top: 10px; padding: 5px 0;'>Confirmation du mot de passe incorrecte.</p>";
                    }

                    if($_GET["signupError"] == "incorrectSecurity"){
                        echo "<p style='color: red; background-color: rgba(0,0,0,0.5); width: 100%; text-align: center; margin-top: 10px; padding: 5px 0;'>Le code de sécurité est incorrect.</p>";
                    }
                }
            ?>
            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container" <?php if($_GET["signupError"] == "incorrectSecurity"){echo "style='border-bottom: solid 1px red; background-color: rgba(255,0,0,0.5);'";}?> >
                            <!-- <label>Code de sécurité</label> -->
                            <input name="security" type="password" placeholder="Code de sécurité">
                        </div>
                    </li>
                </ul>
            </div>
    
            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Prénom</label> -->
                            <input name="firstname" placeholder="Prénom">
                        </div>
                    </li>
                </ul>
            </div>

            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Nom</label> -->
                            <input name="lastname" placeholder="Nom">
                        </div>
                    </li>
                </ul>
            </div>

            
            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Email :</label> -->
                            <input name="email" type="email" placeholder="Email">
                        </div>
                    </li>
                </ul>
            </div>
    
            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Mot de passe :</label> -->
                            <input name="password" type="password" placeholder="Mot de passe">
                        </div>
                    </li>
                </ul>
            </div>

            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container" <?php if($_GET["signupError"] == "incorrectPasswordConfirmation"){echo "style='border-bottom: solid 1px red; background-color: rgba(255,0,0,0.5);'";}?> >
                            <!-- <label>Mot de passe :</label> -->
                            <input name="passwordRepeat" type="password" placeholder="Confirmer mot de passe">
                        </div>
                    </li>
                </ul>
            </div>

            
            <button name="submit-sg" class="access-button">Valider</button>

            
        </form>

        <div class="adh_container" id="menu_container">

            <h1>Bienvenue sur la page administrateur.</h1>
    
            <div class="adh_item">
                <button class="access-button" name="login">J'ai déjà un compte.</button>
            </div>
            <h1>OU</h1>
    
            <div class="adh_item">
                <button class="access-button" name="signup">Je me crée un compte.</button>
            </div>
        </div> 

        <form action="includes/login.be.php" method="post" class="adh_container" id="login_container">

            <div style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 25px;">
                <h1 class="access-back-button">< Retour</h1>
                <h1 style="opacity: 0;">Retour ></h1>
            </div>
    
            <h1>Connectez-vous :</h1>

            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Email :</label> -->
                            <input name="email" placeholder="Email">
                        </div>
                    </li>
                </ul>
            </div>
    
            <div class="adh_item">
                <ul class="adh_link">
                    <li>
                        <div class="access-input-container">
                            <!-- <label>Mot de passe :</label> -->
                            <input name="password" type="password" placeholder="Mot de passe">
                        </div>
                    </li>
                </ul>
            </div>
            <button name="submit-lg" class="access-button">Valider</button>

            
        </form>


    </div>
    <script>
        $(document).ready(function() {
    function showLoginMenu() {
        $('#menu_container').animate({
            left: '-50%',
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#login_container').show().animate({
            opacity: '1'
        }, 0);
    }

    function showSignupMenu() {
        $('#menu_container').animate({
            right: '50%',
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#signup_container').show().animate({
            opacity: '1'
        }, 0);
    }

    function showMainMenuFromLogin() {
        $('#login_container').animate({
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#menu_container').show().css('left', '0').animate({
            left: '0%',
            opacity: '1'
        }, 0);
    }

    function showMainMenuFromSignup() {
        $('#signup_container').animate({
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#menu_container').show().css('right', '0').animate({
            right: '0%',
            opacity: '1'
        }, 0);
    }

    $('.access-button[name="login"]').on('click', showLoginMenu);
    $('.access-button[name="signup"]').on('click', showSignupMenu);
    $('#login_container .access-back-button').on('click', showMainMenuFromLogin);
    $('#signup_container .access-back-button').on('click', showMainMenuFromSignup);

    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('signupError')) {
        $('#menu_container').animate({
            right: '50%',
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#signup_container').show().animate({
            opacity: '1'
        }, 0);
    }

    if (urlParams.has('loginError')) {
        $('#menu_container').animate({
            left: '-50%',
            opacity: '0'
        }, 0, function() {
            $(this).hide();
        });

        $('#login_container').show().animate({
            opacity: '1'
        }, 0);
    }
});

document.querySelector('#firstnameInput').addEventListener('input', function(e) {
    const valueArray = e.target.value.split(' ');
    e.target.value = valueArray.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
});

document.querySelector('#lastnameInput').addEventListener('input', function(e) {
    const valueArray = e.target.value.split(' ');
    e.target.value = valueArray.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
});

    </script>

<?php
    include_once 'footer.php';
?>
