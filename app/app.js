const menu = document.querySelector('#mobile-menu');
const menuLink = document.querySelector('.navbar__menu');
const catalogContainer = document.querySelector('.mtCatalog__container');
const mainTop = document.querySelector('.main__top');

menu.addEventListener('click', function(){
    menu.classList.toggle('is-active');
    menuLink.classList.toggle('active');
});

let addOrRemoveLogo = false;
window.addEventListener('resize', function(event) {
    updateWidthResponse();
}, true);

function updateWidthResponse(){
    let li = '<li class="navbar__item" id="navbar__linkLogoContainer"></li>';
    
    if ($(window).width() < 800) {
        if(this.scrollY <= 200){
            $('.main__downButton').css("opacity" ,'1');
        }
        if(addOrRemoveLogo == false){
            addOrRemoveLogo = true;
            $("#navbar__linkLogo").css({"position" : "absolute", "top" : "0", "margin" : "0 auto", "width" : "200px", "height" : "fit-content"});
        }
     }
     else {
        $('.main__downButton').css("opacity" ,'0');
        if(addOrRemoveLogo == true){
            addOrRemoveLogo = false;
            $(".navbar__menu").prepend(li);
        }
    }    
}

