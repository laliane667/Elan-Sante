let bloc_counter = 0;
let paragraph_counter = 0;
let title_counter = 0;
let image_counter = 0;


function getFormattedDate() {
    const value = dateInput.value;

    const [year, month, day] = value.split('-');

    const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    
    const formatted = `${day} ${monthNames[parseInt(month, 10) - 1]}, ${year}`;

    return formatted;
}

window.addEventListener('DOMContentLoaded', (event) => {
    let titleInput = document.querySelector('input[name="titre"]');
    let subtitleInput = document.querySelector('input[name="sous-titre"]');
    let authorInput = document.querySelector('select[name="auteur"]');
    let dateInput = document.querySelector('input[name="date"]');
    let statusInput = document.querySelector('select[name="status"]');

    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split("T")[0];
    dateInput.value = formattedDate;

    

    if (titleInput) {
        titleInput.addEventListener('input', function() {
            updateTitlePreview(this.value);
        });
    }

    if (subtitleInput) {
        subtitleInput.addEventListener('input', function() {
            updateSubtitlePreview(this.value);
        });
    }

    if (authorInput) {
        updateAuthorPreview(authorInput.value);
        authorInput.addEventListener('input', function(){
            updateAuthorPreview(this.value);
        });
    }

    if (dateInput) {
        updateDatePreview(dateInput.value);
        dateInput.addEventListener('input', function(){
            updateDatePreview(this.value);
        });
    }

    if (statusInput) {
        updateStatusPreview(statusInput.value);
        statusInput.addEventListener('input', function(){
            updateStatusPreview(this.value);
        });
    }
});

//========================   BIG SECTION   =========================================================================================================================================================//

function addFullSection(){
    let blocCounter = bloc_counter;

    let container = document.querySelector(".content-container");
    
    let fullDivContainer = document.createElement('div');
    fullDivContainer.className = "form-bloc-container";
     
    let fullDiv = document.createElement("div");
    fullDiv.className = "full-width full-width-form";
    fullDiv.id = "article-section-" + bloc_counter;

    let blocToolContainer = document.createElement("div");
    blocToolContainer.className = "form-bloc-tool-container";


    let titleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 0)'>Titre</button>";

    let textButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 0)'>Text</button>";

    let imageButton = "<button class='form-button' onclick='javascript: addImage(" + bloc_counter +", 0)'>Image</button>";

    /*let anchorButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +")'>Lien</button>";
     */
 
    let trashButton = document.createElement("button");
    trashButton.className = "bloc-trash";
    trashButton.innerHTML = "&#10060;";

    blocToolContainer.innerHTML += titleButton;
    blocToolContainer.innerHTML += textButton;
    blocToolContainer.innerHTML += imageButton;
    /* blocToolContainer.innerHTML += anchorButton; */

    fullDiv.append(blocToolContainer);
    addFullSectionToPreview(bloc_counter);
    bloc_counter += 1;
    fullDivContainer.append(trashButton);
    fullDivContainer.append(fullDiv);
    container.append(fullDivContainer);
    console.log("Full");

    trashButton.addEventListener('click', function() {
        fullDivContainer.remove(); 
        removeSimpleSection(blocCounter);
    });
}

function addDoubleHalfSection(){
    let blocCounter = bloc_counter;

    let container = document.querySelector(".content-container");

    let fullDivContainer = document.createElement('div');
    fullDivContainer.className = "form-bloc-container";

    let halfDivLeft = document.createElement("div");
    halfDivLeft.className = "half-width-form left";
    halfDivLeft.id = "article-left-section-" + bloc_counter;

    let halfDivRight = document.createElement("div");
    halfDivRight.className = "half-width-form right";
    halfDivRight.id = "article-right-section-" + bloc_counter;

    let trashButton = document.createElement("button");
    trashButton.className = "bloc-trash";
    trashButton.innerHTML = "&#10060;";

    let leftBlocToolContainer = document.createElement("div");
    leftBlocToolContainer.className = "form-bloc-tool-container";

    let rightBlocToolContainer = document.createElement("div");
    rightBlocToolContainer.className = "form-bloc-tool-container";

    let leftTitleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 1)'>Titre</button>";
    let leftTextButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 1)'>Text</button>";
    let leftImageButton = "<button class='form-button' onclick='javascript: addImage(" + bloc_counter +", 1)'>Image</button>";

    let rightTitleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 2)'>Titre</button>";
    let rightTextButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 2)'>Text</button>";
    let rightImageButton = "<button class='form-button' onclick='javascript: addImage(" + bloc_counter +", 2)'>Image</button>";

    leftBlocToolContainer.innerHTML += leftTitleButton;
    leftBlocToolContainer.innerHTML += leftTextButton;
    leftBlocToolContainer.innerHTML += leftImageButton;

    rightBlocToolContainer.innerHTML += rightTitleButton;
    rightBlocToolContainer.innerHTML += rightTextButton;
    rightBlocToolContainer.innerHTML += rightImageButton;

    halfDivLeft.append(leftBlocToolContainer);
    halfDivRight.append(rightBlocToolContainer);

    fullDivContainer.append(trashButton);
    fullDivContainer.append(halfDivLeft);
    fullDivContainer.append(halfDivRight);

    container.append(fullDivContainer);

    addHalfSectionToPreview(bloc_counter);

    trashButton.addEventListener('click', function() {
        fullDivContainer.remove();
        removeDoubleSection(blocCounter);
    });
    bloc_counter += 1;

}

function removeSimpleSection(bloc_counter){
    let id = "preview-full-width-section-" + bloc_counter;
    let section = document.getElementById(id);
    section.remove(); 
}

function removeDoubleSection(bloc_counter){
    let rightId = "preview-half-right-section-" + bloc_counter;
    let leftId = "preview-half-left-section-" + bloc_counter;
    let rightSection = document.getElementById(rightId);
    let leftSection = document.getElementById(leftId);
    rightSection.remove(); 
    leftSection.remove(); 
}
//================================================================================================================================================================================================//


//========================   TOOL METHODS   =========================================================================================================================================================//


function addTitle(sectionId, blocType){
    let titleId = title_counter;

    let inputContainer = document.createElement("div");
    inputContainer.className = "form-text-input-container";

    let trashInput = document.createElement("button");
    trashInput.className = "form-trash-button";
    trashInput.innerHTML = "&#9587;";

    let titleInput = document.createElement("input");
    titleInput.className = "form-title-input";
    titleInput.placeholder = "Entrez un titre...";

    let id = -1;
    switch(blocType){
        case 0 : id = 'article-section-' + sectionId;
        addTitleToFullSectionPreview(sectionId, titleId);
        break;

        case 1 : id = 'article-left-section-' + sectionId;
        addTitleToHalfSectionPreview(sectionId, titleId, 1);
        break;

        case 2 : id = 'article-right-section-' + sectionId;
        addTitleToHalfSectionPreview(sectionId, titleId, 2);
        break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(titleInput);
    document.getElementById(id).append(inputContainer);

    titleInput.addEventListener('input', function() {
        switch(blocType){
            case 0 : updateFullSectionPreview(this.value, "title", titleId); break;
            case 1 : updateHalfSectionPreview(this.value, 1, "title", titleId); break;    
            case 2 : updateHalfSectionPreview(this.value, 2, "title", titleId); break;
        }
    });

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeTitleFromFullSectionPreview(titleId); break;
            case 1: removeTitleFromHalfSectionPreview(1, titleId); break;
            case 2: removeTitleFromHalfSectionPreview(2, titleId); break;
        }

    });

    title_counter += 1;
}

function addText(sectionId, blocType) {
    let paragraphId = paragraph_counter;

    let inputContainer = document.createElement("div");
    inputContainer.className = "form-text-input-container";

    let trashInput = document.createElement("button");
    trashInput.className = "form-trash-button";
    trashInput.innerHTML = "&#9587;";

    let textInput = document.createElement("textarea");
    textInput.className = "form-text-input";
    textInput.placeholder = "Entrez un paragraphe...";

    let id = -1;
    switch (blocType) {
        case 0:
            id = 'article-section-' + sectionId;
            addParagraphToFullSectionPreview(sectionId, paragraphId);
            break;

        case 1:
            id = 'article-left-section-' + sectionId;
            addParagraphToHalfSectionPreview(sectionId, paragraphId, 1);
            break;

        case 2:
            id = 'article-right-section-' + sectionId;
            addParagraphToHalfSectionPreview(sectionId, paragraphId, 2);
            break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(textInput);
    document.getElementById(id).append(inputContainer);

    textInput.addEventListener('input', function() {
        autoAdjustHeight(this); 
        switch(blocType){
            case 0 : updateFullSectionPreview(this.value, "paragraph", paragraphId); break;
            case 1 : updateHalfSectionPreview(this.value, 1, "paragraph", paragraphId); break;    
            case 2 : updateHalfSectionPreview(this.value, 2, "paragraph", paragraphId); break;
        }
    });

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeParagraphFromFullSectionPreview(paragraphId); break;
            case 1: removeParagraphFromHalfSectionPreview(1, paragraphId); break;
            case 2: removeParagraphFromHalfSectionPreview(2, paragraphId); break;
        }

    });

    paragraph_counter += 1;
}

function addImage(sectionId, blocType){
    let imageId = image_counter;

    let inputContainer = document.createElement("div");
    inputContainer.className = "form-image-input-container";

    let trashInput = document.createElement("button");
    trashInput.className = "form-trash-button";
    trashInput.innerHTML = "&#9587;";


    let uploadButton = document.createElement("input");
    uploadButton.type = "file";
    uploadButton.className = "form-image-input";
    uploadButton.placeholder = "Entrez un paragraphe...";

    let id = -1;
    switch (blocType) {
        case 0:
            id = 'article-section-' + sectionId;
            addImageToFullSectionPreview(sectionId, imageId);
            break;

        case 1:
            id = 'article-left-section-' + sectionId;
            addImageToHalfSectionPreview(sectionId, imageId, 1);
            break;

        case 2:
            id = 'article-right-section-' + sectionId;
            addImageToHalfSectionPreview(sectionId, imageId, 2);
            break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(uploadButton);
    document.getElementById(id).append(inputContainer);

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeImageFromFullSectionPreview(imageId); break;
            case 1: removeImageFromHalfSectionPreview(1, imageId); break;
            case 2: removeImageFromHalfSectionPreview(2, imageId); break;
        }
    });


    uploadButton.addEventListener('change', function(e) {
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            
            reader.onload = function(event) {
                let imgSrc = event.target.result;

                switch (blocType) {
                    case 0: updateFullSectionPreview(imgSrc, "image", imageId); break;
                    case 1: updateHalfSectionPreview(imgSrc, 1, "image", imageId); break;
                    case 2: updateHalfSectionPreview(imgSrc, 2, "image", imageId); break;
                }
            };

            reader.readAsDataURL(file);
        }
    });

    bloc_counter += 1;
}


//================================================================================================================================================================================================//


//========================   PARAGRAPH   =========================================================================================================================================================//

function addParagraphToFullSectionPreview(sectionId, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let paragraph = document.createElement("p");
        paragraph.className = "newspapper";
        paragraph.id = "preview-full-width-paragraph-" + id;

        let id_ = "preview-full-width-section-" + sectionId;
        document.getElementById(id_).append(paragraph);
    }
}

function addParagraphToHalfSectionPreview(sectionId, id, destination){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let paragraph = document.createElement("p");
        paragraph.className = "newspapper";

        let destinationId = -1;
        if(destination == 1){
            paragraph.id = "preview-half-left-paragraph-" + id;
            destinationId = "preview-half-left-section-" + sectionId;

        }else if (destination == 2){
            paragraph.id = "preview-half-right-paragraph-" + id;
            destinationId = "preview-half-right-section-" + sectionId;
        }

        document.getElementById(destinationId).append(paragraph);
    }
}

function removeParagraphFromFullSectionPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let paragraphId = "preview-full-width-paragraph-" + id;
        let paragraph = document.getElementById(paragraphId);
        if(paragraph){
            paragraph.remove();
        }

    }
}

function removeParagraphFromHalfSectionPreview(destination, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let paragraphId = -1;
        if(destination == 1){
            paragraphId= "preview-half-left-paragraph-" + id;

        }else if (destination == 2){
            paragraphId = "preview-half-right-paragraph-" + id;
        }
        let paragraph = document.getElementById(paragraphId);
        if(paragraph){
            paragraph.remove();
        }

    }
}

//================================================================================================================================================================================================//

//========================   TITLE   =========================================================================================================================================================//

function addTitleToFullSectionPreview(sectionId, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let title = document.createElement("p");
        title.className = "preview-section-title";
        title.id = "preview-full-width-title-" + id;

        let id_ = "preview-full-width-section-" + sectionId;
        document.getElementById(id_).append(title);
    }
}

function addTitleToHalfSectionPreview(sectionId, id, destination){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let title = document.createElement("p");
        title.className = "preview-section-title";

        let destinationId = -1;
        if(destination == 1){
            title.id = "preview-half-left-title-" + id;
            destinationId = "preview-half-left-section-" + sectionId;

        }else if (destination == 2){
            title.id = "preview-half-right-title-" + id;
            destinationId = "preview-half-right-section-" + sectionId;
        }

        document.getElementById(destinationId).append(title);
    }
}

function removeTitleFromFullSectionPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let titleId = "preview-full-width-title-" + id;
        let title = document.getElementById(titleId);
        if(title){
            title.remove();
        }

    }
}

function removeTitleFromHalfSectionPreview(destination, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let titleId = -1;
        if(destination == 1){
            titleId = "preview-half-left-title-" + id;
        }else if (destination == 2){
            titleId = "preview-half-right-title-" + id;
        }
        let title = document.getElementById(titleId);
        if(title){
            title.remove();
        }

    }
}

//================================================================================================================================================================================================//

//========================   IMAGE   =========================================================================================================================================================//

function addImageToFullSectionPreview(sectionId, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let image = document.createElement("img");
        image.className = "uploaded-preview-image";
        image.id = "preview-full-width-image-" + id;

        let container = document.createElement("div");
        container.className = "image-container";
        container.append(image);

        let id_ = "preview-full-width-section-" + sectionId;
        document.getElementById(id_).append(container);
    }
}

function addImageToHalfSectionPreview(sectionId, id, destination){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let image = document.createElement("img");
        image.className = "uploaded-preview-image";

        let destinationId = -1;
        if(destination == 1){
            image.id = "preview-half-left-image-" + id;
            destinationId = "preview-half-left-section-" + sectionId;

        }else if (destination == 2){
            image.id = "preview-half-right-image-" + id;
            destinationId = "preview-half-right-section-" + sectionId;
        }

        let container = document.createElement("div");
        container.className = "image-container";
        container.append(image);

        document.getElementById(destinationId).append(container);
    }
}

function removeImageFromFullSectionPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let imageId = "preview-full-width-image-" + id;
        let image = document.getElementById(imageId);
        if(image){
            image.remove();
        }

    }
}

function removeImageFromHalfSectionPreview(destination, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let imageId = -1;
        if(destination == 1){
            imageId = "preview-half-left-image-" + id;
        }else if (destination == 2){
            imageId = "preview-half-right-image-" + id;
        }
        let image = document.getElementById(imageId);
        if(image){
            image.remove();
        }

    }
}

//================================================================================================================================================================================================//



//========================   PREVIEW   =========================================================================================================================================================//

function updateFullSectionPreview(text, targetType, id){
    let previewSection = document.getElementById("realtime-preview");

    if(previewSection){

        let id_;
        switch(targetType){
            case "title" : id_ = "preview-full-width-title-" + id; break;

            case "paragraph" : id_ = "preview-full-width-paragraph-" + id; break;

            case "image" : id_ = "preview-full-width-image-" + id; break;

            /* let preview = document.getElementById("realtime-preview");
            let previewSection = preview.querySelector('.content-container');
            let imageElement = document.createElement('img');
            imageElement.src = text;
            //imageElement.className = 'uploaded-preview-image'; // To style the image in preview if required
            previewSection.appendChild(imageElement); */
        }

        let destination = document.getElementById(id_);
        if(destination){
            if(targetType == "image"){
                destination.src = text;
            }else{
                destination.innerHTML = text;
            }
        }
    }
}

function updateHalfSectionPreview(text, pan, targetType, id){
    let previewSection = document.getElementById("realtime-preview");

    console.log("ID"+ id);
    if(previewSection){

        let destinationId = -1;
        if(pan == 1){
            switch(targetType){
                case "title" : destinationId = "preview-half-left-title-" + id; break;
                case "paragraph" : destinationId = "preview-half-left-paragraph-" + id; break;
                case "image" : destinationId = "preview-half-left-image-" + id; break;
            }
            

        }else if (pan == 2){
            switch(targetType){
                case "title" : destinationId = "preview-half-right-title-" + id; break;
                case "paragraph" : destinationId = "preview-half-right-paragraph-" + id; break;
                case "image" : destinationId = "preview-half-right-image-" + id; break;
            }
            
        }
        let destination = document.getElementById(destinationId);

        if(destination){
            if(targetType == "image"){
                destination.src = text;
            }else{
                destination.innerHTML = text;
            }
        }
    }
}

function updateTitlePreview(title) {
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection) {
        previewSection.querySelector('.article-title').textContent = title;
    }
}

function updateSubtitlePreview(subtitle) {
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection) {
        previewSection.querySelector('.article-subtitle').textContent = subtitle;
    }
}

function updateAuthorPreview(author) {
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection) {
        previewSection.querySelector('#article-author-preview').innerHTML = author;
    }
}

function updateDatePreview(date) {
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection) {
        previewSection.querySelector('#article-date-preview').innerHTML = getFormattedDate();
    }
}

function updateStatusPreview(status) {
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection) {
        switch(status){
            case "br" : document.querySelector('#article-status-preview').innerHTML = "Vous-seul pourrez voir et modifier l'article."; break;
            case "pr" : document.querySelector('#article-status-preview').innerHTML = "Tous les administrateurs pourront voir et modifier l'article."; break;
            case "nr" : document.querySelector('#article-status-preview').innerHTML = "Visible par tout le monde avec le lien de partage. Pas visible dans 'Publications'."; break;
            case "pbl" : document.querySelector('#article-status-preview').innerHTML = "L'article est publié sur le site."; break;
        }
        
    }
}



function addFullSectionToPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let fullDiv =  document.createElement("div");
        fullDiv.className = "content-item full-width";
        fullDiv.id = "preview-full-width-section-" + id;
        previewSection.querySelector('.content-container').append(fullDiv);
    }
}

function addHalfSectionToPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        
        let leftDiv =  document.createElement("div");
        leftDiv.className = "content-item half-width left";
        leftDiv.id = "preview-half-left-section-" + id;

        let rightDiv =  document.createElement("div");
        rightDiv.className = "content-item half-width right";
        rightDiv.id = "preview-half-right-section-" + id;

        previewSection.querySelector('.content-container').append(leftDiv);
        previewSection.querySelector('.content-container').append(rightDiv);
    }
}

//================================================================================================================================================================================================//


function autoAdjustHeight(textarea) {
    textarea.style.height = 'auto'; 
    textarea.style.height = textarea.scrollHeight + 'px'; 
}