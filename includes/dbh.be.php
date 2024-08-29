<?php
  /* $db_host = 'localhost';
  $db_user = 'lasy7212_Elan-Sante';
  $db_password = '4ldPfiwRhPzfmgIHRH';
  $db_db = 'lasy7212_Elan-Sante'; */
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'Elan-Sante';
 
  $conn = mysqli_connect(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

  if ($conn->connect_error) {
    echo 'Errno: '.$conn->connect_errno;
    echo '<br>';
    echo 'Error: '.$conn->connect_error;
    exit();
  }

  $conn->set_charset("utf8mb4");
