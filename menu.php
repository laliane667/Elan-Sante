<?php
    include_once 'header.php';
    if(!isset($_SESSION["memberId"])){
        header("location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Élan Santé</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/font.css">
    <link rel="stylesheet" href="style/admin.css">
</head>

<?php
    /* if(array_key_exists('createPublication', $_POST)) { 
        openPublicationMenu(); 
    } 
    function openPublicationMenu() { 
        header("location: editeur.php?publication=3");
        exit();
    }  */
?>
    <div class="page-container">
        <h1>Mon tableau de bord</h1>
        <div class="section-full">
            <h1><i class="fa-solid fa-chevron-right"></i>&nbsp;Accueil</h1>
            <div class="section-container">
                <a href="index.php" class="section">
                    <i class="fa-solid fa-compass"></i>
                    <h2>Accueil</h2>
                </a>
                <?php 
                if(isset($_SESSION["memberStatus"])){
                    if($_SESSION["memberStatus"] == 1){
                        echo '<a href="index.php?edit" class="section"><i class="fa-regular fa-pen-to-square"></i><h2>Modifier l‘actualité</h2></a>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="section-full">
            <h1><i class="fa-solid fa-chevron-right"></i>&nbsp;Publications</h1>
            <div class="section-container">
                <a href="publications.php" class="section">
                    <i class="fa-solid fa-compass"></i>
                    <h2>Publication</h2>
                </a>
                <a href="includes/create-publication.be.php" class="section">
                    <i class="fa-regular fa-square-plus"></i>
                    <h2>Créer une publication</h2>
                </a>
                <a href="liste-publications.php" class="section">
                    <i class="fa-solid fa-list"></i>
                    <h2>Liste des publications</h2>
                </a>
            </div>
        </div>
    
        <div class="section-full">
            <h1><i class="fa-solid fa-chevron-right"></i>&nbsp;Actions</h1>
            <div class="section-container">
                <a href="includes/logout.be.php" class="section">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <h2>Se déconnecter</h2>
                </a>
                <?php 
                if(isset($_SESSION["memberStatus"])){
                    if($_SESSION["memberStatus"] == 1){
                        echo '<a href="liste-membres.php" class="section"><i class="fa-solid fa-list"></i><h2>Voir les membres</h2></a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </body>

</html>