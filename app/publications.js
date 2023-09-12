let last_known_scroll_position = 0;
let ticking = false;
let speed = -0.03;


function centerSidebarLink(scroll_pos) {
    const sidebarLinks = document.querySelectorAll("#sidebar a");

    sidebarLinks.forEach((link, index) => {
        let offset = index;
        link.style.transform = `translateY(${offset + scroll_pos * speed}px)`;
    });
}

window.addEventListener('scroll', function (e) {
    if(window.screen.width >= 1000){
        last_known_scroll_position = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(function () {
                centerSidebarLink(last_known_scroll_position);
                ticking = false;
            });
    
            ticking = true;
        }
    }else{
        centerSidebarLink(0);
    }
});

let resizeTimeout;

$(window).on('resize', function() {
    clearTimeout(resizeTimeout);  // Clear the timeout if it exists
    resizeTimeout = setTimeout(test, 100);  // Set a new timeout to run the `test` function after 150ms
});

function handleSidebarToggle() {
    $('#close-sidebar').on('click', function() {
        $('#sidebar').animate({
            left: '-100vw'
        }, 100, function() {
            $(this).hide();
        });

        $('#close-sidebar').hide();
        $('#open-sidebar').show();
    });

    $('#open-sidebar').on('click', function() {
        $("#sidebar").show().animate({
            left: '0%'
        }, 100);

        $('#open-sidebar').hide();
        $('#close-sidebar').show();
    });
}

function test() {
    if ($(window).width() < 1000) {
        $('#sidebar').css('left', '-100vw');  // Close the sidebar by default on small screens.
        $('.sidebar_button_container').show();
        $('#close-sidebar').hide();
        $('#open-sidebar').show();

        handleSidebarToggle();
    } else {
        $('#sidebar').show().css('left', '0');  // Always show the sidebar on wider screens.
        $('.sidebar_button_container').hide();

        // Remove click event handlers to prevent unnecessary triggers.
        $('#close-sidebar').off('click');
        $('#open-sidebar').off('click');
    }
}

$(document).ready(function() {
    test();
    $('#close-sidebar').hide();
});

document.addEventListener("DOMContentLoaded", () => {
    const firstSidebarLink = document.querySelector("#sidebar a");
    if (firstSidebarLink) {
        centerSidebarLink(this.window.screenY);
    }
});


document.querySelectorAll('#sidebar a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();

        const id = event.target.getAttribute('href');

        if(window.screen.width < 1000){
            $('#sidebar').animate({
                left: '-100vw'
            }, 100, function() {
                $(this).hide();
            });
    
            $('#close-sidebar').hide();
            $('#open-sidebar').show();
        }
        let elem = document.querySelector(id);
        elem.scrollIntoView({
            behavior: 'smooth'
        });
    });
});


