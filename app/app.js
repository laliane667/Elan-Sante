const loader = document.querySelector('.loader');

window.addEventListener('load', () =>{
    /* $("#loader-logo").css({'opacity' : '1.'}); */
    loader.classList.add('shade-out');
    loader.classList.add('index-out');
    $("body").css({'overflow' : 'visible'});

    /* if ($(window).width() < 800) {
        $('.main__downButton').css("opacity" ,'1');
    } */
})

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

    /* if($(window).width() > 1200){
        if($(window).height() < 777){
            //section container bottom 2
            $(".sectionContainer").css({"bottom" : "2%"});
            $("#presentation_sentance").css({"bottom" : "27%"});
            $("#presentation_sentance").css({"padding" : "0 2%"});
        }else{
            $(".sectionContainer").css({"bottom" : "10%"});
            $("#presentation_sentance").css({"bottom" : "35%"});
            $("#presentation_sentance").css({"padding" : "0 10%"});
        }
    } */
    
}

/* $('.main__downButton').click(function(){
    $("html, body").animate({ scrollTop: "750" }, 800);
});
 */
/* window.addEventListener("scroll", function(event) {
    updateVisuals();
});

function updateVisuals(){
    var scroll_y = this.scrollY;
    if(scroll_y > 200){
        $('.main__downButton').css("opacity" ,'0');
    }else if ($(window).width() < 1060) {
        $('.main__downButton').css("opacity" ,'1');
    }
} */