<?php




/* function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
} */

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}




/* CREATED AFTER */

/* Checking */
function emptyInputSignup($security, $firstname, $lastname, $email, $pwd, $pwdRepeat){
    $result;
    if(empty($security) || empty($firstname) || empty($lastname) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function isSecurityInvalid($conn, $security){
    $pwd = fetchSecurity($conn);
    $checkedPwd = password_verify($security, $pwd);

    $result;
    if($checkedPwd === false){
        $result = true;
    }else if($checkedPwd === true)
    {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $email){
   
    $sql = "SELECT * FROM Members WHERE memberEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../acces.php?loginError=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

/* Fetching */
function fetchSecurity($conn){
    $sql = "SELECT password FROM HashedSecurity LIMIT 1;"; // Getting only one record
    $result = mysqli_query($conn, $sql);

    $hash;
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $hash = $row['password'];
        }
    }else{
        header("location: ../acces.php?signupError=undefined");
        exit();
    }
    return $hash;
}

/* Other */
function extractAndDisplayDivContent($html, $i) {
    // Créer les patterns d'expression régulière pour les trois sections
    $patterns = [
        'ql-editor-' . $i => '/<div[^>]*name="ql-editor-' . $i . '"[^>]*>(.*?)<\/div>/s',
        'ql-editor-left-' . $i => '/<div[^>]*name="ql-editor-left-' . $i . '"[^>]*>(.*?)<\/div>/s',
        'ql-editor-right-' . $i => '/<div[^>]*name="ql-editor-right-' . $i . '"[^>]*>(.*?)<\/div>/s',
    ];
    $list = array();
    // Itérer sur chaque pattern
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $html, $matches)) {
            // Afficher directement le contenu capturé du div avec toutes les balises HTML
            array_push($list, $matches[1]);
        }
    }
    return $list;
}

/*TEST*/
function saveBase64Image($base64Image, $path) {
    // Décoder l'image
    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

    // Créer un nom de fichier unique
    $filename = uniqid() . '.jpg'; // ou .png selon le format de l'image
    file_put_contents($path . $filename, $imageData);

    return $filename;
}

function processContentAndSaveImages($htmlContent, $imagePath) {
    $doc = new DOMDocument();
    @$doc->loadHTML($htmlContent);

    $Paths = array();
    $images = $doc->getElementsByTagName('img');

    foreach ($images as $img) {
        $dataSrc = $img->getAttribute('src');
        
        // Vérifier si l'image est encodée en base64
        if (strpos($dataSrc, 'data:image') === 0) {
            $savedFilename = saveBase64Image($dataSrc, $imagePath);
            $img->setAttribute('src', $imagePath . $savedFilename);
            array_push($Paths, $imagePath.$savedFilename); 
        }
    }

    return $Paths;
}

function validateImagesInHtml($htmlContent) {
    $doc = new DOMDocument();
    @$doc->loadHTML($htmlContent);

    $images = $doc->getElementsByTagName('img');

    foreach ($images as $img) {
        $dataSrc = $img->getAttribute('src');
        
        // Vérifier si l'image est encodée en base64
        if (strpos($dataSrc, 'data:image') === 0) {
            // Extraire le contenu encodé en base64
            $base64String = preg_replace('#^data:image/\w+;base64,#i', '', $dataSrc);
            $imageData = base64_decode($base64String);

            // Créer une image à partir de la chaîne
            $image = imagecreatefromstring($imageData);
            if (!$image) {
                return false; // L'image n'est pas valide
            }

            // Obtenir les dimensions de l'image
            $width = imagesx($image);
            $height = imagesy($image);

            // Vérifier les dimensions de l'image (exemple : largeur et hauteur maximales)
            $maxWidth = 6000;
            $maxHeight = 6000;
            if ($width > $maxWidth || $height > $maxHeight) {
                return false; // L'image est trop grande
            }

            // Vérifier le format de l'image
            // Note : Cette vérification est basique et peut nécessiter une logique plus complexe
            /* if (!in_array(exif_imagetype($image), [IMAGETYPE_JPEG, IMAGETYPE_PNG])) {
                return false; // Format d'image non pris en charge
            } */

            // Libérer la mémoire
            imagedestroy($image);
        }
    }

    return true; // Toutes les images sont valides
}

function replaceBase64ImageSrc($html, $urls) {
    // Créer une instance de DOMDocument
    $doc = new DOMDocument();
    @$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);

    // Récupérer toutes les balises img
    $images = $doc->getElementsByTagName('img');

    // Initialiser un compteur pour parcourir le tableau d'URLs
    $urlIndex = 0;

    foreach ($images as $img) {
        // Vérifier si l'attribut src de l'image est en base64
        if (strpos($img->getAttribute('src'), 'data:image') === 0) {
            // Remplacer par l'URL correspondante du tableau, si disponible
            if (isset($urls[$urlIndex])) {
                $img->setAttribute('src', $urls[$urlIndex]);
                $urlIndex++;
            }
        }
    }

    // Récupérer et retourner le HTML modifié
    return $doc->saveHTML();
}
/**/

function createUser($conn, $firstname, $lastname, $email, $pwd){
   
    $sql = "INSERT INTO Members (memberFirstName, memberLastName, memberEmail, memberPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    $status = 0;

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../acces.php?signupError=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    loginUser($conn, $email, $pwd);
}


function loginUser($conn, $email, $pwd){
    $uidExists = uidExists($conn, $email);

    if($uidExists === false)
    {
        header("location: ../acces.php?loginError=incorrectEmail");
        exit();
    }

    $pwdHashed = $uidExists["memberPassword"];
    $checkedPwd = password_verify($pwd, $pwdHashed);
    if($checkedPwd === false){
        header("location: ../acces.php?loginError=incorrectPassword");
        exit();
    }else if($checkedPwd === true)
    {
        session_start();
        $_SESSION["memberId"] = $uidExists["memberId"];
        $_SESSION["memberEmail"] = $uidExists["memberEmail"];
        $_SESSION["memberStatus"] = getUserPrivilege($conn, $_SESSION["memberEmail"]);
        
        header("location: ../menu.php");
        exit(); 
    }
}

function getUserPrivilege($conn, $email){
    $sql = "SELECT memberStatus FROM Members WHERE memberEmail='$email';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $privilege = $row['memberStatus'];
        }
    }else{
        header("location: ../acces.php?log_failed:error=status");
        exit();
    }
    return $privilege;
}

function updateActuContent($conn, $value, $dest){
    $sql = "UPDATE Actualite SET ".$dest."='$value' WHERE actuId='1';";
    $result = mysqli_query($conn, $sql); 
}

function updatePublication($conn, $publicationId, $title, $subtitle, $authorId, $updaterId, $date, $updateDate, $statusId, $blocIndex){
    $sql = "UPDATE Publications SET publicationTitle='$title', publicationSubtitle='$subtitle', publicationAuthorId='$authorId', publicationUpdaterId='$updaterId', publicationDate='$date', publicationUpdatedDate='$updateDate', publicationStatusId='$statusId', publicationSectionCount='$blocIndex' WHERE publicationId='$publicationId';";
    $result = mysqli_query($conn, $sql); 
}

function createPublication($conn, $title, $subtitle, $authorId, $updaterId, $date, $updateDate, $statusId, $blocIndex){
    $sql = "INSERT INTO Publications (publicationTitle, publicationSubtitle, publicationAuthorId, publicationUpdaterId, publicationDate, publicationUpdatedDate, publicationStatusId, publicationSectionCount) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../editeur.php?error=publication");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $title, $subtitle, $authorId, $updaterId, $date, $updateDate, $statusId, $blocIndex);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM Publications ORDER BY publicationId DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['publicationId'];
        }
    }else{
        header("location: ../editeur.php?error=publication-fetch-id");
        exit();
    }
    return $id;
}  

function createSection($conn, $sectionIndex, $publicationId, $sectionType, $content){
    $sql = "INSERT INTO Sections (sectionIndex, sectionPublicationId, sectionType, sectionContent) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../editeur.php?section=error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $sectionIndex, $publicationId, $sectionType, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return 1;
    /* $sql = "SELECT sectionId FROM Sections WHERE sectionIndex='$sectionIndex' AND sectionPublicationId='$publicationId';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['sectionId'];
        }
    }else{
        header("location: ../editeur.php?section=error");
        exit();
    }
    return $id; */
}  

function countSectionsById($conn, $publicationId) {
    $sql = "SELECT COUNT(*) FROM Sections WHERE sectionPublicationId='$publicationId';";
    $result = mysqli_query($conn, $sql);

    $c = 0;
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $c++;
        }
        return $c;
    }
    return 0;
}

function clearPublicationSections($conn, $publicationId){
    $sql = "DELETE FROM Sections WHERE sectionPublicationId = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../editeur.php?error=clearingPublications");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $publicationId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
