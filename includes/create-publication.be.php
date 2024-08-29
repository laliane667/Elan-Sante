<?php
    require_once 'dbh.be.php';
    require_once 'functions.be.php';
    $today = date('Y-m-d');
    session_start();
    if(!isset($_SESSION["memberId"])){
        header("location: ../index.php");
        exit();
    }
    $myId = $_SESSION["memberId"];
    
    $title = '';
    $subtitle = '';
    $publicationId = createPublication($conn, $title, $subtitle, $myId, $myId, $today, $today, 1, 0);
    header('Location: ../editeur.php?publication='.$publicationId); 
    exit;
