<?php
    include_once 'header.php';
?>
<!DOCTYPE php>
<php lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Présentation - Élan Santé</title>
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/font.css">
  <link rel="stylesheet" href="style/style1.css">

  <link rel="stylesheet" href="style/presentation.css">
  <link rel="stylesheet" href="style/card.css">

</head>
<?php
    include_once 'loader.php';
    include_once 'navbar.php';
?>

  <!-- <div id="main_introduction">
    <h5 id="main_introduction_title">Présentation de l'équipe :</h5>
    <p id="main_introduction_paragraph">(A changer)Elan Santé est une association loi 1901 qui se consacre à la création d'un environnement favorable au bien-être
      et à la
      santé, offrant une variété d'activités allant de l'activité physique adaptée aux
      sessions d'hypnose, en passant par des ateliers sur l'alimentation saine et des sessions d'étirements pour le
      bien-être.</p>
  </div> -->



  <div class="pres__top">


    <div class="topcard_container">

      
      <div class="card" id="card3">
        <img class="cardFamily" src="src/images/cards/calculator-solid.svg">
        <h3 class="title">Morgane <br>
          Delbart
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <h1 class="card-activity-link">Trésorière</h1>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/MG-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke3" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
      </div>

      <div class="card" id="card2">
        <img class="cardFamily" src="src/images/cards/brain-solid.svg">
        <h3 class="title">Benoit<br> Chevojon</h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#sh" class="card-activity-link">Shiatsu / Do-In</a>
          </li>
        </ul>
        
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/BC-profile.jpeg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#bc">Voir plus</a>
      </div>

      <div class="card" id="card2">
        <img class="cardFamily" src="src/images/cards/brain-solid.svg">
        <h3 class="title">Pascale <br>
          Fontaine
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#at" class="card-activity-link">Art-Thérapie</a>
          </li>
        </ul>

        <div class="circle">
          <img class="circleImage" src="src/images/profiles/PF-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#pf">Voir plus</a>
      </div>

      <div class="card" id="card2">
        <img class="cardFamily" src="src/images/cards/brain-solid.svg">
        <h3 class="title">Émilie<br>
        Lefèvre
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#sr" class="card-activity-link">Sophro-Relaxation</a>
          </li>
        </ul>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/EL-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#el">Voir plus</a>
      </div>

      <!-- <div class="card" id="card2">
        <img class="cardFamily" src="src/images/cards/brain-solid.svg">
        <h3 class="title">Audrey <br>
          Haziza
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#ra" class="card-activity-link">Relations à l’alimentation</a>
          </li>
        </ul>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/AH-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#ah">Voir plus</a>
      </div> -->








    </div>

    <div class="container">

      <div class="card" id="card1">
        <img class="cardFamily" src="src/images/cards/person-hiking-solid.svg">
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/MK-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <h3 class="title">Mathieu <br>
          Kaminski
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>

        <ul class="card-activity-list">
          <li>
            <a href="activites.php#apa" class="card-activity-link">Activité physique adaptée</a>
          </li>
        </ul>
        <a class="see-more" href="presentation.php#mk">Voir plus</a>
      </div>


      <div class="card" id="card1">
        <img class="cardFamily" src="src/images/cards/person-hiking-solid.svg">
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/SL1-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <h3 class="title">Sylvie <br>
          Lamouroux
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>

        <ul class="card-activity-list">
          <li>
            <a href="activites.php#ebe" class="card-activity-link">Étirements Bien-être</a>
          </li>
        </ul>
        <a class="see-more" href="presentation.php#sla">Voir plus</a>
      </div>

      <div class="card" id="card1">
        <img class="cardFamily" src="src/images/cards/person-hiking-solid.svg">
        <h3 class="title">Sylvie <br>
          Legiemble
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#mb" class="card-activity-link">Bungypump</a>
          </li>
          <li>
            <a href="activites.php#fb" class="card-activity-link">Fitball</a>
          </li>
        </ul>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/SL2-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#sl">Voir plus</a>
      </div>




    </div>


    <div class="container">
      <div class="card" id="card4">
        <img class="cardFamily" src="src/images/cards/seedling-solid.svg">
        <h3 class="title">Dominique<br>
          Rousseau
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>

        <ul class="card-activity-list">
          <li>
            <a href="activites.php#as" class="card-activity-link">Alimentation santé</a>
          </li>
        </ul>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/DR-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke4" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#dr">Voir plus</a>
      </div>

      <div class="card" id="card2">
        <img class="cardFamily" src="src/images/cards/brain-solid.svg">
        <h3 class="title">Véronique <br>
          Vicat
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <ul class="card-activity-list">
          <li>
            <a href="activites.php#hy" class="card-activity-link">Hypnose</a>
          </li>
        </ul>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/VV-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a class="see-more" href="presentation.php#vv">Voir plus</a>
      </div>

      <!-- <div class="card" id="card4">
        <img class="cardFamily" src="src/images/cards/seedling-solid.svg">
        <h3 class="title">Dominique<br>
          Rousseau
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <h1>Alimentation</h1>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/DR-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke4" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a href="presentation.php#dr">Voir plus</a>
      </div> -->

      <!-- <div class="card" id="card4">
        <img class="cardFamily" src="src/images/cards/calculator-solid.svg">
        <h3 class="title">Morgane <br>
          Delbart
        </h3>
        <div class="animatedBar">
          <div class="emptybar"></div>
          <div class="filledbar"></div>
        </div>
        <h1>Trésorerie</h1>
        <div class="circle">
          <img class="circleImage" src="src/images/profiles/MG-profile.jpg">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <circle id="stroke4" class="stroke" cx="60" cy="60" r="48" />
          </svg>
        </div>
        <a href="presentation.php#md">Voir plus</a> 
      </div> -->

    </div>




    <!-- <div class="pres_background"></div> -->



    <div class="global_pres_container">
      <div style="margin-top: 150px;" class="pres">
        <p class="pres_sentence">
          Élan Santé est une association Loi 1901 basée à L’Isle-Adam (95290).<br><br><br>
          Contact : elansante95@gmail.com
        </p>

        <a name="sponsor"></a>
        <div id="pres_container_sponsor">

          <div class="sponsor_title">
            <h1>Nos partenaires : </h1>
          </div>
          <div class="sponsor_container">
            <a><img src="src/images/logos/logo_cm.png" alt="Crédit mutuel"></a>
            <a><img src="src/images/logos/adps-logo.png" alt="ADPS"></a>
            <a><img src="src/images/logos/logo_cf.jpeg" alt="Conférence des financeurs"></a>
          </div>
        </div>
      </div>
      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="bc"></a>
        <div class="pres_indiv_container" id="pres_container_sr">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/BC-profile.jpeg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>BENOIT <br>
              CHEVOJON
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>
            Je suis praticien Shiatsu en cabinet à l’Isle-Adam. Le Shiatsu est une discipline manuelle, naturelle, douce, pour corriger les déséquilibres énergétiques et reçue souvent de façon préventive. <br><br>
            Ce qui m’anime, c’est de contribuer par le Shiatsu et au sein d'Elan Santé, à faire prendre conscience de l’importance de prendre en charge sa santé, de son écoute intime de soi, d’agir en prévention, d’harmoniser le corps, l’esprit, les émotions, de prendre du temps pour Soi. 
            <br><br>Offrir du mieux-être par le toucher, par l’écoute active, et faire confiance aux capacités naturelles de notre corps pour retrouver l’équilibre, le centrage.
            </h2>

            <!-- <div class="more">
              Je suis membre d'Élan Santé depuis 4 ans et je participe à l'organisation des ateliers et conférences.
              Les ateliers que je proposerai ponctuellement entrent dans le cadre du mieux-être physique et
              psychologique.
            </div>
            <span class="show-more">Voir plus...</span>
            <span class="show-less" style="display: none;"><br>Voir moins...</span> -->
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Shiatsu Familial</span>
                  <span class="time-wrapper"><span class="time">2019</span></span>
                </div>
                <div class="desc">École EST Paris</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Shiatsu Traditionnel</span>
                  <span class="time-wrapper"><span class="time">2021</span></span>
                </div>
                <div class="desc">École EST Paris</div>
              </div>
            </li>
            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Shiatsu Thérapeutique</span>
                  <span class="time-wrapper"><span class="time">2022</span></span>
                </div>
                <div class="desc">École EST Paris</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Stages thématiques, Ryoho Shiatsu School</span>
                  <span class="time-wrapper"><span class="time">2019-2024</span></span>
                </div>
              </div>
            </li>
          </ul>

          <a class="indiv-activity" href="activites.php#sh">Activité : Shiatsu / Do-In</a>
        </div>
      </div>
      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="pf"></a>
        <div class="pres_indiv_container" id="pres_container_sr">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/PF-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>PASCALE <br>
              FONTAINE
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>J'adhère complètement aux principes de l'association qui propose d'être acteur de sa santé par des
              actions préventives et de maintien de notre "capital santé".</h2>

            <div class="more">
              Je suis membre d'Élan Santé depuis 4 ans et je participe à l'organisation des ateliers et conférences.
              Les ateliers que je proposerai ponctuellement entrent dans le cadre du mieux-être physique et
              psychologique.
            </div>
            <span class="show-more">Voir plus...</span>
            <span class="show-less" style="display: none;"><br>Voir moins...</span>
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme d'infirmière DE</span>
                  <span class="time-wrapper"><span class="time">1983</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme d'Infirmière Bloc Opératoire</span>
                  <span class="time-wrapper"><span class="time">1990</span></span>
                </div>
              </div>
            </li>
            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Certif. d'Art-therapie, Carnet de deuil, Journal Créatif.</span>
                  <span class="time-wrapper"><span class="time">2017-2020</span></span>
                </div>
              </div>
            </li>
          </ul>

          <a class="indiv-activity" href="activites.php#at">Activité : Art-Thérapie</a>
        </div>
      </div>

      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="el"></a>
        <div class="pres_indiv_container" id="pres_container_sr">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/EL-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>ÉMILIE <br>
              LEFÉVRE
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>La sophrologie et la relaxation aident à s'offrir un temps privilégié à travers la respiration, la détente corporelle et la visualisation pour :</h2><br><br>
            </h3>-Évacuer ses tensions internes (corporelles et mentales) <br>
-Évacuer ses émotions négatives et se remplir de positif<br>
-Vivre le moment présent pour calmer le mental et développer le bien-être<br>
-Découvrir son corps, ses sens et son esprit dans la sérénité<br>
-Harmoniser son corps et son esprit<br>
-Développer sa concentration et sa mémoire</h3>
</div>
            <!-- <div class="more">
              J’interviens auprès des particuliers (enfants, adolescents et adultes), en milieu scolaire, et en
              entreprise à L’Isle-Adam, Parmain et dans tout le Val d’Oise. Je suis certifiée en sophrologie depuis
              décembre 2017, après 2 ans de formation au CEAS
              Paris. Je me suis spécialisée autour des problématiques liées à l’enfance, à l’adolescence, au
              sommeil, à la douleur et aussi pour accompagner les personnes atteintes du
              cancer.<br><br>
              Je suis animée par la nécessité de transmettre des outils qui permettent à chacun d’être acteur de sa
              santé et de son bien-être.
            </div>
            <span class="show-more">Voir plus...</span>
            <span class="show-less" style="display: none;"><br>Voir moins...</span>
          

          <a class="indiv_website" href="https://sentier-sophro.fr/" target="_blank">Visiter le site web :
            sentier-sophro.fr</a> -->

          <!-- <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Formation au CEAS Paris</span>
                  <span class="time-wrapper"><span class="time">2015</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Certification de sophrologie</span>
                  <span class="time-wrapper"><span class="time">2017</span></span>
                </div>
              </div>
            </li>
          </ul> -->

          <a class="indiv-activity" href="activites.php#sr">Activité : Sophro-Relaxation</a>

        </div>
      </div>


      <!-- <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="ah"></a>
        <div class="pres_indiv_container" id="pres_container_alim">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/AH-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke4" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label" name="dr-pres">
            <h1>
              AUDREY <br>
              HAZIZA
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>J'ai rejoint Élan Santé pour partager autour de la cognition, du comportement, des émotions. Rejetons
              les
              idées reçues et essayons ensemble de mieux comprendre ce qui nous anime, nous pousse à agir. Construisons
              ensemble une notion de bien-être qui correspond à chacun.</h2>
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Formation TSA</span>
                  <span class="time-wrapper"><span class="time">2022</span></span>
                </div>
                <div class="desc">(Troubles du Spectre Autistique)</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Master de psychologie</span>
                  <span class="time-wrapper"><span class="time">2020</span></span>
                </div>
                <div class="desc">(Spécialisation Neuropsychologie)</div>
              </div>
            </li>

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Licence de psychologie</span>
                  <span class="time-wrapper"><span class="time">2018</span></span>
                </div>
              </div>
            </li>

          </ul>
          <a class="indiv-activity" href="activites.php#ra">Activité : Relations à l'alimentation</a>

        </div>
      </div> -->

      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="mk"></a>
        <div class="pres_indiv_container" id="pres_container_ap">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/MK-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label" name="dr-pres">
            <h1>MATHIEU <br>
              KAMINSKI
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>Ce qui m’anime : permettre au plus grand nombre de mettre en place une bonne hygiène de vie en
              jouant sur la Tête, l’Assiette et les Basket.</h2>
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Licence STAPS</span>
                  <span class="time-wrapper"><span class="time">2016</span></span>
                </div>
                <div class="desc">(Spécialisation Activité Physique Adaptée à la Santé)</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Certif. Education Thérapeutique du patient</span>
                  <span class="time-wrapper"><span class="time">2016</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Pilates Matwork 1</span>
                  <span class="time-wrapper"><span class="time">2018</span></span>
                </div>
              </div>
            </li>
            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Boxing instructor</span>
                  <span class="time-wrapper"><span class="time">2018</span></span>
                </div>
              </div>
            </li>
            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Certification NASM1</span>
                  <span class="time-wrapper"><span class="time">2020</span></span>
                </div>
                <div class="desc">(National Academy Of Sports Medecine)</div>
              </div>
            </li>
            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Certification coaching mental</span>
                  <span class="time-wrapper"><span class="time">2022</span></span>
                </div>
              </div>
            </li>

          </ul>
          <a class="indiv-activity" href="activites.php#apa">Activité : Activité physique adaptée</a>

        </div>
      </div>

      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">


      <div class="pres">
        <a name="sla"></a>
        <div class="pres_indiv_container" id="pres_container_ap">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/SL1-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>SYLVIE <br>
              LAMOUROUX
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>Ce qui m'anime : donner à chacun.e l'envie de se mouvoir tout en acceptant son corps et ses limites avec
              bienveillance et sans jugement.</h2>
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme d'éducateur sportif</span>
                  <span class="time-wrapper"><span class="time">2021</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Certification sport-santé Prescri'forme</span>
                  <span class="time-wrapper"><span class="time">2022</span></span>
                </div>
              </div>
            </li>
          </ul>

          <a class="indiv-activity" href="activites.php#ebe">Activité : Étirements Bien-être</a>

        </div>
      </div>
      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="sl"></a>
        <div class="pres_indiv_container" id="pres_container_ap">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/SL2-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke1" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label" name="dr-pres">
            <h1>SYLVIE <br>
              LEGIEMBLE
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>Ce qui m’anime, c’est d’apporter les clés de la santé par l’activité physique, de redonner confiance
              et l’envie de (re) prendre sa vie en main, par une pratique juste et à la hauteur de ses possibilités.
            </h2>

            <div class="more">
              J’anime régulièrement des stages en dehors des cours hebdomadaires dans différentes pratiques
              car je suis formée au Fitball (ou Swissball), à la marche nordique et au BungyPump.
            </div>
            <span class="show-more">Voir plus...</span>
            <span class="show-less" style="display: none;"><br>Voir moins...</span>
          </div>

          <ul class="timeline">
            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme d’animatrice pour adultes de la FFEPGV</span>
                  <span class="time-wrapper"><span class="time">1988</span></span>
                </div>
                <div class="desc">(Fédération Française d’Education Physique et
                  Gymnastique Volontaire)</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme du BEESAPT</span>
                  <span class="time-wrapper"><span class="time">1995</span></span>
                </div>
                <div class="desc">(Brevet d&#39;État d&#39;éducateur sportif en activités physiques pour tous)</div>
              </div>
            </li>

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Certifications FFEPGV</span>
                  <span class="time-wrapper"><span class="time">1998 à 2017</span></span>
                </div>
                <div class="desc">Gym BB, Acti’March, Gym’Oxygène, Pilates, Atelier
                  Gym’Mémoire, Atelier Gym’Equilibre; APA (activité physique adaptée) Gym’Après Cancer, Obésité</div>
              </div>
            </li>


          </ul>
          <a href="activites.php#mb" class="indiv-activity-extra">Activités :<br><br> Marche BungyPump</a><br> <a
            href="activites.php#fb" class="indiv-activity-extra">Atelier Fitball</a>

        </div>
      </div>

      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">

      <div class="pres">
        <a name="dr"></a>
        <div class="pres_indiv_container" id="pres_container_alim">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/DR-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke4" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>DOMINIQUE <br>
              RICHIER-ROUSSEAU
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>Ce qui m’anime c’est d’apporter les informations pertinentes pour mettre en place une alimentation
              protectrice pour la santé : notre santé commence dans notre assiette !</h2>

            <div class="more">
              Pour cela, mieux connaître les liens entre alimentation et santé est la base ; beaucoup d’informations
              erronées (fake news) sont diffusées largement. Or il faut être bien informé pour agir positivement sur son
              alimentation, avec un bénéfice réel pour son bien-être. J’interviens lors d’ateliers thématiques sur
              l’alimentation, et également auprès de différentes structures (mairies, écoles …) pour expliquer les
              principes d’une alimentation santé.
            </div>
            <span class="show-more">Voir plus...</span>
            <span class="show-less" style="display: none;"><br>Voir moins...</span>

          </div>
          <a class="indiv_website" href="https://micronutrition95.fr/" target="_blank">Visiter le site web :
            micronutrition95.fr</a>


          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">DU de Micronutrition et Alimentation santé</span>
                  <span class="time-wrapper"><span class="time">2014</span></span>
                </div>
                <div class="desc">(Diplôme Universitaire)</div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Docteur en pharmacie</span>
                  <span class="time-wrapper"><span class="time">1992</span></span>
                </div>
              </div>
            </li>
          </ul>

          <a class="indiv-activity" href="activites.php#as">Activité : Alimentation santé</a>

        </div>
      </div>

      <hr style="border: none; margin: 0; border-top: 1px solid rgb(201, 201, 201);">



      <div class="pres">
        <a name="vv"></a>
        <div class="pres_indiv_container" id="pres_container_sr">
          <div class="pres_circle">
            <img class="pres_circleImage" src="src/images/profiles/VV-profile.jpg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
              <circle id="stroke2" class="stroke" cx="60" cy="60" r="48" />
            </svg>
          </div>
          <a class="indiv_name_label">
            <h1>VERONIQUE <br>
              VICAT
            </h1>
          </a>
          <div class="indiv_presentation">
            <h2>Ce qui m’anime :
              Faire découvrir et expérimenter les bienfaits de l’hypnose : reconnection à
              soi-même, meilleure compréhension de soi, apaisement émotionnel,
              activation des ressources intérieures, gestion des pensées parasites pour
              orienter chaque journée vers plus de positif, plus de calme, plus de joie.</h2>
          </div>

          <ul class="timeline">

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Certificat Thérapeute PNL – IDEOdynamique</span>
                  <span class="time-wrapper"><span class="time">Paris 2001</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Technicien en Hypnose éricksonienne</span>
                  <span class="time-wrapper"><span class="time">Chantilly 2018</span></span>
                </div>
              </div>
            </li>

            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Praticien en Hypnose éricksonienne</span>
                  <span class="time-wrapper"><span class="time">Chantilly 2018</span></span>
                </div>
              </div>
            </li>
            <li>
              <div class="direction-l">
                <div class="flag-wrapper">
                  <span class="flag">Diplôme de Pédo-Hypnose</span>
                  <span class="time-wrapper"><span class="time">Québec 2021</span></span>
                </div>
                <div class="desc">AHTQ</div>
              </div>
            </li>
            <li>
              <div class="direction-r">
                <div class="flag-wrapper">
                  <span class="flag">Formation en Pédo-Hypnose</span>
                  <span class="time-wrapper"><span class="time">AB Formation 2022</span></span>
                </div>
              </div>
            </li>


          </ul>

          <div class="indiv_presentation">
            <h2>Thérapeute PNL et Hypnose - 9 ans d&#39;expérience</h2>
          </div>

          <a class="indiv-activity" href="activites.php#hy">Activité : Hypnose</a>

        </div>
      </div>

    </div>

    <script>

      const showMoreButtons = Array.from(document.querySelectorAll('.pres'));


      showMoreButtons.forEach(item => {
        var showMoreButton = item.querySelector('.show-more');
        var showLessButton = item.querySelector('.show-less');
        var moreText = item.querySelector('.more');

        if (showMoreButton && showLessButton && moreText) {
          showMoreButton.addEventListener('click', function () {
            moreText.style.display = 'flex';
            showMoreButton.style.display = 'none';
            showLessButton.style.display = 'inline';
          });

          showLessButton.addEventListener('click', function () {
            moreText.style.display = 'none';
            showMoreButton.style.display = 'inline';
            showLessButton.style.display = 'none';
          });
        }

      });

      document.addEventListener("DOMContentLoaded", function () {
        // Function to adjust circle size based on window dimensions
        function adjustCircleSize() {
          // Get all circle elements with class .stroke
          const circles = document.querySelectorAll(".stroke");

          // Determine the desired radius based on window size
          const radius = (window.innerWidth < 560 || window.innerHeight < 800) ? "38" : "48";

          // Loop through each circle and update its r attribute
          circles.forEach(circle => {
            circle.setAttribute("r", radius);
          });
        }

        // Call the function on page load
        adjustCircleSize();

        // Add a resize event listener to call the function when window size changes
        window.addEventListener("resize", adjustCircleSize);
      });


    </script>
    <script src="app/loader.js"></script>

<?php
    include_once 'footer.php';
?>