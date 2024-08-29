<?php
    include_once 'header.php';
    if(!isset($_SESSION["memberId"]) || $_SESSION["memberStatus"] != 1){
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
    <title>Membres - Élan Santé</title>
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
</head>

<?php
    include_once 'navbar.php';
?>

    <div class="adm_container">

        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            <?php   
                require_once 'includes/publication-functions.be.php';
                displayMemberList($conn);
            ?>
        </table>
    
    </div>

<?php
    include_once 'footer.php';
?>