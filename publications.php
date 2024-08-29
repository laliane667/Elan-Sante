<?php
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publications - Élan Santé</title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/font.css">
  <link rel="stylesheet" href="style/style1.css">

  <link rel="stylesheet" href="style/publication1.css">
</head>

<?php
    include_once 'navbar.php';
    require_once 'includes/publication-functions.be.php';
?>
  <button id="button-top" onclick="goTop()"><i class="fa-solid fa-arrows-up-to-line"></i></button>
  <button id="button-bottom" onclick="goBottom()"><i class="fa-solid fa-arrows-down-to-line"></i></button>

  <div id="page_container">
    <div class="sidebar_button_container">
      
      <div class="sidebar_button" id="open-sidebar">&#8801;</div>
      <div class="sidebar_button" id="close-sidebar">&#215;</div>
    </div>
    <div id="sidebar">
      <nav>
        <ul>
          <?php
            displayPublicationSidebar($conn);
          ?>
        </ul>
      </nav>
    </div>

    <div id="timeline-container">
      <?php
          displayPublications($conn, -1);
      ?>
    </div>
  </div>

  <script>
  function copierLien(publicationId) {
        // Récupérer le texte du lien
        var lien = document.getElementById('lienACopier-'+publicationId).value;

        // Créer un élément textarea temporaire
        var textarea = document.createElement('textarea');
        textarea.value = lien;
        document.body.appendChild(textarea);

        // Sélectionner le texte
        textarea.select();
        textarea.setSelectionRange(0, 99999); // Pour assurer la compatibilité mobile

        // Copier le texte dans le presse-papier
        document.execCommand('copy');

        // Supprimer l'élément textarea temporaire
        document.body.removeChild(textarea);

        // Afficher un message ou faire une autre action après la copie
        alert("Lien copié : " + lien);
    }

    </script>
  <script src="app/publications.js"></script>
  <?php
    include_once 'footer.php';
?>