<?php
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publication - Élan Santé</title>
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

  <div id="page_container">
    <div id="timeline-container">
      <?php
          if(isset($_GET['id'])){
            $publicationId = mysqli_real_escape_string($conn, $_GET['id']);
            if(checkPublication($conn, $publicationId) == true){
              displayPublications($conn, $publicationId);
            }else{
              header("location: index.php");
              exit;
            }
          }else{
            header("location: index.php");
            exit;
          }
      ?>
    </div>
  </div>

  <script src="app/publications.js"></script>
  <?php
    include_once 'footer.php';
?>