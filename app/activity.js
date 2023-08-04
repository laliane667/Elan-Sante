/* function toggleSection(sectionHeader) {
    const content = sectionHeader.next('.section-content');
    const icons = sectionHeader.find('.toggle-icon i');
    content.slideToggle();
    icons.toggle();
} */
/* 
$(window).on('load', function () {
    $('.section-header').click(function () {
        toggleSection($(this));
    });

    $(window).on('hashchange', function () {
        const hash = window.location.hash;
        if (hash) {
            const sectionHeader = $(`a[name='${hash.substring(1)}']`).parent('.section-header');
            if (sectionHeader.length > 0) {
                toggleSection(sectionHeader);
            }
        }
    });
    
    const hash = window.location.hash;
    if (hash) {
        const sectionHeader = $(`a[name='${hash.substring(1)}']`).parent('.section-header');
        if (sectionHeader.length > 0) {
            toggleSection(sectionHeader);
        }
    }
}); */



let last_known_scroll_position = 0;
let ticking = false;
let speed = -0.09;

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

/* window.addEventListener('hashchange', function () {
    location.reload();
}); */
var sportElement = document.getElementById('activity-sport');
var foodElement = document.getElementById('activity-food');
var mindElement = document.getElementById('activity-mind');

// Variables to hold the heights
var totalHeightSport = 0;
var totalHeightFood = 0;
var totalHeightMind = 0;

var resizeCallback = function(entries) {
    entries.forEach(entry => {
      switch (entry.target.id) {
        case 'activity-sport':
          totalHeightSport = entry.target.scrollHeight;
          break;
        case 'activity-food':
          totalHeightFood = entry.target.scrollHeight;
          break;
        case 'activity-mind':
          totalHeightMind = entry.target.scrollHeight;
          break;
      }
    });
  };

  var observer = new ResizeObserver(resizeCallback);

// Start observing the elements
observer.observe(sportElement);
observer.observe(foodElement);
observer.observe(mindElement);

function updateTotalHeightSport(value){
    totalHeightSport += value;
}

function updateTotalHeightMind(value){
    totalHeightFood += value;
}

function updateTotalHeightFood(value){
    totalHeightMind += value;
}

document.addEventListener('DOMContentLoaded', (event) => {
    let hash = window.location.hash;
    let articles = document.getElementsByClassName('timeline-item');



    for (let i = 0; i < articles.length; i++) {

            articles[i].style.marginBottom = "10px";
            articles[i].style.marginTop = "10px";
            let contentHeight = articles[i].querySelector(".content-container").scrollHeight;
            articles[i].querySelector(".article-content-wrapper").style.height = "0px";//`${contentHeight}px`;
            const btn = articles[i].querySelector('.toggle-content');
            btn.textContent = 'Voir plus';

            let img = articles[i].querySelector(".activity-image-body");
            if (img) {
                img.style.width = '60%';
                //img.style.opacity = '0';
            }

            if (('#' + articles[i].id) === hash) {
                articles[i].scrollIntoView({
                    behavior: 'smooth'
                });

                articles[i].querySelector(".article-content-wrapper").style.height =`${contentHeight}px`;
                const btn = articles[i].querySelector('.toggle-content');
                btn.textContent = 'Voir moins';

                if (img) {
                    img.style.width = '90%';
                    img.style.opacity = '1';
                }
                //document.getElementById('page_container').classList.add(articles[i].dataset.type);
            }

        
        
        /*if (hash === '') {
            document.getElementById('page_container').classList.add('default');
            document.getElementById('page_container').style.background = 'linear-gradient(to left, #023e73, #034e86, #055f98, #0771ab, #0a83bd, #0a83bd, #0a83bd, #0a83bd, #0771ab, #055f98, #034e86, #023e73)';
            articles[i].style.marginBottom = "8px";
            articles[i].style.marginTop = "8px";
            const btn = articles[i].querySelector('.toggle-content');
            btn.textContent = 'Voir plus';
            articles[i].querySelector(".article-content-wrapper").style.height = '0';
            let img = articles[i].querySelector(".activity-image-body");
            if (img) {
                img.style.width = '50%';
            }

        } else {
            articles[i].style.marginBottom = "10px";
            articles[i].style.marginTop = "10px";
            let contentHeight = articles[i].querySelector(".content-container").scrollHeight;
            console.log("CONTENT:" + contentHeight);
            articles[i].querySelector(".article-content-wrapper").style.height = `${contentHeight}px`;
            const btn = articles[i].querySelector('.toggle-content');
            btn.textContent = 'Voir moins';

            let img = articles[i].querySelector(".activity-image-body");
            if (img) {
                img.style.width = '90%';
            }

            if (('#' + articles[i].id) === hash) {
                articles[i].scrollIntoView();
                document.getElementById('page_container').classList.add(articles[i].dataset.type);
            }

        }*/

    }

   /*  for (let i = 0; i < articles.length; i++) {
        switch (articles[i].dataset.type) {
            case 'sport':
                totalHeightSport += articles[i].scrollHeight;
                break;
            case 'food':
                totalHeightFood += articles[i].scrollHeight;
                break;
            case 'mind':
                totalHeightMind += articles[i].scrollHeight;
                break;
            default:
                console.log("No type found for article " + i);
        }
    } */

    window.onscroll = function () {
        let scrollPosition = window.scrollY;

        //if (hash !== '') {
            if (scrollPosition < totalHeightSport) {
                document.getElementById('page_container').style.background = '#66BCDF';
            } else if (scrollPosition < totalHeightSport + totalHeightMind) {
                document.getElementById('page_container').style.background = '#E79C45';
            } else if (scrollPosition < totalHeightSport + totalHeightMind + totalHeightFood) {
                document.getElementById('page_container').style.background = '#99BE43';
            }
        //}

    };

    const firstSidebarLink = document.querySelector("#sidebar a");
    if (firstSidebarLink) {
        centerSidebarLink(firstSidebarLink);
    }

    const timelineItems = Array.from(document.querySelectorAll('.timeline-item'));

    timelineItems.forEach(item => {
        const btn = item.querySelector('.toggle-content');
        const articleContentWrapper = item.querySelector('.article-content-wrapper');

        btn.addEventListener('click', () => {
            if ((articleContentWrapper.style.height && articleContentWrapper.style.height !== '0px') || articleContentWrapper.style.height == "fit-content") {
                articleContentWrapper.style.height = '0px';
                articleContentWrapper.style.opacity = '0.0';
                articleContentWrapper.style.transition = 'height 0.8s ease-in-out, opacity 0.8s ease-out';
                let img = item.querySelector(".activity-image-body");
                if (img) {
                    img.style.width = '60%';
                    //img.style.opacity = '0';
                }
                btn.textContent = 'Voir plus';
            } else {
                articleContentWrapper.style.height = `${articleContentWrapper.scrollHeight}px`;
                articleContentWrapper.style.opacity = '1.0';
                articleContentWrapper.style.transition = 'height 0.8s ease-in-out, opacity 0.8s ease-out';
                btn.textContent = 'Voir moins';
                let img = item.querySelector(".activity-image-body");
                if (img) {
                    img.style.width = '90%';
                    img.style.opacity = '1';
                }
            }
        });
    });

});



function openActivity(id) {
    let activity = document.getElementById(id);
    const btn = activity.querySelector('.toggle-content');
    const articleContentWrapper = activity.querySelector('.article-content-wrapper');
    articleContentWrapper.style.height = `${articleContentWrapper.scrollHeight}px`;
    articleContentWrapper.style.opacity = '1.0';
    articleContentWrapper.style.transition = 'height 0.8s ease-in-out, opacity 0.8s ease-out';
    btn.textContent = 'Voir moins';
    let img = activity.querySelector(".activity-image-body");
    //updateTotalHeight(id, elem.querySelector('.article-content-wrapper'));
    if (img) {
        img.style.width = '90%';
        img.style.opacity = '1';
    }
}

/* function updateTotalHeight(id, element)
{
    switch(id){
        case "#apa" : updateTotalHeightSport(element.scrollHeight); break;
        case "#ebe" : updateTotalHeightSport(element.scrollHeight); break;
        case "#mb" : updateTotalHeightSport(element.scrollHeight); break;
    }
    console.log("Total sport: "+ totalHeightSport);
}
 */

document.querySelectorAll('#sidebar a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();

        const id = event.target.getAttribute('href');

        let elem = document.querySelector(id);
        //updateTotalHeight(id, elem.querySelector('.article-content-wrapper'));
        elem.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
