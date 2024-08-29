<?php

if(isset($_POST["submit-sg"])){

    $security = $_POST["security"];    
    $firstname = $_POST["firstname"];    
    $lastname = $_POST["lastname"];    
    $email = $_POST["email"];    
    $pwd = $_POST["password"];    
    $pwdRepeat = $_POST["passwordRepeat"];    
    
    require_once 'functions.be.php'; 
    require_once 'dbh.be.php'; 

    if(emptyInputSignup($security, $firstname, $lastname, $email, $pwd, $pwdRepeat) !== false){
        header("location: ../acces.php?signupError=emptyInput");
        exit();
    }
    
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../acces.php?signupError=incorrectPasswordConfirmation");
        exit();
    }

    if(isSecurityInvalid($conn, $security) !== false){
        header("location: ../acces.php?signupError=incorrectSecurity");
        exit();
    } 
         
    createUser($conn, $firstname, $lastname, $email, $pwd);   

}
else{
    header("location: ../acces.php");
    exit();
}
