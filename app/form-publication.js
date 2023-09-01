let bloc_counter = 0;
let paragraph_counter = 0;
let title_counter = 0;
let image_counter = 0;
let anchor_counter = 0;

//========================   BIG SECTION   =========================================================================================================================================================//

function addFullSection(){
    let blocCounter = bloc_counter;

    let container = document.querySelector(".content-container");
    
    let fullDivContainer = document.createElement('div');
    fullDivContainer.className = "form-bloc-container";
    fullDivContainer.draggable = true;
    fullDivContainer.dataset.blocCounter = blocCounter;

    let fullDiv = document.createElement("div");
    fullDiv.className = "full-width full-width-form";
    fullDiv.id = "article-section-" + bloc_counter;

    let blocToolContainer = document.createElement("div");
    blocToolContainer.className = "form-bloc-tool-container";


    let titleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 0)'>Titre</button>";

    let textButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 0)'>Text</button>";

    let imageButton = "<button class='form-button' onclick='javascript: addImage(" + bloc_counter +", 0)'>Image</button>";

    let anchorButton = "<button class='form-button' onclick='javascript: addAnchor(" + bloc_counter +", 0)'>URL</button>";
    
    let dragHandle = document.createElement("div");
    dragHandle.className = "drag-handle";
    dragHandle.innerHTML = "&#9776;"; 
 
    let trashButton = document.createElement("button");
    trashButton.className = "bloc-trash";
    trashButton.innerHTML = "&#10060;";

    blocToolContainer.innerHTML += titleButton;
    blocToolContainer.innerHTML += textButton;
    blocToolContainer.innerHTML += imageButton;
    blocToolContainer.innerHTML += anchorButton;

    fullDiv.append(blocToolContainer);
    addFullSectionToPublication(bloc_counter);

    fullDivContainer.addEventListener('dragstart', function(e) {
        e.dataTransfer.setData('text/plain', blocCounter);
    });
    
    fullDivContainer.append(trashButton);
    fullDivContainer.append(fullDiv);
    fullDivContainer.append(dragHandle);
    container.append(fullDivContainer);
    console.log("Full");

    trashButton.addEventListener('click', function() {
        fullDivContainer.remove(); 
        removeSimpleSection(blocCounter);
    });

    bloc_counter += 1;
}

function addDoubleHalfSection(){
    let blocCounter = bloc_counter;

    let container = document.querySelector(".content-container");

    let fullDivContainer = document.createElement('div');
    fullDivContainer.className = "form-bloc-container";
    fullDivContainer.draggable = true;
    fullDivContainer.dataset.blocCounter = blocCounter;

    let halfDivLeft = document.createElement("div");
    halfDivLeft.className = "half-width-form left";
    halfDivLeft.id = "article-left-section-" + bloc_counter;

    let halfDivRight = document.createElement("div");
    halfDivRight.className = "half-width-form right";
    halfDivRight.id = "article-right-section-" + bloc_counter;

    let dragHandle = document.createElement("div");
    dragHandle.className = "drag-handle";
    dragHandle.innerHTML = "&#9776;"; 

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
    let leftAnchorButton = "<button class='form-button' onclick='javascript: addAnchor(" + bloc_counter +", 1)'>URL</button>";

    let rightTitleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 2)'>Titre</button>";
    let rightTextButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 2)'>Text</button>";
    let rightImageButton = "<button class='form-button' onclick='javascript: addImage(" + bloc_counter +", 2)'>Image</button>";
    let rightAnchorButton = "<button class='form-button' onclick='javascript: addAnchor(" + bloc_counter +", 2)'>URL</button>";

    leftBlocToolContainer.innerHTML += leftTitleButton;
    leftBlocToolContainer.innerHTML += leftTextButton;
    leftBlocToolContainer.innerHTML += leftImageButton;
    leftBlocToolContainer.innerHTML += leftAnchorButton;

    rightBlocToolContainer.innerHTML += rightTitleButton;
    rightBlocToolContainer.innerHTML += rightTextButton;
    rightBlocToolContainer.innerHTML += rightImageButton;
    rightBlocToolContainer.innerHTML += rightAnchorButton;

    halfDivLeft.append(leftBlocToolContainer);
    halfDivRight.append(rightBlocToolContainer);

    fullDivContainer.append(trashButton);
    fullDivContainer.append(halfDivLeft);
    fullDivContainer.append(halfDivRight);
    fullDivContainer.append(dragHandle);

    container.append(fullDivContainer);

    addHalfSectionToPublication(bloc_counter);

    trashButton.addEventListener('click', function() {
        fullDivContainer.remove();
        removeDoubleSection(blocCounter);
    });

    fullDivContainer.addEventListener('dragstart', function(e) {
        e.dataTransfer.setData('text/plain', blocCounter);
    });
    
   /*  container.addEventListener('dragover', function(e) {
        e.preventDefault();
    });
    
    container.addEventListener('drop', function(e) {
        e.preventDefault();
        let from = Number(e.dataTransfer.getData('text/plain'));
        let to = Array.from(container.children).indexOf(e.target.closest('.form-bloc-container'));
        
        if (to >= 0) {
            rearrangeSections(from, to);
            rearrangePublicationSections(from, to);
        }
    }); */

    
    bloc_counter += 1;

}

function removeSimpleSection(bloc_counter){
    let id = "publication-full-width-section-" + bloc_counter;
    let section = document.getElementById(id);
    section.remove(); 
}

function removeDoubleSection(bloc_counter){
    let rightId = "publication-half-right-section-" + bloc_counter;
    let leftId = "publication-half-left-section-" + bloc_counter;
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
        addTitleToFullSectionPublication(sectionId, titleId);
        break;

        case 1 : id = 'article-left-section-' + sectionId;
        addTitleToHalfSectionPublication(sectionId, titleId, 1);
        break;

        case 2 : id = 'article-right-section-' + sectionId;
        addTitleToHalfSectionPublication(sectionId, titleId, 2);
        break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(titleInput);
    document.getElementById(id).append(inputContainer);

    titleInput.addEventListener('input', function() {
        switch(blocType){
            case 0 : updateFullSectionPublication(this.value, "title", titleId); break;
            case 1 : updateHalfSectionPublication(this.value, 1, "title", titleId); break;    
            case 2 : updateHalfSectionPublication(this.value, 2, "title", titleId); break;
        }
    });

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeTitleFromFullSectionPublication(titleId); break;
            case 1: removeTitleFromHalfSectionPublication(1, titleId); break;
            case 2: removeTitleFromHalfSectionPublication(2, titleId); break;
        }

    });

    title_counter += 1;
}

function addText(sectionId, blocType) {
    let paragraphId = paragraph_counter;

    let inputContainer = document.createElement("div");
    inputContainer.className = "form-text-input-container";
    inputContainer.id = "styled-text-input-" + paragraphId;

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
            addParagraphToFullSectionPublication(sectionId, paragraphId);
            break;

        case 1:
            id = 'article-left-section-' + sectionId;
            addParagraphToHalfSectionPublication(sectionId, paragraphId, 1);
            break;

        case 2:
            id = 'article-right-section-' + sectionId;
            addParagraphToHalfSectionPublication(sectionId, paragraphId, 2);
            break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(textInput);
    document.getElementById(id).append(inputContainer);

    textInput.addEventListener('input', function() {
        autoAdjustHeight(this); 
        switch(blocType){
            case 0 : updateFullSectionPublication(this.value, "paragraph", paragraphId); break;
            case 1 : updateHalfSectionPublication(this.value, 1, "paragraph", paragraphId); break;    
            case 2 : updateHalfSectionPublication(this.value, 2, "paragraph", paragraphId); break;
        }
    });

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeParagraphFromFullSectionPublication(paragraphId); break;
            case 1: removeParagraphFromHalfSectionPublication(1, paragraphId); break;
            case 2: removeParagraphFromHalfSectionPublication(2, paragraphId); break;
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
            addImageToFullSectionPublication(sectionId, imageId);
            break;

        case 1:
            id = 'article-left-section-' + sectionId;
            addImageToHalfSectionPublication(sectionId, imageId, 1);
            break;

        case 2:
            id = 'article-right-section-' + sectionId;
            addImageToHalfSectionPublication(sectionId, imageId, 2);
            break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(uploadButton);
    document.getElementById(id).append(inputContainer);

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeImageFromFullSectionPublication(imageId); break;
            case 1: removeImageFromHalfSectionPublication(1, imageId); break;
            case 2: removeImageFromHalfSectionPublication(2, imageId); break;
        }
    });


    uploadButton.addEventListener('change', function(e) {
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            
            reader.onload = function(event) {
                let imgSrc = event.target.result;

                switch (blocType) {
                    case 0: updateFullSectionPublication(imgSrc, "image", imageId); break;
                    case 1: updateHalfSectionPublication(imgSrc, 1, "image", imageId); break;
                    case 2: updateHalfSectionPublication(imgSrc, 2, "image", imageId); break;
                }
            };

            reader.readAsDataURL(file);
        }
    });

    bloc_counter += 1;
}

function addAnchor(sectionId, blocType) {
    let anchorId = anchor_counter;

    let inputContainer = document.createElement("div");
    inputContainer.className = "form-text-input-container";

    let trashInput = document.createElement("button");
    trashInput.className = "form-trash-button";
    trashInput.innerHTML = "&#9587;";

    let textInput = document.createElement("input");
    textInput.className = "form-title-input";
    textInput.placeholder = "Entrez un URL...";


    let id = -1;
    switch (blocType) {
        case 0:
            id = 'article-section-' + sectionId;
            addAnchorToFullSectionPublication(sectionId, anchorId);
            break;

        case 1:
            id = 'article-left-section-' + sectionId;
            addAnchorToHalfSectionPublication(sectionId, anchorId, 1);
            break;

        case 2:
            id = 'article-right-section-' + sectionId;
            addAnchorToHalfSectionPublication(sectionId, anchorId, 2);
            break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(textInput);
    document.getElementById(id).append(inputContainer);

    textInput.addEventListener('input', function() {
        autoAdjustHeight(this); 
        switch(blocType){
            case 0 : updateFullSectionPublication(this.value, "anchor", anchorId); break;
            case 1 : updateHalfSectionPublication(this.value, 1, "anchor", anchorId); break;    
            case 2 : updateHalfSectionPublication(this.value, 2, "anchor", anchorId); break;
        }
    });

    trashInput.addEventListener('click', function () {
        inputContainer.remove();

        switch (blocType) {
            case 0: removeAnchorFromFullSectionPublication(anchorId); break;
            case 1: removeAnchorFromHalfSectionPublication(1, anchorId); break;
            case 2: removeAnchorFromHalfSectionPublication(2, anchorId); break;
        }

    });

    anchor_counter += 1;
}

//================================================================================================================================================================================================//


//========================   PARAGRAPH   =========================================================================================================================================================//

function addParagraphToFullSectionPublication(sectionId, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let paragraph = document.createElement("p");
        paragraph.className = "newspapper";
        paragraph.id = "publication-full-width-paragraph-" + id;

        let id_ = "publication-full-width-section-" + sectionId;
        document.getElementById(id_).append(paragraph);
    }
}

function addParagraphToHalfSectionPublication(sectionId, id, destination){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let paragraph = document.createElement("p");
        paragraph.className = "newspapper";

        let destinationId = -1;
        if(destination == 1){
            paragraph.id = "publication-half-left-paragraph-" + id;
            destinationId = "publication-half-left-section-" + sectionId;

        }else if (destination == 2){
            paragraph.id = "publication-half-right-paragraph-" + id;
            destinationId = "publication-half-right-section-" + sectionId;
        }

        document.getElementById(destinationId).append(paragraph);
    }
}

function removeParagraphFromFullSectionPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let paragraphId = "publication-full-width-paragraph-" + id;
        let paragraph = document.getElementById(paragraphId);
        if(paragraph){
            paragraph.remove();
        }

    }
}

function removeParagraphFromHalfSectionPublication(destination, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let paragraphId = -1;
        if(destination == 1){
            paragraphId= "publication-half-left-paragraph-" + id;

        }else if (destination == 2){
            paragraphId = "publication-half-right-paragraph-" + id;
        }
        let paragraph = document.getElementById(paragraphId);
        if(paragraph){
            paragraph.remove();
        }

    }
}

//================================================================================================================================================================================================//

//========================   TITLE   =========================================================================================================================================================//

function addTitleToFullSectionPublication(sectionId, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let title = document.createElement("p");
        title.className = "publication-section-title";
        title.id = "publication-full-width-title-" + id;

        let id_ = "publication-full-width-section-" + sectionId;
        document.getElementById(id_).append(title);
    }
}

function addTitleToHalfSectionPublication(sectionId, id, destination){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let title = document.createElement("p");
        title.className = "publication-section-title";

        let destinationId = -1;
        if(destination == 1){
            title.id = "publication-half-left-title-" + id;
            destinationId = "publication-half-left-section-" + sectionId;

        }else if (destination == 2){
            title.id = "publication-half-right-title-" + id;
            destinationId = "publication-half-right-section-" + sectionId;
        }

        document.getElementById(destinationId).append(title);
    }
}

function removeTitleFromFullSectionPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let titleId = "publication-full-width-title-" + id;
        let title = document.getElementById(titleId);
        if(title){
            title.remove();
        }

    }
}

function removeTitleFromHalfSectionPublication(destination, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let titleId = -1;
        if(destination == 1){
            titleId = "publication-half-left-title-" + id;
        }else if (destination == 2){
            titleId = "publication-half-right-title-" + id;
        }
        let title = document.getElementById(titleId);
        if(title){
            title.remove();
        }

    }
}

//================================================================================================================================================================================================//

//========================   IMAGE   =========================================================================================================================================================//

function addImageToFullSectionPublication(sectionId, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let image = document.createElement("img");
        image.className = "uploaded-publication-image";
        image.id = "publication-full-width-image-" + id;

        let container = document.createElement("div");
        container.className = "image-container";
        container.append(image);

        let id_ = "publication-full-width-section-" + sectionId;
        document.getElementById(id_).append(container);
    }
}

function addImageToHalfSectionPublication(sectionId, id, destination){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let image = document.createElement("img");
        image.className = "uploaded-publication-image";

        let destinationId = -1;
        if(destination == 1){
            image.id = "publication-half-left-image-" + id;
            destinationId = "publication-half-left-section-" + sectionId;

        }else if (destination == 2){
            image.id = "publication-half-right-image-" + id;
            destinationId = "publication-half-right-section-" + sectionId;
        }

        let container = document.createElement("div");
        container.className = "image-container";
        container.append(image);

        document.getElementById(destinationId).append(container);
    }
}

function removeImageFromFullSectionPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let imageId = "publication-full-width-image-" + id;
        let image = document.getElementById(imageId);
        if(image){
            image.remove();
        }

    }
}

function removeImageFromHalfSectionPublication(destination, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let imageId = -1;
        if(destination == 1){
            imageId = "publication-half-left-image-" + id;
        }else if (destination == 2){
            imageId = "publication-half-right-image-" + id;
        }
        let image = document.getElementById(imageId);
        if(image){
            image.remove();
        }

    }
}

//================================================================================================================================================================================================//


//========================   ANCHOR   =========================================================================================================================================================//

function addAnchorToFullSectionPublication(sectionId, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let anchor = document.createElement("a");
        anchor.className = "publication-section-anchor";
        anchor.id = "publication-full-width-anchor-" + id;

        let id_ = "publication-full-width-section-" + sectionId;
        document.getElementById(id_).append(anchor);
    }
}

function addAnchorToHalfSectionPublication(sectionId, id, destination){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let anchor = document.createElement("a");
        anchor.className = "publication-section-anchor";

        let destinationId = -1;
        if(destination == 1){
            anchor.id = "publication-half-left-anchor-" + id;
            destinationId = "publication-half-left-section-" + sectionId;

        }else if (destination == 2){
            anchor.id = "publication-half-right-anchor-" + id;
            destinationId = "publication-half-right-section-" + sectionId;
        }

        document.getElementById(destinationId).append(anchor);
    }
}

function removeAnchorFromFullSectionPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let anchorId = "publication-full-width-anchor-" + id;
        let anchor = document.getElementById(anchorId);
        if(anchor){
            anchor.remove();
        }

    }
}

function removeAnchorFromHalfSectionPublication(destination, id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let anchorId = -1;
        if(destination == 1){
            anchorId = "publication-half-left-anchor-" + id;
        }else if (destination == 2){
            anchorId = "publication-half-right-anchor-" + id;
        }
        let anchor = document.getElementById(anchorId);
        if(anchor){
            anchor.remove();
        }

    }
}

//================================================================================================================================================================================================//



//========================   PREVIEW   =========================================================================================================================================================//

function updateFullSectionPublication(text, targetType, id){
    let publicationSection = document.getElementById("realtime-publication");

    if(publicationSection){

        let id_;
        switch(targetType){
            case "title" : id_ = "publication-full-width-title-" + id; break;
            case "paragraph" : id_ = "publication-full-width-paragraph-" + id; break;
            case "image" : id_ = "publication-full-width-image-" + id; break;
            case "anchor" : id_ = "publication-full-width-anchor-" + id; break;
        }

        let destination = document.getElementById(id_);
        if(destination){
            if(targetType == "image"){
                destination.src = text;
            }else if(targetType == "anchor"){
                destination.innerHTML = text;
                destination.href = text;
            }else if(targetType == "paragraph"){
                destination.innerHTML = text;
                /* updatePreview(destination, text); */
            }
            else{
                destination.innerHTML = text;
            }
        }
    }
}

function updateHalfSectionPublication(text, pan, targetType, id){
    let publicationSection = document.getElementById("realtime-publication");

    console.log("ID"+ id);
    if(publicationSection){

        let destinationId = -1;
        if(pan == 1){
            switch(targetType){
                case "title" : destinationId = "publication-half-left-title-" + id; break;
                case "paragraph" : destinationId = "publication-half-left-paragraph-" + id; break;
                case "image" : destinationId = "publication-half-left-image-" + id; break;
                case "anchor" : destinationId = "publication-half-left-anchor-" + id; break;
            }
            

        }else if (pan == 2){
            switch(targetType){
                case "title" : destinationId = "publication-half-right-title-" + id; break;
                case "paragraph" : destinationId = "publication-half-right-paragraph-" + id; break;
                case "image" : destinationId = "publication-half-right-image-" + id; break;
                case "anchor" : destinationId = "publication-half-right-anchor-" + id; break;
            }
            
        }
        let destination = document.getElementById(destinationId);

        if(destination){
            if(targetType == "image"){
                destination.src = text;
            }else if(targetType == "anchor"){
                destination.innerHTML = text;
                destination.href = text;
            }else if(targetType == "paragraph"){
                destination.innerHTML = text;
                /* updatePreview(destination, text); */
            }else{
                destination.innerHTML = text;
            }
        }
    }
}




function addFullSectionToPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        let fullDiv =  document.createElement("div");
        fullDiv.className = "content-item full-width";
        fullDiv.id = "publication-full-width-section-" + id;
        publicationSection.querySelector('.content-container').append(fullDiv);
    }
}

function addHalfSectionToPublication(id){
    let publicationSection = document.getElementById("realtime-publication");
    if(publicationSection){
        
        let leftDiv =  document.createElement("div");
        leftDiv.className = "content-item half-width left";
        leftDiv.id = "publication-half-left-section-" + id;

        let rightDiv =  document.createElement("div");
        rightDiv.className = "content-item half-width right";
        rightDiv.id = "publication-half-right-section-" + id;

        publicationSection.querySelector('.content-container').append(leftDiv);
        publicationSection.querySelector('.content-container').append(rightDiv);
    }
}

//================================================================================================================================================================================================//


function autoAdjustHeight(textarea) {
    textarea.style.height = 'auto'; 
    textarea.style.height = textarea.scrollHeight + 'px'; 
}



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
            updateTitlePublication(this.value);
        });
    }

    if (subtitleInput) {
        subtitleInput.addEventListener('input', function() {
            updateSubtitlePublication(this.value);
        });
    }

    if (authorInput) {
        updateAuthorPublication(authorInput.value);
        authorInput.addEventListener('input', function(){
            updateAuthorPublication(this.value);
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

    initializeDragAndDrop();
});



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
            case "br" : document.querySelector('#article-status-publication').innerHTML = "Vous-seul pourrez voir et modifier l'article."; break;
            case "pr" : document.querySelector('#article-status-publication').innerHTML = "Tous les administrateurs pourront voir et modifier l'article."; break;
            case "nr" : document.querySelector('#article-status-publication').innerHTML = "Visible par tout le monde avec le lien de partage. Pas visible dans 'Publications'."; break;
            case "pbl" : document.querySelector('#article-status-publication').innerHTML = "L'article est publié sur le site."; break;
        }
        
    }
}
function rearrangeSections(fromIndex, toIndex) {
    let container = document.querySelector('.content-container');
    let sections = Array.from(container.querySelectorAll('.form-bloc-container'));

    if (!sections[fromIndex]) return;

    let fromSection = sections[fromIndex];

    if (fromIndex < toIndex) {
        if (toIndex + 1 < sections.length) {
            container.insertBefore(fromSection, sections[toIndex + 1]);
        } else {
            container.append(fromSection);
        }
    } else if (fromIndex > toIndex) {
        container.insertBefore(fromSection, sections[toIndex]);
    }

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

    initializeDragAndDrop();
}





function rearrangePublicationSections(fromIndex, toIndex) {
    let publicationSection = document.getElementById("realtime-publication");
    let sections = publicationSection.querySelectorAll('.content-container .content-item');

    let fromSections = Array.from(sections).filter(section => {
        let currentIdx = parseInt(section.id.split("-").pop());
        return currentIdx === fromIndex;
    });

    let toSection = sections[toIndex * 2];

    if (!toSection && fromSections.length) {
        fromSections.forEach(fromSection => {
            fromSection.parentElement.append(fromSection);
        });
    } else if (toSection) {
        fromSections.forEach(fromSection => {
            toSection.parentElement.insertBefore(fromSection, toSection);
        });
    }

    // Reset IDs first
    sections.forEach(section => {
        section.id = '';
    });

    // Update the IDs
    sections = publicationSection.querySelectorAll('.content-container .content-item');
    let verticalPos = 0; // This will track the vertical position
    for(let i = 0; i < sections.length; i++) {
        let section = sections[i];
        if (section.classList.contains('left')) {
            section.id = "publication-half-left-section-" + verticalPos;
        } else if (section.classList.contains('right')) {
            section.id = "publication-half-right-section-" + verticalPos;
            verticalPos++; // Move to next vertical position only after right half
        } else {
            section.id = "publication-full-width-section-" + verticalPos;
            verticalPos++;
        }
    }

}
/* 
function initializeDragAndDrop() {
    let container = document.querySelector(".content-container");
    
    container.addEventListener('dragover', function(e) {
        e.preventDefault();
    });
    
    container.addEventListener('drop', function(e) {
        e.preventDefault();
        let from = Number(e.dataTransfer.getData('text/plain'));
        let to = Array.from(container.children).indexOf(e.target.closest('.form-bloc-container'));
        
        if (to >= 0) {
            rearrangeSections(from, to);
            rearrangePublicationSections(from, to);
        }
    });
}

 */

function initializeDragAndDrop() {
    let draggableItems = document.querySelectorAll('.form-bloc-container'); 

    draggableItems.forEach(item => {
        // Clear any old listeners
        item.removeEventListener('dragstart', handleDragStart);

        // Add the new listener
        item.addEventListener('dragstart', handleDragStart);
    });
}

function handleDragStart(e) {
    e.dataTransfer.setData('text/plain', e.currentTarget.dataset.blocCounter);
}

// This function should be called every time sections are rearranged or modified
function refreshEventListeners() {
    initializeDragAndDrop();
}

document.addEventListener('DOMContentLoaded', (event) => {
    // This is the main container's event listeners, which can be set once and don't need to be refreshed
    let container = document.querySelector(".content-container");
    container.addEventListener('dragover', function(e) {
        e.preventDefault();
    });
    
    container.addEventListener('drop', function(e) {
        e.preventDefault();
        let from = Number(e.dataTransfer.getData('text/plain'));
        let to = Array.from(container.children).indexOf(e.target.closest('.form-bloc-container'));
        
        if (to >= 0) {
            rearrangeSections(from, to);
            rearrangePublicationSections(from, to);

            // IMPORTANT: Refresh the event listeners after rearranging
            refreshEventListeners();
        }
    });

    // Initialize event listeners when the page loads
    refreshEventListeners();
});




let lastFocusedTextarea = null;

// Track the last focused textarea
document.addEventListener('focus', function(e) {
    if (e.target.matches('.form-text-input')) {
        lastFocusedTextarea = e.target;
    }
}, true);

function applyStyle(style) {
    if (!lastFocusedTextarea) return;

    const container = lastFocusedTextarea.closest('.form-text-input-container');
    const containerId = container.getAttribute('id');
    
    let id = extractNumberFromEnd(containerId);

    let paragraphId = "publication-full-width-paragraph-" + id;
    let halfLeftParagraphId = "publication-half-left-paragraph-" + id;
    let halfRightParagraphId = "publication-half-right-paragraph-" + id;

    let preview = document.getElementById(paragraphId);
    if(!preview){
        preview = document.getElementById(halfLeftParagraphId);
        if(!preview){
            preview = document.getElementById(halfRightParagraphId);
            if(!preview){
                return;
            }
        }
    }

    /* if (!lastFocusedTextarea.selectionEnd - lastFocusedTextarea.selectionStart) return; */ // No text is selected.
/* 
    if (!preview) {
        preview = document.createElement('div');
        preview.className = "newspaper";
        container.appendChild(preview);
    } */

    let styledText = lastFocusedTextarea.value;
    switch (style) {
        case 'normal':
            styledText = wrapSelectedText(lastFocusedTextarea, '');
            break;
        case 'bold':
            styledText = wrapSelectedText(lastFocusedTextarea, '**');
            break;
        case 'italic':
            styledText = wrapSelectedText(lastFocusedTextarea, '\\');
            break;
        case 'underline':
            styledText = wrapSelectedText(lastFocusedTextarea, '__');
            break;
    }

    lastFocusedTextarea.value = styledText;
    updatePreview(lastFocusedTextarea, preview);
}

function wrapSelectedText(textarea, wrapper) {
    const selection = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    return textarea.value.substring(0, textarea.selectionStart) + wrapper + selection + wrapper + textarea.value.substring(textarea.selectionEnd);
}

function updatePreview(textarea, preview) {
    let styledText = textarea.value;

    // Convert bold (e.g. **text** to <strong>text</strong>)
    styledText = styledText.replace(/\*\*([^\*]+)\*\*/g, '<strong>$1</strong>');

    // Convert italic (e.g. \text\ to <i>text</i>)
    styledText = styledText.replace(/\\([^\\]+)\\/g, '<i>$1</i>');

    // Convert underline (e.g. __text__ to <u>text</u>)
    styledText = styledText.replace(/__([^_]+)__/g, '<u>$1</u>');

    preview.innerHTML = styledText;
}


function extractNumberFromEnd(str) {
    const parts = str.split('-');
    const lastPart = parts[parts.length - 1];
    return parseInt(lastPart, 10);
}
