<?php
    include_once 'header.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Élan Santé</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/font.css">
    <link rel="stylesheet" href="style/style1.css">

    <link rel="stylesheet" href="style/accueil1.css">
    <link rel="stylesheet" href="style/carousel1.css">
    <link rel="stylesheet" href="style/section1.css">

</head>

<?php
    include_once 'loader.php';
    include_once 'navbar.php';

    $sql = "SELECT * FROM Actualite WHERE actuId='1';";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0){
        while($row = mysqli_fetch_assoc($result)){
            $actuH1 = $row['actuH1'];
            $actuH2 = $row['actuH2'];
            $actuH3 = $row['actuH3'];
        }
    }else{
        header("location: ../index.php?error=conn");
        exit();
    }
?>
<div class="animated_title_container">
        <h1 id="animated_title">Élan Santé s'occupe de votre
            <div class="scroller">
                <span>
                    activité physique.<br />
                    alimentation.<br />
                    bien-être.
                </span>
            </div>
        </h1>
    </div>
    <div class="carouselContainer">
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" checked />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <input type="radio" name="position" />
        <main id="carousel">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <main>

    </div>



    <div class="presentation_sentance_container">
        <h3 id="presentation_sentance">Notre objectif :
            promouvoir la santé physique et mentale.</h3>

        <div class="recent_news_container">
                <?php
                    if(isset($_SESSION["memberId"]) && $_SESSION["memberStatus"] == 1 && isset($_GET["edit"])){
                        echo '<div class="switch_container">';
                        echo '<h1>Modifier</h1>';
                        echo '<label class="switch">';
                        echo '<input type="checkbox">';
                        echo '<span class="slider round"></span>';
                        echo '</label>';
                        echo '</div>';
                        echo '<div id="contentOn" style="display: none;">';
                        echo '<form method="post" action="includes/actu-update.be.php">';
                        echo '<input tabindex="text" name="actuH1" style="border: solid 1px #fff; padding: 5px 1%; margin-right: 2%;" placeholder="'.$actuH1.'"';
                        echo 'value="'.$actuH1.'">';
                        echo '<input name="actuH2" style="margin: 5px 0; border: solid 1px #fff; padding: 5px 1%; margin-left: 2%;" tabindex="text" placeholder="'.$actuH2.'"';
                        echo 'value="'.$actuH2.'">';
                        echo '<textarea name="actuH3" style="border: solid 1px #fff;" maxlength="300" oninput="adjustTextareaHeight(this)" cols="40" rows="1" ">'.$actuH3.'</textarea>';
                        echo '<button id="actu-update-submit" name="update-submit" type="submit">Enregistrer</button>';
                        echo '</form>';
                        echo '</div>';
                    }else{
                        echo "<br>";
                    }
                ?>
                
                <div id="contentOff">
                <?php
                     if(isset($_GET['error'])){
                        if($_GET['error'] == "conn"){
                            echo '<h1>&#x25B7; PROCHAIN ATELIER :</h1>';
                            echo '<h4 style="margin: 5px 0;">Vendredi 20 Octobre de 16h à 18H</h4>';
                            echo '<h2>Ma trousse à pharmacie naturelle ou comment transformer les plantes médicinales enremèdes&nbsp;?<br>Un atelier découverte autour des plantes pour apprendre à les utiliser.</h2>';
                        }
                     }else{
                            echo '<h1>&#x25B7; '.$actuH1.'</h1>';
                            echo '<h4 style="margin: 5px 0;">'.$actuH2.'</h4>';
                            echo '<textarea id="monTextarea" style="border: none; background-color: transparent; resize: none; outline: none;" readonly>'.htmlspecialchars($actuH3).'</textarea>';
                     }
                ?>
                    
                </div>
        </div>
    </div>



    <div class="sectionContainer">

        <div class="section" id="section1">
            <div class="panel">
                <h1>ACTIVITÉ<br>PHYSIQUE</h1>
            </div>
            <div class="circle" id="circle1"></div>
            <img class="sectionImg" src="src/images/mpCatalog1.JPG" alt="image1">
            <img class="sectionRightChevron" src="src/items/chevron-right-solid.svg" alt=">">
            <ul class="section_right_content">
                <li>
                    <a href="activites.php#apa">Activité Physique Adaptée</a>
                </li>
                <li>
                    <a href="activites.php#ebe">Étirements Bien-être</a>
                </li>
                <li>
                    <a href="activites.php#mb">Marche Bungy Pump</a>
                </li>
                <li>
                    <a href="activites.php#fb">Fitball</a>
                </li>
            </ul>
        </div>

        <div class="section" id="section3">
            <div class="panel">
                <h1>BIEN-ÊTRE</h1>
            </div>
            <div class="circle" id="circle3"></div>
            <img class="sectionImg" src="src/images/mpCatalog3.jpeg" alt="image3">
            <img class="sectionRightChevron" src="src/items/chevron-right-solid.svg" alt=">">
            <ul class="section_right_content">
                <li>
                    <a href="activites.php#sr">Sophro-Relaxation</a>
                </li>

                <li>
                    <a href="activites.php#aromachologie">Aromachologie</a>
                </li>
                <!-- <li>
                    <a href="activites.php#pc">Pleine conscience</a>
                </li> -->

                <li>
                    <a href="activites.php#hy">Hypnose</a>
                </li>
                <li>
                    <a href="activites.php#sh">Shiatsu / Do-In</a>
                </li>
                <li>
                    <a href="activites.php#ate">Art-Thérapie</a>
                </li>
            </ul>
        </div>

        <div class="section" id="section2">
            <div class="panel">
                <h1>ALIMENTATION</h1>
            </div>
            <div class="circle" id="circle2"></div>
            <img class="sectionImg" src="src/images/mpCatalog2.jpg" alt="image2">
            <img class="sectionRightChevron" src="src/items/chevron-right-solid.svg" alt=">">
            <ul class="section_right_content">
                <li>
                    <a href="activites.php#as">Alimentation<br> santé</a>
                </li>
                <!-- <li>
                    <a href="activites.php#ra">Relations<br> à l'alimentation</a>
                </li> -->
            </ul>
        </div>
    </div>

    <script>
        function adjustTextareaHeight(textarea) {
    // Récupérer le nombre de lignes saisies
    var lines = textarea.value.split('\n').length;

    // Définir la hauteur minimale de la textarea à 3 lignes
    var minHeight = 0;

    // Définir la hauteur de la textarea en fonction du nombre de lignes saisies
    textarea.style.height = Math.max(minHeight, lines +1) + 'em';
}
        window.addEventListener('DOMContentLoaded', (event) => {
            const textarea = document.getElementById('monTextarea');
            ajusterHauteurTextarea(textarea);
        });

        function ajusterHauteurTextarea(textarea) {
            // Set the textarea's height to 'auto' to get the correct scrollHeight
            textarea.style.height = 'auto';
            // Adjust the height
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        // Ajouter un écouteur d'événement si le contenu du textarea change
        document.getElementById('monTextarea').addEventListener('input', function() {
            ajusterHauteurTextarea(this);
        });
        // Get references to the content containers and the checkbox
        const contentOn = document.getElementById("contentOn");
        const contentOff = document.getElementById("contentOff");
        const switchCheckbox = document.querySelector(".switch_container input[type='checkbox']");

        if(switchCheckbox){
            // Add an event listener for the checkbox's change event
            switchCheckbox.addEventListener("change", function () {
                // If the checkbox is checked, show the ON content and hide the OFF content
                if (switchCheckbox.checked) {
                    contentOn.style.display = "flex";
                    contentOff.style.display = "none";
                } else {
                    // If the checkbox is unchecked, hide the ON content and show the OFF content
                    contentOn.style.display = "none";
                    contentOff.style.display = "flex";
                }
            });
        }
       

        const inputs = document.querySelectorAll('.carouselContainer input[type="radio"]');
        let currentIndex = Array.from(inputs).indexOf(document.querySelector('.carouselContainer input[type="radio"]:checked'));
        let direction = 1;

        function switchRadio() {
            inputs[currentIndex].checked = false;
            currentIndex += direction;

            if (currentIndex + 1 >= inputs.length) {
                direction = -1;
                currentIndex = inputs.length - 2;
            }

            if (currentIndex - 1 < 0) {
                direction = 1;
                currentIndex = 1;
            }
            inputs[currentIndex].checked = true;
        }
        setInterval(switchRadio, 8000);

    </script>
    <script src="app/loader.js"></script>
    <script src="app/section.js"></script>

<?php
    include_once 'footer.php';
?>