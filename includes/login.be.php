<?php

if(isset($_POST["submit-lg"])){

    $email = $_POST["email"];    
    $pwd = $_POST["password"];    
    
    require_once 'functions.be.php'; 
    require_once 'dbh.be.php'; 

    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../acces.php?loginError=emptyInput");
        exit();
    }
    
    loginUser($conn, $email, $pwd); 
}
else{
    header("location: ../acces.php");
    exit();
}

