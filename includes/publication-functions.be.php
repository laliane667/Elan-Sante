<?php

function displayMemberList($conn){
    $sql = "SELECT * FROM Members;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['memberStatus'] == 1){
                $class = 'admin';
                $blaze = "Admin";
            }else{
                $class = 'not-admin';
                $blaze = "Not Admin";
            }
            echo '<tr><td>'.$row['memberFirstName'].'</td><td>'.$row['memberLastName'].'</td><td>'.$row['memberEmail'].'</td><td class="'.$class.'">'.$blaze.'</td></tr>';
        }
    }
    return 0;
}

function displayPublicationSidebar($conn){
    $sql = "SELECT * FROM Publications WHERE publicationStatusId='4' ORDER BY publicationDate DESC;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<li><a href="#publication-'.$row['publicationId'].'" data-target="publication-'.$row['publicationId'].'">'.$row['publicationTitle'].'<br> '.$row['publicationSubtitle'].'</a></li>';
        }
    }
    return 0;
}
function displayPublications($conn, $publicationId){
    if($publicationId == -1){
        $sql = "SELECT * FROM Publications WHERE publicationStatusId='4' ORDER BY publicationDate DESC;";
    }else {
        $sql = "SELECT * FROM Publications WHERE publicationId='$publicationId' AND (publicationStatusId='3' OR publicationStatusId='4');";
    }
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            displayPublication($conn, $row);
        }
    }
    return 0;
}

//Format ex: Mai 2023
function getFormattedDate($value) {
    // Découper la date en année, mois et jour
    list($year, $month, $day) = explode('-', $value);

    // Tableau des noms de mois
    $monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                   "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    
    // Formater la date
    $formatted = $monthNames[intval($month) - 1] . " " . $year;

    return $formatted;
}
//Format ex: 18 Déc 2023
function convertDateFormat($date) {
    // Créer un objet DateTime à partir de la chaîne de date
    $dateObj = DateTime::createFromFormat('Y-m-d', $date);

    // Vérifier si la date est valide
    if ($dateObj === false) {
        return "Date invalide";
    }

    // Tableau des mois en français
    $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    // Extraire le jour, le mois et l'année
    $jour = $dateObj->format('d');
    $moisIndex = $dateObj->format('m') - 1; // -1 car les tableaux en PHP sont indexés à partir de 0
    $annee = $dateObj->format('Y');

    // Formater la date en français et la retourner
    return $jour . ' ' . substr($mois[$moisIndex], 0, 3) . '. ' . $annee;
}

function displayPublication($conn, $row){
    $publicationId = $row['publicationId'];
    $publicationTitle = $row['publicationTitle'];
    $publicationSubtitle = $row['publicationSubtitle'];
    $publicationAuthorId = $row['publicationAuthorId'];
    $Date = $row['publicationDate'];
    $publicationStatusId = $row['publicationStatusId'];
    $publicationSectionCount = $row['publicationSectionCount'];
    $publicationAuthor = getAuthorNameById($conn, $publicationAuthorId);

    echo '<div class="timeline-item hidden" id="publication-'.$publicationId.'" ><div class="article-header"><div class="article-header-title">';
    echo '<h1 class="article-title"><span>'.$publicationTitle.'</span></h1><h2 class="article-subtitle"><span>'.$publicationSubtitle.'</span></h2></div>';
    if($publicationAuthor){
        echo '<h1 class="article-author">Par : <a id="article-author-publication">'.$publicationAuthor.'</a></h1>';    
    }
    echo '</div><div class="article-content-wrapper"><div class="content-container">';
    if($publicationSectionCount > 0){
        //fetch
        $sql = "SELECT * FROM Sections WHERE sectionPublicationId='$publicationId';";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        $ableToClose = true;
        if($queryResults > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($ableToClose == true){
                    echo '<div class="form-bloc-container content-item">';
                }
                if($row['sectionType'] == 'full'){
                    echo '<div class="ql-snow ql-container" style="border: none;"><div class="ql-editor newspapper">'.$row['sectionContent'].'</div></div>';
                    $ableToClose = true;
                }else if ($row['sectionType'] == 'left'){
                    echo '<div class="ql-snow ql-container left half-width" style="border: none;"><div class="ql-editor newspapper">'.$row['sectionContent'].'</div></div>';
                    $ableToClose = false;
                }else if ($row['sectionType'] == 'right'){
                    echo '<div class="ql-snow ql-container right half-width" style="border: none;"><div class="ql-editor newspapper">'.$row['sectionContent'].'</div></div>';
                    $ableToClose = true;
                }
                if($ableToClose == true){
                    echo '</div>';
                }
            }
        }   
    }
    $lien = 'https://elansante95.fr/publications.php#publication-'.$publicationId;
    echo '<input type="hidden" id="lienACopier-'.$publicationId.'" value='.$lien.'>';
    echo '</div></div><hr><button onclick="copierLien('.$publicationId.')">Copier le Lien</button>';
    echo '<div class="timeline-date" id="article-date-publication">'.getFormattedDate($Date).'</div></div>';     
}

function displayPublicationList($conn){
    session_start();
    $myId = $_SESSION["memberId"];
    $memberStatus = $_SESSION["memberStatus"];
    if($memberStatus == 0){
        $sql = "SELECT * FROM Publications WHERE publicationAuthorId='$myId' OR publicationStatusId='4' OR publicationStatusId='3';";
    }else if($memberStatus == 1){
        $sql = "SELECT * FROM Publications WHERE publicationAuthorId='$myId' OR publicationStatusId='4' OR publicationStatusId='3' OR publicationStatusId='2';";
    }
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            displayPublicationListItem($conn, $row, $myId, $memberStatus);
        }
    }
    return 0;
}
require_once 'functions.be.php';

function displayPublicationListItem($conn, $row, $myId, $myStatus){
    $publicationId = $row['publicationId'];
    $publicationTitle = $row['publicationTitle'];
    $publicationSubtitle = $row['publicationSubtitle'];
    $publicationAuthorId = $row['publicationAuthorId'];
    $publicationUpdaterId = $row['publicationUpdaterId'];
    $publicationDate = $row['publicationDate'];
    $publicationUpdatedDate = $row['publicationUpdatedDate'];
    $publicationStatusId = $row['publicationStatusId'];
    $publicationSectionCount = $row['publicationSectionCount'];
    $color;
    switch($publicationStatusId){
        case 1 : $color = 'red'; break;
        case 2 : $color = 'purple'; break;
        case 3 : $color = 'blue'; break;
        case 4 : $color = 'green'; break;
    }
    echo '<div id="publication-'.$publicationId.'" class="adm_item" data-date="'.$publicationDate.'" data-status="'.$publicationStatusId.'" data-author="'.$publicationAuthorId.'"><div class="adm_data_container">';
    echo '<div style="width: 30px; margin-right: 5px; flex-grow: 1; background-color: '.$color.';"></div>';
    echo '<ul class="adm_header"><li class="adm_data_title">'.$publicationTitle.'</li>';
    echo '<li class="adm_data_subtitle">'.$publicationSubtitle.'</li>';
    echo '<li class="adm_data_status"><span style="font-size:2rem; color:'.$color.';">&#9873;</span>&nbsp;&nbsp;Statut : <strong>'.getStatusFromStatusId($publicationStatusId).'</strong> </li>';
    echo '</ul><ul class="adm_data"><li class="adm_data_info">Auteur : <strong>'.getAuthorNameById($conn, $publicationAuthorId).'</strong></li>';
    echo '<li class="adm_data_info">Date : <strong>'.convertDateFormat($publicationDate).'</strong></li>';
    echo '<li class="adm_data_info">Modifié par : <strong>'.getAuthorNameById($conn, $publicationUpdaterId).'</strong></li>';
    echo '<li class="adm_data_info">Modifié le : <strong>'.convertDateFormat($publicationUpdatedDate).'</strong></li></ul></div><ul class="adm_link">';
    if($publicationAuthorId == $myId || $myStatus == 1){
        echo '<li><a href="editeur.php?publication='.$publicationId.'">Modifier</a></li>';
    }
    if($publicationStatusId >= 3){
        if($publicationStatusId == 3){
            $lien = 'https://elansante95.fr/publication.php?id='.$publicationId;
            //$lien = 'http://localhost:8888/publication.php?id='.$publicationId;
        }else if($publicationStatusId == 4){
            $lien = 'https://elansante95.fr/publications.php#publication-'.$publicationId;
            //$lien = 'http://localhost:8888/publications.php#publication-'.$publicationId;
        }
        echo '<input type="hidden" id="lienACopier-'.$publicationId.'" value='.$lien.'>';
        echo '<li><button onclick="copierLien('.$publicationId.')">Copier le Lien</button></li>';
        echo '<li><a href="'.$lien.'">Voir</a></li>';
    }
    if($publicationAuthorId == $myId || $myStatus == 1){
        echo '<li><button onclick="supprimerElement('.$publicationId.')">Supprimer</button></li>';
    }
    echo '</ul></div>';
    return 0;
}
function getStatusFromStatusId($publicationStatusId){
    $status;
    switch($publicationStatusId){
        case 1 : $status = 'Brouillon'; break;
        case 2 : $status = 'Privé'; break;
        case 3 : $status = 'Non-répertorié'; break;
        case 4 : $status = 'Publique'; break;
    }
    return $status;
}

function getAuthorNameById($conn, $id){
    $sql = "SELECT memberFirstName, memberLastName FROM Members WHERE memberId='$id';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $firstname = $row['memberFirstName'];
            $lastname = $row['memberLastName'];
        }
    }else{
        header("location: ../index.php?list:error=memberName");
        exit();
    }
    return $firstname.' '.$lastname;
}

function displayUserSelection($conn, $publicationAuthorId, $myId){

    if($myId == -1){
        $sql = "SELECT memberId FROM Members;";
    }else{
        $sql = "SELECT memberId FROM Members WHERE memberId='$myId';";
    }
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $selected = '';
            if($row['memberId'] == $publicationAuthorId) $selected = 'selected';
            echo '<option '.$selected.' class="select-auth" value="'.$row['memberId'].'">'.getAuthorNameById($conn, $row['memberId']).'</option>';
        }
    }
    return 0;
}

function checkPublication($conn, $publicationId){
    $sql = "SELECT * FROM Publications WHERE publicationId='$publicationId' AND (publicationStatusId='3' OR publicationStatusId='4');";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }
    return false;
}
?>