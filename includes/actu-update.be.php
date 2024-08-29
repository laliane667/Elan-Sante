<?php

require_once 'dbh.be.php';
require_once 'functions.be.php';

if(isset($_POST["update-submit"])){
    
    $actuH1 = $_POST['actuH1'];
    $actuH2 = $_POST['actuH2'];
    $actuH3 = $_POST['actuH3'];

    if(filter_has_var(INPUT_POST,'actuH1')) {
        if(!empty($_POST["actuH1"])){
            updateActuContent($conn, $_POST['actuH1'], "actuH1");
        }
    } 

    if(filter_has_var(INPUT_POST,'actuH2')) {
        if(!empty($_POST["actuH2"])){
            updateActuContent($conn, $_POST['actuH2'], "actuH2");
        }
    }

    if(filter_has_var(INPUT_POST,'actuH3')) {
        if(!empty($_POST["actuH3"])){
            updateActuContent($conn, $_POST['actuH3'], "actuH3");
        }
    }
    
    header("location: ../index.php?edit&result=success");
    exit();
}
else{
    header("location: ../index.php");
    exit();
}
