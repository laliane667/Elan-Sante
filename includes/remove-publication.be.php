<?php
    require_once 'dbh.be.php';
    require_once 'functions.be.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $idElement = $_POST['id'];

        // Préparer la requête SQL pour éviter les injections SQL
        $stmt = $conn->prepare("DELETE FROM Publications WHERE publicationId = ?");
        $stmt->bind_param("i", $idElement);

        // Exécuter la requête
        if ($stmt->execute()) {
            http_response_code(200);
        } else {
            echo "Erreur lors de la suppression : " . $conn->error;
        }
        $stmt->close();
        /* header('location: ../liste-publication.php'); 
        exit(); */
    }else{
        header('location: ../index.php'); 
        exit();
    }
    
