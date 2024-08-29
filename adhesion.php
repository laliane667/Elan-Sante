<?php
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adhésion - Élan Santé</title>
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
            overflow: hidden;
        }
    </style>
</head>
<?php
    include_once 'navbar.php';
?>
    <div class="adh_container">
        <h1>COMMENT ADHERER ?</h1>

        <div class="adh_item">
            <ul class="adh_link">
                <li>
                    <a href="adhesion-en-ligne.php">Je fais ma démarche en ligne.</a>
                </li>
            </ul>
        </div>
        <h1>OU</h1>

        <div class="adh_item">
            <ul class="adh_link">
                <li>
                    <a href="bulletin.php">Je fais ma démarche sur papier.</a>
                </li>
            </ul>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>