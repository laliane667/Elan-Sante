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
    last_known_scroll_position = window.scrollY;

    if (!ticking) {
        window.requestAnimationFrame(function () {
            centerSidebarLink(last_known_scroll_position);
            ticking = false;
        });

        ticking = true;
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
        document.querySelector(id).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
