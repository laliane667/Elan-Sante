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

/* function calculateRatio(entry) {
    return entry.intersectionRatio;
} */

/* // On document ready
document.addEventListener("DOMContentLoaded", () => {
    const timelineItems = Array.from(document.querySelectorAll('.timeline-item'));

    window.addEventListener('scroll', function (e) {
        // Iterate over each timeline item
        timelineItems.forEach((item, index) => {
            // Get the position of the item from the top of the document
            const rect = item.getBoundingClientRect();
            const fromTop = rect.top + window.scrollY;

            // Check if the item is within 200px from the bottom of the viewport
            if (window.scrollY + window.innerHeight >= fromTop + 200 && window.scrollY + window.innerHeight <= fromTop + item.offsetHeight + 200) {
                // Calculate the ratio
                const ratio = (window.scrollY + window.innerHeight - fromTop - 200) / (item.offsetHeight + 200);

                const articleContentWrapper = item.querySelector('.article-content-wrapper');
                const newHeight = ratio * articleContentWrapper.scrollHeight;

                // Update the height of the article content
                articleContentWrapper.style.height = `${newHeight}px`;
                item.dataset.openedByObserver = 'true';
            }
        });
    });
}); */
let resizeTimeout;

$(window).on('resize', function() {
    clearTimeout(resizeTimeout);  // Clear the timeout if it exists
    resizeTimeout = setTimeout(test, 100);  // Set a new timeout to run the `test` function after 150ms
});

function handleSidebarToggle() {
    $('#close-sidebar').on('click', function() {
        $('#sidebar').animate({
            left: '-100vw'
        }, 300, function() {
            $(this).hide();
        });

        $('#close-sidebar').hide();
        $('#open-sidebar').show();
    });

    $('#open-sidebar').on('click', function() {
        $("#sidebar").show().animate({
            left: '0%'
        }, 300);

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





    /* const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const articleContentWrapper = entry.target.querySelector('.article-content-wrapper');
                const btn = entry.target.querySelector('.toggle-content');
    
                // Check if the article has been opened by IntersectionObserver
                if (!entry.target.dataset.openedByObserver) {
                    const ratio = calculateRatio(entry);
                    const newHeight = ratio * articleContentWrapper.scrollHeight;
                    articleContentWrapper.style.height = `${newHeight}px`;
    
                    // Mark the article as opened
                    entry.target.dataset.openedByObserver = 'true';
                    
                    const articleId = entry.target.id;
                    const sidebarLink = document.querySelector(`#sidebar a[data-target="${articleId}"]`);
    
                    if (sidebarLink) {
                        console.log(`Article: ${articleId}`);
                        centerSidebarLink(sidebarLink);
                    } else {
                        console.log(`Sidebar link for ${articleId} not found`);
                    }
                }
      
            }
        });
    }, {
        rootMargin: '-200px',
        threshold: 0.1 
    }); */


    /* const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                
                const articleId = entry.target.id;
                const sidebarLink = document.querySelector(`#sidebar a[data-target="${articleId}"]`);
    
                if (sidebarLink) {
                    console.log(`Article: ${articleId}`);
                    centerSidebarLink(sidebarLink);
                } else {
                    console.log(`Sidebar link for ${articleId} not found`);
                }
                
                const btn = entry.target.querySelector('.toggle-content');
                const articleContentWrapper = entry.target.querySelector('.article-content-wrapper');
                
                if (!(articleContentWrapper.style.height && articleContentWrapper.style.height !== '0px')) {
                    articleContentWrapper.style.height = `${articleContentWrapper.scrollHeight}px`;
                    articleContentWrapper.style.opacity = "1.0";
                    articleContentWrapper.style.transition = 'height 4s ease, opacity 1.8s ease-out';
                    btn.textContent = 'Voir moins';
                }
            }
        });
    }, {
        rootMargin: '-200px', 
        threshold: 0.1
    }); */

/* 

    document.querySelectorAll('.timeline-item').forEach(item => {
        observer.observe(item);
    }); */

    /* const firstSidebarLink = document.querySelector("#sidebar a");
    if (firstSidebarLink) {
        console.log('First sidebar link found');
        centerSidebarLink(firstSidebarLink);
    } else {
        console.log('First sidebar link not found');
    } */

    /* const timelineItems = Array.from(document.querySelectorAll('.timeline-item'));

    timelineItems.forEach(item => {
        const btn = item.querySelector('.toggle-content');
        const articleContentWrapper = item.querySelector('.article-content-wrapper');

        btn.addEventListener('click', () => {
            if (articleContentWrapper.style.height && articleContentWrapper.style.height !== '0px') {
                articleContentWrapper.style.height = '0px';
                articleContentWrapper.style.opacity = '0.0';
                articleContentWrapper.style.transition = 'height 0.8s ease-in-out, opacity 0.8s ease-out';

                btn.textContent = 'Voir plus';
            } else {
                articleContentWrapper.style.height = `${articleContentWrapper.scrollHeight}px`;
                articleContentWrapper.style.opacity = '1.0';
                articleContentWrapper.style.transition = 'height 0.8s ease-in-out, opacity 0.8s ease-out';
                btn.textContent = 'Voir moins';
            }
        });
    }); */
});



document.querySelectorAll('#sidebar a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();

        const id = event.target.getAttribute('href');

        if(window.screen.width < 1000){
            $('#sidebar').animate({
                left: '-100vw'
            }, 300, function() {
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