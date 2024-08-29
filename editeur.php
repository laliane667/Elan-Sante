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
    <title>Editeur - Élan Santé</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style1.css">

    <style>
      html,
      body {
        margin: 0;
        height: 100%;
        overflow-x: hidden;
      }
      .toolBar{
          position:fixed;
          width: 100%;
          top: 0px;
          left: 0;
          background-color: #fff;
          z-index: 10;
      }
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #023e73;
        background-image: none;
      }

      #timeline-container {
        z-index: 0;
        position: relative;
        max-width: 70%;
        margin: 0 auto;
        margin-top: 20px;
        padding: 20px;

      }

      .timeline-item {
        padding: 10px;
        position: relative;
        background-color: #ffffff;
        border-radius: 6px;
        margin-bottom: 50px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
      }

      .menu-controller-container{
      display: flex;
      position: fixed;
      top: 60px;
      left: 10px;
      width: 10%;
      text-align: center;
      flex-direction: column;
    }
      .edit-controller-container{
      display: flex;
      position: fixed;
      top: 60px;
      right: 10px;
      width: 10%;
      text-align: center;
      flex-direction: column;
    }

    .form-control-button{
      cursor: pointer;
      text-decoration: none;
      font-size: 1rem;
      font-weight: 100;
      font-family: Arial, Helvetica, sans-serif;
      padding: 3px 17px;
      color: #fff;
      background-color: rgba(0, 0, 0, 0.433);      border: none;
      border-radius: 5px;
      margin: 5px;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.3);
      transition: all 0.2s ease-out;
    }

    .form-control-button:hover{
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
      background-color: #afaeae;
    }

      /* .timeline-item::before {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 100%;
        height: 50px;
        border-left: 3px solid #a93535;
      } */


      .timeline-item:first-child::before {
        display: none;
      }

      .timeline-item .article-content-wrapper {
        /* padding: 15px; */
        height: fit-content;
        overflow: hidden;
        transition: height 0.8s ease-in-out, opacity 0.8s ease-in-out;
      }



      .timeline-item:first-child .article-content-wrapper {
        height: fit-content;
      }

      .content-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .publication-section-title {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 1.1rem;
        padding: 5px 15px;
      }

      .publication-section-anchor {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.1rem;
        margin: 5px 15px;
        width: fit-content;
        color: #236ce0;
        border-bottom: solid 1px #236ce000;
        transition: all 0.5s ease-out;
        text-decoration: none;
      }

      .publication-section-anchor:hover {
        border-bottom: solid 1px #236ce0;
      }

      .ql-tooltip.ql-editing{
        z-index: 500;
      }
      .ql-editor{
        font-size: 1.1rem;
        line-height: normal;
        font-family: Arial, Helvetica, sans-serif;
      }

      .ql-editor .ql-size-small{
        font-size: 0.8rem;
        line-height: normal;
      }

      .ql-editor .ql-size-large{
        font-size: 1.2rem;
        line-height: normal;
      }

      .ql-editor .ql-size-huge{
        font-size: 1.4rem;
        line-height: normal;
      }


      .newspapper {
        /* text-align: justify; */
        /* font-size: 1.1rem;
        
        font-weight: 100; */
        padding: 5px 15px;
        line-break: auto;
      }

    /*  .newspapper u,
      i {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 100;
      } */

      .image-container {
        width: 100%;
        display: flex;
      }

      /* .uploaded-publication-image { */
      #realtime-publication img,
      #form-content-container img{  
        margin: 0 auto;
        height: 20vh;
        width: auto;
      }

      .content-item {
        margin-top: 15px;
        width: 100%;
        box-sizing: border-box;
      }

      .content-item.half-width {
        width: calc(50%);
        /* display: flex;
        flex-direction: column;
        justify-content: flex-start; */
      }

      .content-image {
        margin: auto;
        width: 80%;
      }

      .content-item[data-y-position="top"] {
        align-self: flex-start;
      }

      .content-item[data-y-position="center"] {
        align-self: center;
      }

      .content-item[data-y-position="bottom"] {
        align-self: flex-end;
      }


      .timeline-date {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #337ab7;
        color: #fff;
        padding: 5px 15px;
        border-radius: 50px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }

      .timeline-content {
        opacity: 0;
        transform: translateY(30px);
      }

      .article-header {
        font-family: 'Roboto', sans-serif;
        width: 100%;
        display: inline-flex;
      }

      .article-header-title {
        text-align: left;
        width: 50%;
        display: flex;
        flex-direction: column;
      }


      .article-title {
        width: 100%;
        margin: 0;
        font-size: 1.5rem;
        color: #3d3d3d;
        overflow: visible;
        display: flex;
      }

      .article-author {
        width: 50%;
        margin: auto 0;
        text-align: center;
      }

      .article-author,
      .article-author a {
        text-decoration: none;
        font-size: 1.2rem;
        color: #3d3d3d;
        overflow: hidden;
      }

      .article-author a:hover {
        text-decoration: underline;
      }

      .article-subtitle {
        display: flex;
        font-weight: 500;
        width: 100%;
        font-size: 1.2rem;
        margin-top: 5px;
        color: #575757;
      }

      .article-content {
        margin: 15px 0;
        line-height: 1.6;
        color: #333;
      }


      .form-bloc-container {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin: 15px 0;
        background-color: #00000000;
      }

      .form-bloc-tool-container {
        width: fit-content;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: start;
        margin: 15px auto;
        background-color: #00000000;
      }

      /* .tool-container {
        margin: 20px auto 0 auto;
        max-width: 80%;
        min-height: fit-content;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
      } */

      .form-span
      /* .tool-container button,
      .tool-container span,
      .tool-container div */ {
        cursor: pointer;
        text-align: center;
        display: flex;
        align-items: center;
        border: none;
        background-color: #3d3d3d;
        padding: 4px 8px;
        margin: 5px;
        border-radius: 5px;
        color: #ffffff;
        width: fit-content;
      }

      /* .tool-container div{
        background-color: #00000000;
        border: solid 1px #3d3d3d;
        color: #000000;
      } */

      .bloc-trash {
        display: flex;
        align-items: center;
        justify-content: space-around;
        border: solid 1px #333;
        width: 28px;
        height: 24px;
        border-radius: 5px;
        margin: auto 10px auto 0;
        font-size: 0.9rem;
        background-color: #00000000;
      }

      /* .tool-container span:hover,
      .tool-container div:hover,
      .tool-container button:hover,
      .bloc-trash:hover {
        background-color: #0000008a;
      } */

      /* .tool-container span:not(:hover),
      .tool-container div:not(:hover),
      .tool-container button:not(:hover),
      .bloc-trash:not(:hover) {
        transition: background-color 0.4s ease-out;
      } */

      .drag-handle {
        color: #000000;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin: auto 0 auto 10px;
        font-size: 1.2rem;
        height: fit-content;
        overflow: visible;
      }

      .full-width-form {
        width: 95%;
        padding: 5px 0;
        /* background-color: #78b3e6; */
        border: solid;
        border-color: #333;
        /* min-height: 20px; */
      }

      .half-width-form {
        width: 47%;
        padding: 5px 0;
        /* background-color: #b0d2f1; */
        border: solid;
        border-color: #333;
      }




      .form-title-input {
        border: none;
        padding: 3px 5px;
        margin: auto 0;
        width: 90%;
        font-size: 1rem;
      }

      .form-image-input-container,
      .form-text-input-container {
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        margin-top: 15px;
      }

      .form-trash-span {
        font-size: 0.6rem;
        width: fit-content;
        height: fit-content;
        border: none;
        border-radius: 5px;
        padding: 2px 5px;
        background-color: #3d3d3d;
        margin: auto 0;
        margin-left: 5px;
        color: #ffffff;
      }

      .form-text-input {
        resize: vertical;
        font-size: 1rem;
        min-height: 30px;
        /* Minimum height */
        max-height: 200px;
        /* Maximum height */
        width: 90%;
        margin: auto 0;
        overflow-y: auto;
        /* Add scroll bar if max-height is exceeded */
      }


      .form-image-input {
        width: 90%;
      }


      .form-title,
      .form-author,
      .form-date,
      .form-status,
      .form-subtitle {
        padding: 15px;
        display: flex;
        flex-direction: column;
      }

      .form-title h4,
      .form-author h4,
      .form-date h4,
      .form-status h4,
      .form-subtitle h4 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 15px;
        margin-left: 5px;
      }

      .form-title input,
      .form-date input,
      .form-author select,
      .form-status select,
      .form-subtitle input {
        border: none;
        /* border-top: solid #c0c0c054 1px; */
        border-bottom: solid #c0c0c054 1px;
        padding: 5px;
        font-size: 1rem;
      }

      .form-title input::placeholder,
      .form-date input,
      .form-status select,
      .form-author select,
      .form-subtitle input::placeholder {
        color: #636363;
        font-size: 1rem;
      }

      .status-definition {
        font-size: 0.9rem;
        margin-top: 10px;
        margin-left: 15px;
        color: #333;
      }

      .form-message-container {
        width: 100%;
        display: flex;
        justify-content: space-around;
      }

      .success-message {
        font-size: 1.2rem;
        color: green;
      }

      .error-message {
        color: red;
      }

      .recup-div{
        opacity: 0;
      }
    </style>
</head>
<body>
<?php
    if(isset($_GET['publication'])){
      $publicationId = mysqli_real_escape_string($conn, $_GET['publication']);
      //TODO: check if publication exists AND is public else header to no $_GET
      $publicationDate = date('Y-m-d');

      $sql = "SELECT * FROM Publications WHERE publicationId='$publicationId';";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);

      if($queryResults > 0){
          while($row = mysqli_fetch_assoc($result)){
              $publicationTitle = $row['publicationTitle'];
              $publicationSubtitle = $row['publicationSubtitle'];
              $publicationAuthorId = $row['publicationAuthorId'];
              $publicationDate = $row['publicationDate'];
              $publicationStatusId = $row['publicationStatusId'];
              $blocIndex = $row['publicationSectionCount'];
          }
      }

      if($blocIndex > 0){
        //fetch
        $sql = "SELECT * FROM Sections WHERE sectionPublicationId='$publicationId';";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if($queryResults > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['sectionType'] == 'full'){
                  echo '<div class="recup-div"><div class="recup-full-content">'.$row['sectionContent'].'</div></div>';
                }else if ($row['sectionType'] == 'left'){
                  echo '<div class="recup-div"><div class="recup-left-content">'.$row['sectionContent'].'</div>';
                }else if ($row['sectionType'] == 'right'){
                  echo '<div class="recup-right-content">'.$row['sectionContent'].'</div></div>';
                }
            }
        }
      }

    }else{
        header('Location : menu.php');
        exit();
      /* $title = "";
      $subtitle = $_POST['sous-titre'];
      $authorId = $_POST['auteur'];
      $date = $_POST['date'];
      $statusId = $_POST['statusId'];
      $publicationResult = $_POST['preview']; */
    }
?>
  <div id="timeline-container">
    <form action="includes/publication.be.php" method="post" enctype="multipart/form-data">
      
      <input name="publicationId" type="hidden" value="<?php echo $publicationId; ?>">
      <input type="hidden" name="prevURL" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <input id="bloc_counter" name="blocCounter" type="hidden" value="0">
      <input  id="preview_ipt" name="preview" type="hidden" value="0">
      <input type="hidden" id="recup-date" value="<?php echo $publicationDate; ?>">
      <input type="hidden" id="recup-status" value="<?php echo $publicationStatusId; ?>">

      <div class="timeline-item">

        <div class="form-title">
          <h4>Titre :</h4>
          <?php
              echo '<input type="text" name="titre" value="'.$publicationTitle.'" placeholder="Écrire ici...">';
          ?>
          
        </div>


        <div class="form-subtitle">
          <h4>Sous-titre :</h4>
          <?php
              echo '<input type="text" name="sous-titre" value="'.$publicationSubtitle.'" placeholder="Écrire ici...">';
          ?>
          
        </div>

        <div class="article-header">
          <div class="article-header-title">
            <div class="form-author">
              <h4>Auteur :</h4>
              <select id="auteur" name="auteur">
                <?php
                    require_once 'includes/publication-functions.be.php';
                    if($_SESSION["memberStatus"] == 1){
                      displayUserSelection($conn, $publicationAuthorId, -1);
                    }else{
                      displayUserSelection($conn, $publicationAuthorId, $_SESSION["memberId"]);
                    }
                ?>
              </select>
            </div>
          </div>

          <div class="article-header-title">
            <div class="form-date">
              <h4 for="date">Date :</h4>
                <input type="date" name="date" id="dateInput">
            </div>
          </div>
        </div>

        <div class="form-status">
          <h4>Status :</h4>
          <select id="input-status" name="status">
            <?php
                if($publicationStatusId == 1){
                    echo '<option selected value="1">Brouillon</option>';
                }else{
                    echo '<option value="1">Brouillon</option>';
                }

                if($publicationStatusId == 2){
                    echo '<option selected value="2">Privé</option>';
                }else{
                    echo '<option value="2">Privé</option>';
                }

                if($publicationStatusId == 3){
                    echo '<option selected value="3">Non-répertorié</option>';
                }else{
                    echo '<option value="3">Non-répertorié</option>';
                }

                if($publicationStatusId == 4){
                    echo '<option selected value="4">Publique</option>';
                }else{
                    echo '<option value="4">Publique</option>';
                }
            ?>
            
            
            
            
          </select>

          <h1 class="status-definition" id="article-status-publication"></h1>
        </div>        
          <div class="form-message-container"> 
            <?php
              if(isset($_GET["save"])){
                if($_GET["save"] == 'success'){
                  echo '<h1 class="success-message">Les modifications ont été enregistrées correctement.</h1>';
                }
              }
            ?>
            <!-- <h1 class="success-message">Les modifications ont été enregistrées correctement.</h1> -->
          <!-- <h1 class="error-message">Une erreur est survenue</h1> -->
          </div>

        <div class="article-content-wrapper" id="form-content-container">
          
          
        </div>
        <div class="menu-controller-container">
          <a class="form-control-button" href="menu.php">Retourner au menu</a>
          <button type="submit" name="publication-submit" class="form-control-button">Enregistrer les modifications</button>
        </div>
        <div class="edit-controller-container">
          <span onclick="javascript: addFullSection()" class="form-control-button">Ajouter un bloc entier</span>
          <span onclick="javascript: addDoubleHalfSection()" class="form-control-button">Ajouter un double bloc</span>
        </div>
      </div> 


      <div class="timeline-item" id="realtime-publication">
        <div class="article-header">
          <div class="article-header-title">
            <h1 class="article-title"></h1>
            <h2 class="article-subtitle"></h2>
          </div>
          <h1 class="article-author">Par : <a id="article-author-publication" href="">Mathieu Kaminski</a></h1>
        </div>
        <div class="article-content-wrapper">
          <div class="content-container">
            
          </div>
        </div>
        <div class="timeline-date" id="article-date-publication"></div>
      </div>
    </form>

  </div>



  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
    var txtCounter = 0;
    var blocCounter = 0;//BigContainer
    var blocCounterInput = document.getElementById('bloc_counter');
    var previewIpt = document.getElementById('preview_ipt');
    var preview = document.querySelector('#realtime-publication');
    // Fonction pour mettre à jour la valeur de l'input
    function updateInputValue() {
        blocCounterInput.value = blocCounter.toString();
        previewIpt.value = preview.querySelector(".content-container").innerHTML;
    }

    // Mettre à jour l'input toutes les secondes
    setInterval(function() {
        updateInputValue();
        //updatePreviewContent();
        //refreshFormIds();
    }, 1000); // 1000 millisecondes = 1 seconde

    const blocType = {
      full : 1,
      left : 2,
      right : 3
    }
    function addFullSection(loadedContent){
      let bloc_counter = blocCounter;
      //$('.article-content-wrapper').append()    
      let fullDivContainer = document.createElement('div');
      fullDivContainer.className = "form-bloc-container";

      let trashButton = document.createElement("span");
      trashButton.className = "bloc-trash";
      trashButton.innerHTML = "&#10060;";

      let buttonContainer = document.createElement('span');
      buttonContainer.className = "drag-handle";

      let topButton = document.createElement('div');
      let bottomButton = document.createElement('div');
      topButton.className = "form-control-button";
      topButton.setAttribute("onclick", "monter(this.parentNode)");
      topButton.innerHTML = '&#x2191;';

      bottomButton.className = "form-control-button";
      bottomButton.setAttribute("onclick", "descendre(this.parentNode)");
      bottomButton.innerHTML = '&#x2193;';

      buttonContainer.append(topButton);
      buttonContainer.append(bottomButton);

      let fullDiv = document.createElement("div");
      fullDiv.className = "full-width full-width-form";
      fullDiv.id = "article-section-" + bloc_counter;
      
      addFullSectionToPublication(bloc_counter);

      fullDivContainer.append(trashButton);
      fullDivContainer.append(fullDiv);
      fullDivContainer.append(buttonContainer);

      $("#form-content-container").append(fullDivContainer);

      createTxtEditor(fullDiv.id, blocType.full, loadedContent)

      trashButton.addEventListener('click', function() {
        fullDivContainer.remove();
        //refreshFormIds();
        refreshPreviewIds();
        removeSimpleSection(bloc_counter);
      });
      
      blocCounter++;
    }

    function addDoubleHalfSection(toLoadLeft, toLoadRight){
      let bloc_counter = blocCounter;
      let fullDivContainer = document.createElement('div');
      fullDivContainer.className = "form-bloc-container";

      let trashButton = document.createElement("span");
      trashButton.className = "bloc-trash";
      trashButton.innerHTML = "&#10060;";

      let buttonContainer = document.createElement('span');
      buttonContainer.className = "drag-handle";
      let topButton = document.createElement('div');
      let bottomButton = document.createElement('div');
      topButton.className = "form-control-button";
      topButton.setAttribute("onclick", "monter(this.parentNode)");
      topButton.innerHTML = '&#x2191;';
      bottomButton.className = "form-control-button";
      bottomButton.setAttribute("onclick", "descendre(this.parentNode)");
      bottomButton.innerHTML = '&#x2193;';

      buttonContainer.append(topButton);
      buttonContainer.append(bottomButton);

      let halfDivLeft = document.createElement("div");
      halfDivLeft.className = "half-width-form left";
      halfDivLeft.id = "article-left-section-" + bloc_counter;

      let halfDivRight = document.createElement("div");
      halfDivRight.className = "half-width-form right";
      halfDivRight.id = "article-right-section-" + bloc_counter;

      addHalfSectionToPublication(bloc_counter);
      fullDivContainer.append(trashButton);
      fullDivContainer.append(halfDivLeft);
      fullDivContainer.append(halfDivRight);
      fullDivContainer.append(buttonContainer);
      $("#form-content-container").append(fullDivContainer);

      createTxtEditor(halfDivLeft.id, blocType.left, toLoadLeft);
      createTxtEditor(halfDivRight.id, blocType.right, toLoadRight);

      trashButton.addEventListener('click', function() {
        fullDivContainer.remove();
        //refreshFormIds();
        refreshPreviewIds();
        removeDoubleSection(bloc_counter);
      });

      blocCounter++;
    }



function addFullSectionToPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let fullDiv =  document.createElement("div");
        fullDiv.className = "content-item ql-snow ql-container";
        fullDiv.style.border = 'none';
        //fullDiv.className = "content-item full-width content-atome";
        let editorDiv =  document.createElement("div");
        editorDiv.className = "ql-editor newspapper";
        editorDiv.setAttribute('name','ql-editor-'+id);
        editorDiv.id = "publication-full-width-section-" + id;
        fullDiv.append(editorDiv);
        publicationSection.querySelector('.content-container').append(fullDiv);
    }
}

function monter(btn) {
  var li = btn.parentNode;
  if (li.previousElementSibling) {
    echangerElements(li, li.previousElementSibling);
    updatePreviewContent();
    //refreshFormIds();
    refreshPreviewIds();
  }
}

function descendre(btn) {
  var li = btn.parentNode;
  if (li.nextElementSibling) {
    echangerElements(li.nextElementSibling, li);
    updatePreviewContent();
    //refreshFormIds();
    refreshPreviewIds();
  }
}

function echangerElements(elem1, elem2) {
  console.log("Echanger");
  // Echanger les ID
/*   var tempId = elem1.id;
  elem1.id = elem2.id;
  elem2.id = tempId; */

  // Echanger les éléments dans la liste
  var parent = elem1.parentNode;
  console.log("Parent :" +parent.className);
  parent.insertBefore(elem1, elem2);

  let index1 = getIndex(elem1);
  let index2 = getIndex(elem2);

  let preview = document.querySelector('#realtime-publication');
  let previewContainer = preview.querySelector('.content-container');
  var child1 = getChildNode(previewContainer, index1); // Obtient le 3ème nœud (index 2)
  var child2 = getChildNode(previewContainer, index2); // Obtient le 3ème nœud (index 2)
  previewContainer.insertBefore(child2, child1);

}
function getChildNode(parent, index) {
    if (!parent || !parent.childNodes || parent.childNodes.length <= index) {
        return null; // Retourne null si le parent n'existe pas ou l'index est hors limites
    }
    return parent.childNodes[index];
}
function getIndex(node) {
    // Vérifier si le nœud et le parent existent
    if (!node || !node.parentNode) {
        return -1; // Retourner -1 si le nœud ou le parent n'existe pas
    }

    // Convertir la collection des enfants en tableau et trouver l'index
    var children = Array.prototype.slice.call(node.parentNode.childNodes);
    return children.indexOf(node);
}
function addHalfSectionToPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        
        let fullDiv =  document.createElement("div");
        fullDiv.className = "form-bloc-container";
        fullDiv.id = "publication-half-full-section-" + id;

        let leftDiv =  document.createElement("div");
        //leftDiv.className = "content-item half-width left";
        leftDiv.className = "content-item half-width left ql-snow ql-container";
        leftDiv.style.border = 'none';
        let editorLeftDiv =  document.createElement("div");
        editorLeftDiv.className = "ql-editor newspapper";
        editorLeftDiv.setAttribute('name','ql-editor-left-'+id);
        
        editorLeftDiv.id = "publication-half-left-section-" + id;

        let rightDiv =  document.createElement("div");
        //rightDiv.className = "content-item half-width right";
        rightDiv.className = "content-item half-width right ql-snow ql-container";
        rightDiv.style.border = 'none';
        let editorRightDiv =  document.createElement("div");
        editorRightDiv.className = "ql-editor newspapper";
        editorRightDiv.setAttribute('name','ql-editor-right-'+id);
        editorRightDiv.id = "publication-half-right-section-" + id;

        leftDiv.append(editorLeftDiv);
        rightDiv.append(editorRightDiv);

        fullDiv.append(leftDiv);
        fullDiv.append(rightDiv);
        publicationSection.querySelector('.content-container').append(fullDiv);
    }
}


    function createTxtEditor(destination, blocType, loadedContent){
        console.log("Creation du text editor");
        switch(blocType){
          case 1 : 
          $("#"+destination).append('<div style="display: none;" class="toolBar" id="tb-'+txtCounter+'"> <span class="ql-formats"> <select class="ql-size"></select> </span> <span class="ql-formats"> <button class="ql-bold"></button> <button class="ql-italic"></button> <button class="ql-underline"></button> <button class="ql-strike"></button> </span> <span class="ql-formats"> <select class="ql-color"></select> <select class="ql-background"></select> </span> <span class="ql-formats"> <button class="ql-header" value="1"></button> <button class="ql-header" value="2"></button> </span> <span class="ql-formats"> <button class="ql-list" value="ordered"></button> <button class="ql-list" value="bullet"></button> <button class="ql-indent" value="-1"></button> <button class="ql-indent" value="+1"></button> </span> <span class="ql-formats"> <select class="ql-align"></select> </span> <span class="ql-formats"> <button class="ql-link"></button> <button class="ql-image"></button> <button class="ql-video"></button> </span> <span class="ql-formats"> <button class="ql-clean"></button> </span> </div>');
          $("#"+destination).append('<div id="editor-'+txtCounter+'" style="width: 100%; border: none;"></div>');
          break;
          case 2 : 
          $("#"+destination).append('<div style="display: none;" class="toolBar" id="tb-'+txtCounter+'"> <span class="ql-formats"> <select class="ql-size"></select> </span> <span class="ql-formats"> <button class="ql-bold"></button> <button class="ql-italic"></button> <button class="ql-underline"></button> <button class="ql-strike"></button> </span> <span class="ql-formats"> <select class="ql-color"></select> <select class="ql-background"></select> </span> <span class="ql-formats"> <button class="ql-header" value="1"></button> <button class="ql-header" value="2"></button> </span> <span class="ql-formats"> <button class="ql-list" value="ordered"></button> <button class="ql-list" value="bullet"></button> <button class="ql-indent" value="-1"></button> <button class="ql-indent" value="+1"></button> </span> <span class="ql-formats"> <select class="ql-align"></select> </span> <span class="ql-formats"> <button class="ql-link"></button> <button class="ql-image"></button> <button class="ql-video"></button> </span> <span class="ql-formats"> <button class="ql-clean"></button> </span> </div>');
          $("#"+destination).append('<div id="editor-'+txtCounter+'" style="width: 100%; border: none;"></div>');
          break;
          case 3 : 
          $("#"+destination).append('<div style="display: none;" class="toolBar" id="tb-'+txtCounter+'"> <span class="ql-formats"> <select class="ql-size"></select> </span> <span class="ql-formats"> <button class="ql-bold"></button> <button class="ql-italic"></button> <button class="ql-underline"></button> <button class="ql-strike"></button> </span> <span class="ql-formats"> <select class="ql-color"></select> <select class="ql-background"></select> </span> <span class="ql-formats"> <button class="ql-header" value="1"></button> <button class="ql-header" value="2"></button> </span> <span class="ql-formats"> <button class="ql-list" value="ordered"></button> <button class="ql-list" value="bullet"></button> <button class="ql-indent" value="-1"></button> <button class="ql-indent" value="+1"></button> </span> <span class="ql-formats"> <select class="ql-align"></select> </span> <span class="ql-formats"> <button class="ql-link"></button> <button class="ql-image"></button> <button class="ql-video"></button> </span> <span class="ql-formats"> <button class="ql-clean"></button> </span> </div>');
          $("#"+destination).append('<div id="editor-'+txtCounter+'" style="width: 100%; border: none;"></div>');
          break;
        }
        
        let editorElem = $("#editor-"+txtCounter);

        editorElem.on( "click", function() {
        //alert( "Handler for `click` called." + this.id);
            var id = extractNumber(this.id);
            var tbs = document.querySelectorAll('.toolBar');
            for(let t = 0; t < txtCounter; t++){
                $('#tb-'+t).css( "display", "none" );
            }
            $('#tb-'+id).css( "display", "block" );
        } );
        var tbName = '#tb-' + txtCounter;
        var options = {
            debug: 'info',
            modules: {
                toolbar: tbName
            },
            placeholder: 'Écrire ici...',
            readOnly: false,
            theme: 'snow'
        };
        console.log('text counter ' + txtCounter);

        var editor = new Quill('#editor-'+txtCounter, options);
        editorElem.on('DOMSubtreeModified', function(){
          updatePreviewContent();
        });

        if(loadedContent){
          editor.deleteText(0, 50000);
          htmlToDelta(loadedContent, editor);
        }
        
        txtCounter++;
    }

    // Modifier l'innerHTML après 1 seconde
    setTimeout(function() {
        let editorCounter = 0;
        
        var toLoadContent = document.querySelectorAll('.recup-div');
        if(toLoadContent.length > 0){
            for(let i=0; i < toLoadContent.length; i++){
                if(toLoadContent[i].querySelector('.recup-full-content')){
                  addFullSection(toLoadContent[i].querySelector('.recup-full-content').innerHTML);
                  /* document.querySelector('#editor-'+editorCounter).innerHTML = toLoadContent[i].querySelector('.recup-full-content').innerHTML;
                  editorCounter++; */
                  
                }else if(toLoadContent[i].querySelector('.recup-left-content') && toLoadContent[i].querySelector('.recup-right-content')){
                  addDoubleHalfSection(toLoadContent[i].querySelector('.recup-left-content').innerHTML, toLoadContent[i].querySelector('.recup-right-content').innerHTML);
                  
                  /* document.querySelector('#editor-'+editorCounter).innerHTML = toLoadContent[i].querySelector('.recup-left-content').innerHTML;
                  editorCounter++;
                  document.querySelector('#editor-'+editorCounter).innerHTML = toLoadContent[i].querySelector('.recup-right-content').innerHTML;
                  editorCounter++; */
                }
                toLoadContent[i].remove();
            }
          handleFormHeader();
          updatePreviewContent();
        }
        
        
    }, 10); 
    
    function updatePreviewContent(){
      //let k = 0;
      var FormBlocs = $('#form-content-container').find('.form-bloc-container');
      for(let k=0; k < FormBlocs.length; k++){
        for(let i = 0; i < blocCounter; i++){
          if(FormBlocs[k]){
            //console.log("Fullbloc counter: " + i + "BC = "+blocCounter);
            let articleSection = FormBlocs[k].querySelector('#article-section-'+i);
            if(articleSection){
              if(articleSection.querySelector('.ql-editor')){
                let articleSectionInnerContent = articleSection.querySelector('.ql-editor').innerHTML;
                let realtimePublication = document.getElementById('realtime-publication');
                let destination = realtimePublication.querySelector('#publication-full-width-section-'+i);
                destination.innerHTML = articleSectionInnerContent;
              }
              
              //k++;
            }else{
              let articleLeftSection = FormBlocs[k].querySelector('#article-left-section-'+i);
              let articleRightSection = FormBlocs[k].querySelector('#article-right-section-'+i);
              if(articleLeftSection && articleRightSection && articleLeftSection.querySelector('.ql-editor') && articleRightSection.querySelector('.ql-editor')){
                let articleLeftSectionInnerContent = articleLeftSection.querySelector('.ql-editor').innerHTML;
                let articleRightSectionInnerContent = articleRightSection.querySelector('.ql-editor').innerHTML;
                let realtimePublication = document.getElementById('realtime-publication');
                let destination = realtimePublication.querySelector('#publication-half-full-section-'+i);
                let leftPan = destination.querySelector('#publication-half-left-section-'+i);
                leftPan.innerHTML = articleLeftSectionInnerContent;
                let rightPan = destination.querySelector('#publication-half-right-section-'+i);
                rightPan.innerHTML = articleRightSectionInnerContent;
                //k++;
              }
            }
          }
          
        }

      }
      
    }
    

    function htmlToDelta(html, quill) {
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;
    var deltaOps = [];

    const processNode = (node, parentAttrs = {}) => {
    if (node.nodeType === 3) { // Text node
        deltaOps.push({ insert: node.textContent, attributes: parentAttrs });
    } else if (node.nodeType === 1) { // Element node
        var attrs = { ...parentAttrs };
        var style = node.getAttribute('style');

        // Traitement des styles en ligne
        if (style) {
            var styles = style.split(";");
            styles.forEach(s => {
                var [key, value] = s.split(":").map(s => s.trim());
                switch(key) {
                    case 'font-weight':
                        if (value === 'bold') attrs.bold = true;
                        break;
                    case 'font-style':
                        if (value === 'italic') attrs.italic = true;
                        break;
                    case 'text-decoration':
                        if (value.includes('underline')) attrs.underline = true;
                        break;
                    case 'color':
                        attrs.color = value;
                        break;
                    case 'background-color':
                        attrs.background = value;
                        break;
                }
            });
        }

        switch (node.tagName.toLowerCase()) {
                case 'h1':
                    attrs.header = 1;
                    break;
                case 'h2':
                    attrs.header = 2;
                    break;
                case 'em':
                    attrs.italic = true;
                    break;
                case 'strong':
                case 'b':
                    attrs.bold = true;
                    break;
                case 'u':
                    attrs.underline = true;
                    break;
                case 's':
                    attrs.strike = true;
                    break;
                case 'ul':
                    attrs.list = 'bullet';
                    break;
                case 'ol':
                    attrs.list = 'ordered';
                    break;
                case 'li':
                    // Traiter les éléments de liste individuellement
                    Array.from(node.childNodes).forEach(child => processNode(child, attrs));
                    // Ajouter une nouvelle ligne après chaque élément de liste
                    deltaOps.push({ insert: '\n', attributes: attrs });
                    return; // Pour éviter d'ajouter une nouvelle ligne supplémentaire après le traitement récursif
                // Ajouter d'autres correspondances pour les balises de texte ici
            }

        // Traitement des classes pour l'alignement et autres styles
        if (node.classList.contains('ql-align-justify')) {
            attrs.align = 'justify';
        } else if (node.classList.contains('ql-align-center')) {
            attrs.align = 'center';
        } else if (node.classList.contains('ql-align-left')) {
            attrs.align = 'left';
        } else if (node.classList.contains('ql-align-right')) {
            attrs.align = 'right';
        } else if (node.classList.contains('ql-size-huge')) {
            attrs.size = 'huge';
        } else if (node.classList.contains('ql-size-large')) {
            attrs.size = 'large';
        } else if (node.classList.contains('ql-size-small')) {
            attrs.size = 'small';
        }

        // Traitement des images
        if (node.tagName.toLowerCase() === 'img') {
            var imageUrl = node.getAttribute('src');
            deltaOps.push({ insert: { image: imageUrl }, attributes: attrs });
            return;
        }

        // Traitement des vidéos intégrées
        if (node.tagName.toLowerCase() === 'iframe' || node.tagName.toLowerCase() === 'video') {
            var videoUrl = node.getAttribute('src');
            deltaOps.push({ insert: { video: videoUrl }, attributes: attrs });
            return;
        }

        // Traitement des liens
        if (node.tagName.toLowerCase() === 'a') {
            var href = node.getAttribute('href');
            attrs.link = href;
        }

        // Traitement récursif des nœuds enfants
        Array.from(node.childNodes).forEach(child => processNode(child, attrs));

        // Ajout d'une nouvelle ligne pour les éléments de bloc, si nécessaire
        if (['p', 'h1', 'h2', 'div', 's', 'em', 'u'].includes(node.tagName.toLowerCase())) {
            deltaOps.push({ insert: '\n', attributes: attrs });
        }
    }
};

// Assurez-vous d'appeler cette fonction avec le bon nœud de départ
Array.from(tempDiv.childNodes).forEach(child => processNode(child));

    quill.setContents(deltaOps);
}





    function extractNumber(str) {
        // Use a regular expression to find numbers after the dash
        var match = str.match(/-(\d+)$/);

        // Check if the match is found and return the number part
        if (match && match[1]) {
            return parseInt(match[1], 10); // Convert the string to an integer
        }

        return null; // Return null if no number is found
    }

    function removeSimpleSection(bloc_counter){
        let id = "publication-full-width-section-" + bloc_counter;
        let section = document.getElementById(id).parentNode;
        section.remove(); 
    }

    function removeDoubleSection(bloc_counter){
        let id = "publication-half-full-section-" + bloc_counter;
        let section = document.getElementById(id);
        section.remove(); 
    }


function replaceFirstIntInString(str, newInt) {
    return str.replace(/\d+/, newInt.toString());
}

/* function refreshFormIds(){
    let container = document.getElementById('form-content-container');
    if(container){
      sections = Array.from(container.querySelectorAll('.form-bloc-container'));
    sections.forEach((section, idx) => {
        let isDouble = section.querySelector('.half-width-form');
        if (isDouble) {
            section.querySelector('.left').id = "article-left-section-" + idx;
            section.querySelector('.right').id = "article-right-section-" + idx;
        } else {
            section.querySelector('.full-width-form').id = "article-section-" + idx;
        }

        section.dataset.blocCounter = idx;
    });

    let verticalPos = 0; 
    for(let i = 0; i < sections.length; i++) {
    let children1 = sections[i].querySelector('div');
    let currAttribute1 = children1.getAttribute('id');
    let newAttribute1 = replaceFirstIntInString(currAttribute1, verticalPos);
    children1.setAttribute('id', newAttribute1);
        verticalPos++;
    }
    }
    
} */

function refreshPreviewIds(){
    let publicationSection = document.getElementById("realtime-publication");
    let sections = publicationSection.querySelectorAll('.ql-editor');

    // Update the IDs
    let verticalPos = 0; // This will track the vertical position
    for(let i = 0; i < sections.length; i++) {
        let section = sections[i];
        let someID = section.id;
        if (someID.includes('full')) {
            //section.name = "ql-editor-" + verticalPos;
            let curr = section.getAttribute('name');
            let newAtt = replaceFirstIntInString(curr, verticalPos);
            section.setAttribute('name', newAtt);
            verticalPos++; // Move to next vertical position only after right half
        } else if (someID.includes('left')) {
            //section.name = "ql-editor-left-" + verticalPos;
            let curr = section.getAttribute('name');
            let newAtt = replaceFirstIntInString(curr, verticalPos);
            section.setAttribute('name', newAtt);
            //verticalPos++; // Move to next vertical position only after right half
        } else if (someID.includes('right')) {
            //section.name = "ql-editor-right-" + verticalPos;
            let curr = section.getAttribute('name');
            let newAtt = replaceFirstIntInString(curr, verticalPos);
            section.setAttribute('name', newAtt);
            verticalPos++; // Move to next vertical position only after right half
        } 
    }
}

  function handleFormHeader(){
    let titleInput = document.querySelector('input[name="titre"]');
      let subtitleInput = document.querySelector('input[name="sous-titre"]');
      let authorInput = document.querySelector('select[name="auteur"]');
      let dateInput = document.querySelector('input[name="date"]');
      let statusInput = document.querySelector('select[name="status"]');

      const currentDate = new Date();
      var dateData = document.querySelector('#recup-date').value; 
      var statusData = document.querySelector('#recup-status').value; 
      if(statusData){
        statusInput.value = statusData;
      }
      //var dateData = '18:11:2023';
      const formattedDate = currentDate.toISOString().split("T")[0];
      dateInput.value = dateData.toString();
      

      if (titleInput) {
          updateTitlePublication(titleInput.value);
          titleInput.addEventListener('input', function() {
              updateTitlePublication(this.value);
          });
      }

      if (subtitleInput) {
          updateSubtitlePublication(subtitleInput.value);
          subtitleInput.addEventListener('input', function() {
              updateSubtitlePublication(this.value);
          });
      }

      if (authorInput) {
          let name = getNameFromId(authorInput.value);
          updateAuthorPublication(name);
          authorInput.addEventListener('input', function(){
              let name = getNameFromId(this.value);
              updateAuthorPublication(name);
          });
      }

      if (dateInput) {
        updateDatePublication(dateInput.value);
        dateInput.addEventListener('input', function(){
            updateDatePublication(this.value);
        });
      }

      if (statusInput) {
        
        updateStatusPublication(statusInput.value);
        statusInput.addEventListener('input', function(){
            updateStatusPublication(this.value);
        });
      }
  }
  window.addEventListener('DOMContentLoaded', (event) => {
      handleFormHeader();
  });

  function getNameFromId(id){
      let options = Array.from(document.querySelectorAll('.select-auth'));
      for(let i = 0; i < options.length; i++){
          if(options[i].value == id){
              return options[i].innerHTML;
          }
      }
  }

  function updateTitlePublication(title) {
      let publicationSection = document.getElementById("realtime-publication");
      if(publicationSection) {
          publicationSection.querySelector('.article-title').textContent = title;
      }
  }

  function updateSubtitlePublication(subtitle) {
      let publicationSection = document.getElementById("realtime-publication");
      if(publicationSection) {
          publicationSection.querySelector('.article-subtitle').textContent = subtitle;
      }
  }

  function updateAuthorPublication(author) {
      let publicationSection = document.getElementById("realtime-publication");
      if(publicationSection) {
          publicationSection.querySelector('#article-author-publication').innerHTML = author;
      }
  }

  function updateDatePublication(date) {
      let publicationSection = document.getElementById("realtime-publication");
      if(publicationSection) {
          publicationSection.querySelector('#article-date-publication').innerHTML = getFormattedDate();
      }
  }

  function updateStatusPublication(status) {
      let publicationSection = document.getElementById("realtime-publication");
      if(publicationSection) {
          switch(status){
              case "1" : document.querySelector('#article-status-publication').innerHTML = "Vous-seul pourrez voir et modifier l'article."; break;
              case "2" : document.querySelector('#article-status-publication').innerHTML = "Tous les administrateurs pourront voir et modifier l'article."; break;
              case "3" : document.querySelector('#article-status-publication').innerHTML = "Visible par tout le monde avec le lien de partage. Pas visible dans 'Publications'."; break;
              case "4" : document.querySelector('#article-status-publication').innerHTML = "L'article est publié sur le site."; break;
          }
          
      }
  }
  function getFormattedDate() {
      const value = dateInput.value;

      const [year, month, day] = value.split('-');

      const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                          "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
      
      const formatted = `${monthNames[parseInt(month, 10) - 1]}, ${year}`;

      return formatted;
  }
  </script>  
</body>

</html>
