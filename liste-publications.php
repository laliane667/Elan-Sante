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
    <title>Liste - Élan Santé</title>
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
    echo '<input type="hidden" id="memberId" value='.$_SESSION["memberId"].'>';
?>

<div class="adm_filter_container">
        <div class="adm_filter">
            <label>Trier par :  </label>
            <select id="sort-date">
                <option value="1">Chronologie décroissante</option>
                <option value="0">Chronologie croissante</option>
            </select>
        </div>
        
        <div class="adm_filter">
            <label>Filtrer le statut :  </label>
            <select id="display-status">
                <option value="1">Brouillon</option>
                <option value="2">Privé</option>
                <option value="3">Non-répertorié</option>
                <option value="4">Publique</option>
                <option value="5" selected>Tout voir</option>
            </select>
        </div>

        <div class="adm_filter">
            <label>Filtrer mon rôle :  </label>
            <select id="display-role">
                <option value="0">Crée(s) par moi</option>
                <option value="1">Modifiée(s) par moi</option>
                <option value="2" selected>Tout voir</option>
            </select>
        </div>
    </div>

    

    <div class="adm_container">

    <?php
        require_once 'includes/publication-functions.be.php';
        displayPublicationList($conn);
    ?>
    
    </div>

    <script>
        /* setInterval(function() {
        applyFilters();
    }, 1000); // 1000 millisecondes = 1 seconde */

    document.addEventListener('DOMContentLoaded', function() {
        let memberId = document.getElementById('memberId').value;
        const publications = document.querySelectorAll('.adm_item');

        document.getElementById('sort-date').addEventListener('change', function() {
            applyFilters();
        });

        document.getElementById('display-status').addEventListener('change', function() {
            applyFilters();
        });

        document.getElementById('display-role').addEventListener('change', function() {
            applyFilters();
        });

        function applyFilters() {
            let selectedDateOrder = document.getElementById('sort-date').value;
            let selectedStatus = document.getElementById('display-status').value;
            let selectedRole = document.getElementById('display-role').value;

            publications.forEach(pub => {
                let date = pub.getAttribute('data-date');
                let status = pub.getAttribute('data-status');
                let author = pub.getAttribute('data-author');

                // Filtres de visibilité
                let showByStatus = (selectedStatus == 5 || status == selectedStatus);
                let showByRole = (selectedRole == 2 || author == memberId);

                if (showByStatus && showByRole) {
                    pub.style.display = '';
                } else {
                    pub.style.display = 'none';
                }
            });

            // Trier les publications si nécessaire
            let pubsArray = Array.from(publications);

            // Trier les publications si nécessaire
            if (selectedDateOrder == 1) {
                // Triez les éléments par date décroissante
                pubsArray.sort((a, b) => new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date')));
            } else {
                // Triez les éléments par date croissante
                pubsArray.sort((a, b) => new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date')));
            }

            // Réinsérer les éléments triés dans le DOM
            const parent = document.querySelector('.adm_container'); // Remplacez .parent-div par le sélecteur du parent des publications
            parent.innerHTML = '';
            pubsArray.forEach(pub => {
                parent.appendChild(pub);
            });

        }

        applyFilters();
        // Application initiale des filtres
    });

    function supprimerElement(idElement) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
            fetch('includes/remove-publication.be.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + idElement
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la suppression');
                }
                return response.text();
            })
            .then(data => {
                // Suppression réussie, retirer l'élément du DOM
                var elementASupprimer = document.getElementById('publication-' + idElement);
                if (elementASupprimer) {
                    elementASupprimer.remove();
                }
            });
        }
    }

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


<?php
    include_once 'footer.php';
?>