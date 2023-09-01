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
    last_known_scroll_position = this.window.scrollY;

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
            articles[i].querySelector(".article-content-wrapper").style.height = "0px";
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
            }
    }

    window.onscroll = function () {
        let scrollPosition = window.scrollY;

            if (scrollPosition < totalHeightSport) {
                document.getElementById('page_container').style.background = '#66BCDF';
            } else if (scrollPosition < totalHeightSport + totalHeightMind) {
                document.getElementById('page_container').style.background = '#E79C45';
            } else if (scrollPosition < totalHeightSport + totalHeightMind + totalHeightFood) {
                document.getElementById('page_container').style.background = '#99BE43';
            }

    };

    const firstSidebarLink = document.querySelector("#sidebar a");
    if (firstSidebarLink) {
        centerSidebarLink(this.window.screenY);
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
    if (img) {
        img.style.width = '90%';
        img.style.opacity = '1';
    }
}


document.querySelectorAll('#sidebar a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();

        const id = event.target.getAttribute('href');

        let elem = document.querySelector(id);
        elem.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
