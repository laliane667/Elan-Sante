<?php
if(isset($_POST["publication-submit"])){
    
    require_once 'dbh.be.php';
    require_once 'functions.be.php';
    $publicationId = $_POST['publicationId'];
    $title = mysqli_real_escape_string($conn, $_POST['titre']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['sous-titre']);
    $authorId = $_POST['auteur'];
    $date = $_POST['date'];
    $statusId = $_POST['status'];
    $blocIndex = $_POST['blocCounter'];
    $preview = $_POST['preview'];
    $prevURL = $_POST['prevURL'];
    $today = date('Y-m-d');
    session_start();
    $myId = $_SESSION["memberId"];

    $imagePath = '../src/images/article/';
   
    if(empty($publicationId)){
        header("location: ".$prevURL."?error=emptyPublicationId");
        exit();
    }

    if(empty($authorId)){
        header("location:../editeur.php?error=emptyAuthorId");
        exit();
    }

    if(empty($date)){
        header("location:../editeur.php?error=emptyDate");
        exit();
    }

    if(empty($statusId)){
        header("location:../editeur.php?error=status");
        exit();
    }

    if(empty($prevURL)){
        header("location:../editeur.php?error=emptyurl");
        exit();
    }

    ini_set('pcre.backtrack_limit', '10485760'); // Augmenter la limite à 10 Mo
    if (validateImagesInHtml($preview)) {
        
        updatePublication($conn, $publicationId, $title, $subtitle, $authorId, $myId, $date, $today, $statusId, $blocIndex);
        //echo $publicationId.'<br'.$title.'<br'.$subtitle.'<br'.$authorId.'<br'.$myId.'<br'.$date.'<br'.$today.'<br'.$statusId.'<br'.$blocIndex;
        $Paths = processContentAndSaveImages($preview, $imagePath);
        $newPreview = replaceBase64ImageSrc($preview, $Paths);
        if(countSectionsById($conn, $publicationId) > 0){
            clearPublicationSections($conn, $publicationId);
        }
            for($i = 0; $i < $blocIndex; $i++){
                if(!in_array($i, $alreadyAdded)){
                    $formBloc = extractAndDisplayDivContent($newPreview, $i);
                    if(count($formBloc) == 1){
                        createSection($conn, $i, $publicationId, 'full', $formBloc[0]);
                    }else if(count($formBloc) > 1){
                        createSection($conn, $i, $publicationId, 'left', $formBloc[0]);
                        createSection($conn, $i, $publicationId, 'right', $formBloc[1]);
                    }
                }
                
            }
        
        header('location: ' . $prevURL. '&save=success'); 
        exit();
    
    } else {
        header("location:../editeur.php?error=imageSize");
        exit();
    }
}else{
    header("location:../index.php");
    exit();
}
