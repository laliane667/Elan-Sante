<?php
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adhesion en ligne - Élan Santé</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/font.css">
    <link rel="stylesheet" href="style/style1.css">

    <link rel="stylesheet" href="style/adhesion.css">

    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            overflow-x: hidden;
        }
        .pdf_container{
            width: 75%;
            padding-top: 25px;
            margin: 0 12.5%;
            display: flex;
            flex-direction: column;
            background-color: #0000002c;
        }
        .pdf_container object{
            margin: 25px 5%;
        }
        .adh_container {
            width: 75%;
            margin: auto 12.5%;
            padding: 75px 10%;
            height: fit-content;
            display: flex;
            flex-direction: column;
            background-color: #0000002c;
        }

        .adh_container h1 {
            color: #fff;
            margin-top: 50px;
            font-size: 1.6rem;
            font-weight: 100;
            font-family: 'Roboto', sans-serif;
            text-align: left;
        }

        .adh_container h2 {
            color: #fff;
            font-size: 1.4rem;
            font-weight: 100;
            margin-bottom: 10px;
            font-family: 'Roboto', sans-serif;
            text-align: left;
        }

        .adh_item {
            margin: 15px 0;
            width: 100%;
            padding: 5px;
            height: fit-content;
            background-color: #353535;
            border-radius: 15px;
            /* display: flex;
            flex-direction: row;
            justify-content: left; */
            box-shadow: 15px 15px 40px rgba(0, 0, 0, .4);
            /* transition: all 0.5s ease; */
            /* align-items: center; */
        }

        .adh_link {
            margin: 0 auto;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items:flex-end;
        }

        .adh_link li {
            cursor: pointer;
            transition: all 0.5s ease;
            height: 100%;
            padding: 5px 0;
            width: 90%;
            display: flex;
            align-items: left;
        }

        .adh_link li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.2rem;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: solid;
            border-width: 1px;
            line-height: normal;
            border-color: #ffffff00;
            text-align: left;
            transition: all 0.5s ease-out;
        }

        .adh_link li:hover a{
            border-color: #ffffff;
        }

        .adh_link li:hover {
            text-align: left;
            padding-left: 5px;
        }

        .adh_link li:hover:before {
            content: ">";
            filter: invert(1);
            position: relative;
            left: 0;
            margin-right: 10px;
            font-size: 1.4rem;
            font-weight: normal;
        }

        @media screen and (max-width: 1060px) {
            .pdf_container{
                width: 100%;
                height: 0;
                margin: 0;
                opacity: 0;
                overflow: hidden;
                display: none;
            }
            .pdf_container object{
                margin: 25px 5%;
            }
            .adh_container {
                width: 100%;
                height: 92.5vh;
                margin: 0;
                padding: 50px 5%;
            }

            .adh_container h1 {
                margin-top: 25px;
                font-size: 1.2rem;
            }
            
            .adh_link li:hover:before {
                left: 10%;
            }

            .adh_link li:hover {
                padding-left: 10px;
            }
        }
    </style>
</head>
<?php
    include_once 'navbar.php';
?>


    <div class="adh_container">
        <h2>Pour adhérer et vous inscrire, merci de compléter les formulaires en ligne avec paiement sécurisé via notre partenaire Crédit Mutuel.</h2><br>
        <h2>L’adhésion à l’association est nécessaire pour participer aux activités.</h2>
        <h1>- Adhésion anuelle.</h1>
        <div class="adh_item">
            <ul class="adh_link">
                <li><p><a target="_blank" href="https://www.payasso.fr/association-elan-sante/adhesion-annuelle">Cliquer ici </a></p></li>
            </ul>
        </div>

        <h1>- Inscription(s) annuelle(s) à l’<span style="border-bottom: solid 1px #fff;">Activité Physique Adaptée</span>, aux <span style="border-bottom: solid 1px #fff;">Étirements Bien-Être</span> et à la 
        <span style="border-bottom: solid 1px #fff;">Sophrologie.</span></h1>
        <div class="adh_item">
            <ul class="adh_link">
                <li><p><a target="_blank" href="https://www.payasso.fr/elansante95/activites">Cliquer ici </a></p></li>
            </ul>
        </div>

        <h1>- Inscription aux ateliers ponctuels et/ou à la newsletter Alimentation Santé.</h1>
        <div class="adh_item">
            <ul class="adh_link">
                <li><p><a target="_blank" href="https://www.payasso.fr/elansante95-atelier/reglement">Cliquer ici </a></p></li>
            </ul>
        </div>

        <h1>- Inscription à la marche Bungypump.</h1>
        <div class="adh_item">
            <ul class="adh_link">
                <li><p><a target="_blank" href="https://www.payasso.fr/elansante95-bungypump/reglement">Cliquer ici </a></p></li>
            </ul>
        </div>
        <h1>- Inscription aux séances de Fitball.</h1>
        <div class="adh_item">
            <ul class="adh_link">
                <li><p><a target="_blank" href="https://www.payasso.fr/elan-sante/seances-de-fitball">Cliquer ici </a></p></li>
            </ul>
        </div>
       
        <h2 style="margin-top: 25px; padding: 10px; border-radius: 10px; border: 1px solid red;" >Pour toute demande concernant nos activités, ou pour faire une séance d’essai, vous pouvez nous contacter par mail à : <span style="font-weight: 400;">elansante95@gmail.com</span></h2>

        
    </div>
    
<?php
include_once 'footer.php';
?>