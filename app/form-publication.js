let bloc_counter = 0;
let paragraph_counter = 0;
let title_counter = 0;
let image_counter = 0;

function addFullSection(){
    let container = document.querySelector(".content-container");
    
    let fullDiv = document.createElement("div");
    fullDiv.className = "content-item full-width full-width-form";
    fullDiv.id = "article-section-" + bloc_counter;

    let blocToolContainer = document.createElement("div");
    blocToolContainer.className = "form-bloc-tool-container";


    let titleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 0)'>Titre</button>";

    let textButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 0)'>Text</button>";

    let imageButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +")'>Image</button>";

    let anchorButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +")'>Lien</button>";
    
 
    let trashButton = document.createElement("button");
    trashButton.className = "form-button bloc-trash";
    trashButton.innerHTML = "Supprimer le bloc";

    blocToolContainer.innerHTML += titleButton;
    blocToolContainer.innerHTML += textButton;
    blocToolContainer.innerHTML += imageButton;
    blocToolContainer.innerHTML += anchorButton;
    blocToolContainer.append(trashButton);

    fullDiv.append(blocToolContainer);
    addFullSectionToPreview(bloc_counter);
    bloc_counter += 1;
    container.append(fullDiv);
    console.log("Full");

    trashButton.addEventListener('click', function() {
        fullDiv.remove(); 
    });

}

function autoAdjustHeight(textarea) {
    textarea.style.height = 'auto'; 
    textarea.style.height = textarea.scrollHeight + 'px'; 
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
            case 0 : updateFullSectionPreview(this.value, paragraphId); break;
            case 1 : updateHalfSectionPreview(this.value, 1, paragraphId); break;    
            case 2 : updateHalfSectionPreview(this.value, 2, paragraphId); break;
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

    // Increment the counter for the section
    paragraph_counter += 1;
}



function addTitle(sectionId, blocType){
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
        break;

        case 1 : id = 'article-left-section-' + sectionId;
        break;

        case 2 : id = 'article-right-section-' + sectionId;
        break;
    }

    inputContainer.append(trashInput);
    inputContainer.append(titleInput);
    document.getElementById(id).append(inputContainer);

    trashInput.addEventListener('click', function() {
        inputContainer.remove(); // this removes the input container (and all its child elements)
    });
}


function addDoubleHalfSection(){
    let container = document.querySelector(".content-container");

    let halfDivLeft = document.createElement("div");
    halfDivLeft.className = "content-item half-width left full-width-form";
    halfDivLeft.id = "article-left-section-" + bloc_counter;


    let halfDivRight = document.createElement("div");
    halfDivRight.className = "content-item half-width right full-width-form";
    halfDivRight.id = "article-right-section-" + bloc_counter;


    let leftBlocToolContainer = document.createElement("div");
    leftBlocToolContainer.className = "form-bloc-tool-container";

    let rightBlocToolContainer = document.createElement("div");
    rightBlocToolContainer.className = "form-bloc-tool-container";

    let leftTitleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 1)'>Titre</button>";
    let leftTextButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 1)'>Text</button>";

    let rightTitleButton = "<button class='form-button' onclick='javascript: addTitle(" + bloc_counter +", 2)'>Titre</button>";
    let rightTextButton = "<button class='form-button' onclick='javascript: addText(" + bloc_counter +", 2)'>Text</button>";

    leftBlocToolContainer.innerHTML += leftTitleButton;
    leftBlocToolContainer.innerHTML += leftTextButton;

    rightBlocToolContainer.innerHTML += rightTitleButton;
    rightBlocToolContainer.innerHTML += rightTextButton;

    halfDivLeft.append(leftBlocToolContainer);
    halfDivRight.append(rightBlocToolContainer);

    container.append(halfDivLeft);
    container.append(halfDivRight);

    addHalfSectionToPreview(bloc_counter);
    bloc_counter += 1;
}


window.addEventListener('DOMContentLoaded', (event) => {
    let titleInput = document.querySelector('input[name="titre"]');
    let subtitleInput = document.querySelector('input[name="sous-titre"]');

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
});

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

function addFullSectionToPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let fullDiv =  document.createElement("div");
        fullDiv.className = "content-item full-width";
        fullDiv.id = "preview-full-width-setion-" + id;
        previewSection.querySelector('.content-container').append(fullDiv);
    }
}

function addHalfSectionToPreview(id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let leftDiv =  document.createElement("div");
        leftDiv.className = "content-item half-width left";
        leftDiv.id = "preview-half-left-setion-" + id;

        let rightDiv =  document.createElement("div");
        rightDiv.className = "content-item half-width right";
        rightDiv.id = "preview-half-right-setion-" + id;

        previewSection.querySelector('.content-container').append(leftDiv);
        previewSection.querySelector('.content-container').append(rightDiv);
    }
}

function addParagraphToFullSectionPreview(sectionId, id){
    let previewSection = document.getElementById("realtime-preview");
    if(previewSection){
        let paragraph = document.createElement("p");
        paragraph.className = "newspapper";
        paragraph.id = "preview-full-width-paragraph-" + id;

        let id_ = "preview-full-width-setion-" + sectionId;
        console.log(id);
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
            destinationId = "preview-half-left-setion-" + sectionId;

        }else if (destination == 2){
            paragraph.id = "preview-half-right-paragraph-" + id;
            destinationId = "preview-half-right-setion-" + sectionId;
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

function updateFullSectionPreview(text, id){
    let previewSection = document.getElementById("realtime-preview");

    if(previewSection){
        let id_ = "preview-full-width-paragraph-" + id;
        console.log("Heyo"+id);
        let destination = document.getElementById(id_);
        if(destination){
            destination.innerHTML = text;
        }
    }
}

function updateHalfSectionPreview(text, pan, id){
    let previewSection = document.getElementById("realtime-preview");

    console.log("ID"+ id);
    if(previewSection){

        let destinationId = -1;
        if(pan == 1){
            destinationId = "preview-half-left-paragraph-" + id;

        }else if (pan == 2){
            destinationId = "preview-half-right-paragraph-" + id;
        }
        let destination = document.getElementById(destinationId);

        if(destination){
            destination.innerHTML = text;
        }
    }
}