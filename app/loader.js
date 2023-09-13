const loader = document.querySelector('.loader');

window.addEventListener('load', () =>{
    loader.classList.add('shade-out');
    loader.classList.add('index-out');
    $("body").css({'overflow' : 'visible'});
})