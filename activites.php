<?php
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Activités - Élan Santé</title>
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <script src="https://kit.fontawesome.com/5c4b16e6c8.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/font.css">
  <link rel="stylesheet" href="style/style1.css">
  <link rel="stylesheet" href="style/activity.css">
</head>

<?php
    include_once 'navbar.php';
?>

  <div id="page_container">

    <div id="sidebar">
      <nav>
        <ul>
          <li><h1>Activité physique :</h1></li>
          <li><a href="#apa" onclick="javascript: openActivity('apa')" data-target="apa">Activité Physique Adaptée</a></li>
          <li><a href="#ebe" onclick="javascript: openActivity('ebe')" data-target="ebe">Étirements Bien-Être</a></li>
          <li><a href="#mb" onclick="javascript: openActivity('mb')" data-target="mb">Marche Bungypump</a></li>
          <li><a href="#fb" onclick="javascript: openActivity('fb')" data-target="fb">Fitball</a></li>
          <li><h1>Bien-être :</h1></li>
          <li><a href="#sr" onclick="javascript: openActivity('sr')" data-target="sr">Sophro-Relaxation</a></li>
          <li><a href="#aromachologie" onclick="javascript: openActivity('aromachologie')" data-target="aromachologie">Aromachologie</a></li>
          <!-- <li><a href="#pc" onclick="javascript: openActivity('pc')" data-target="pc">Pleine Conscience</a></li> -->
          <li><a href="#hy" onclick="javascript: openActivity('hy')" data-target="hy">Hypnose</a></li>
          <li><a href="#sh" onclick="javascript: openActivity('sh')" data-target="sh">Shiatsu / Do-In</a></li>
          <!-- <li><a href="#at" onclick="javascript: openActivity('at')" data-target="at">Art-Thérapie</a></li> -->
          <li><a href="#ate" onclick="javascript: openActivity('ate')" data-target="ate">Art-thérapie évolutive</a></li>

          <li><h1>Alimentation :</h1></li>
          <li><a href="#as" onclick="javascript: openActivity('as')" data-target="as">Alimentation Santé</a></li>
          <!-- <li><a href="#ra" onclick="javascript: openActivity('ra')" data-target="ra">Relations à l'alimentation</a></li> -->
        </ul>
      </nav>
    </div>

    <div class="activity-global-container" id="activity-sport">
      <h1 class="activity-global-title">Activité physique</h1>

      <div class="timeline-item sport" id="apa" data-type="sport">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Activité Physique Adaptée</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#mk">Mathieu Kaminski</a></h1>
            <!-- <h3 class="activity-full">Complet</h3> -->
            <h3 class="activity-full couleur-badge-bleu">Hebdomadaire</h3>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-apa">
              <input type="radio" name="radio-btn-apa" id="img-apa-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/photos/apa1.jpg">
                </div>
                <label for="img-apa-4" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-apa-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-apa" id="img-apa-2" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/photos/apa2.jpg">
                </div>
                <label for="img-apa-1" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-apa-3" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-apa" id="img-apa-3" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/photos/apa3.jpg">
                </div>
                <label for="img-apa-2" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-apa-4" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-apa" id="img-apa-4" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/photos/apa4.jpg">
                </div>
                <label for="img-apa-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-apa-1" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Objectif : maintenir sa musculature, son équilibre ainsi que sa mobilité
                et sa souplesse à travers des exercices variés, et ainsi conserver son autonomie. Pour préserver sa
                forme, sa santé et son bien-être, apprendre et comprendre son corps en mouvement. Un moment
                convivial pour «&nbsp;bouger&nbsp;» en sécurité.</p>

              <div class="section-frequency">
                Planning pour 2024/2025 :
                <ul>
                  <li>Mardi 10h à 11h</li>
                  <li>Mardi 15h à 16h</li>
                  <li>Jeudi 10h à 11h</li>
                  <li>Jeudi 15h à 16h</li>
                </ul>
              </div>
              <h2 class="section-tips">(Toute l'année, hors vacances scolaires)</h2>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290 L’Isle
                    Adam</li>
                </ul>
              </div>
              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                  <li>Avoir plus de 60 ans</li>
                  <li>Prévoir une tenue adaptée, un tapis, une serviette et une bouteille d’eau</li>
                  <li>Un questionnaire de santé sera à remplir et à remettre à l'intervenant <br>
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf">Voir le questionnaire</a> ou
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf" download="QUESTIONNAIRE_SANTE">Télécharger</a>
                  </li>
                </ul>
              </div>
              <p class="section-price">Tarif (annuel) : 60€</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>



      <div class="timeline-item sport" id="ebe" data-type="sport">

        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Étirements Bien-Être</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#sla">Sylvie Lamouroux</a></h1>
            <h3 class="activity-full couleur-badge-bleu">Hebdomadaire</h3>
            <!-- <h3 class="activity-full">Complet</h3> -->
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-ebe">
              <input type="radio" name="radio-btn-ebe" id="img-ebe-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/ebe.JPG">
                </div>
                <label for="img-ebe-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-ebe-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Les «&nbsp;étirements bien-être&nbsp;» associent un travail musculaire
                suivi d'étirements doux
                avec des
                exercices de mobilité et d'équilibre. Ils se pratiquent avec une respiration calme et profonde qui
                invite le corps à se relâcher et à se relaxer. Ils permettent de rééquilibrer les postures , de regagner
                de l'amplitude et de la mobilité.</p>

              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Mardi de 11h à 12h</li>
                  <li>Jeudi de 11h à 12h</li>
                  <li>Vendredi de 9h à 10h</li>
                </ul>
              </div>
              <h2 class="section-tips">(Toute l'année, hors vacances scolaires)</h2>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290 L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                  <li>Avoir plus de 60 ans</li>
                  <li>Prévoir une tenue adaptée, un tapis, une serviette et une bouteille d’eau.</li>
                  <li>Un questionnaire de santé sera à remplir et à remettre à l'intervenant <br>
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf">Voir le questionnaire</a> ou
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf" download="QUESTIONNAIRE_SANTE">Télécharger</a>
                  </li>
                </ul>
              </div>

              <p class="section-price">Tarif (année) : 60€</p>

            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>



      <div class="timeline-item sport" id="mb" data-type="sport">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Marche Bungypump</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#sl">Sylvie Legiemble</a></h1>
            <h3 class="activity-full couleur-badge-bleu">Hebdomadaire</h3>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-mb">
              <input type="radio" name="radio-btn-mb" id="img-mb-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/bungypump2.jpg">
                </div>
                <label for="img-mb-2" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-mb-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-mb" id="img-mb-2" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/bungypump1.jpg">
                </div>
                <label for="img-mb-1" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-mb-1" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Ces bâtons spécifiques à résistance demandent peu d’apprentissage
                technique.
                Ludiques et intuitifs par l’effet rebond, ils soulagent le poids du corps de 30% sans charge pour les
                articulations.<br><br>
                La dépense énergétique est supérieure, car elle engage davantage le buste, les bras et les
                abdominaux.<br>
                La séance est progressive, avec un échauffement et se termine par des étirements.
                <br><br>
                Activité adaptée au plus grand nombre : du débutant au sportif chevronné, de la marche douce à
                la marche sportive grâce aux différentes forces de l’élastique de 4 à 10 kg de résistance. Les
                bâtons s’adaptent à toutes les tailles et morphologies.
                <br><br>
                Bénéfices santé : amélioration de la capacité pulmonaire, également liée à la pratique en
                extérieur, et auto-grandissement par une meilleure posture. Détente et bien-être immédiats.
              </p>



              <div class="section-disclaimer">
                <h1>Important :</h1>
                <h2>Séances en extérieur, même en cas de mauvais temps</h2>
                <h2>Equipement conseillé</h2>

                <div class="more">
                  <br>
                  Choisir des vêtements souples adaptés aux conditions météorologiques, « respirants ». <br><br>
                  Privilégier les
                  « sous-couches » (type « pelure d’oignon » pour enlever au fur et à mesure une épaisseur avec le
                  réchauffement du corps et en remettre à l’arrêt de l’activité) .<br><br>
                  Le petit sac à dos (ou banane autour de la ceinture) ne doit pas (ainsi que les vêtements) entraver le
                  mouvement des bras et la prise en main des
                  bâtons avec les gantelets.<br><br>
                  Chaussures souples, respirantes de type « Trail » au rayon « Athlétisme » ou au rayon « Marche
                  Nordique » ; pour votre confort « imperméables » pour l’hiver ! <br><br>
                  Quant aux chaussettes choisissez-les
                  bien
                  aussi pour qu’il n’y ait pas de frottements avec l’échauffement du pied.
                </div>
                <span class="show-more">Voir plus...</span>
                <span class="show-less" style="display: none;"><br>Voir moins...</span>

              </div>


              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Mercredi 14h-15h - BungyPump doux<!-- , peu de distance et contenu adapté aux participants. <br>
                      Séance réservée à celles et ceux qui ont une pathologie qui ne leur permet pas de «forcer», ou qui
                      marchent à moins de 4km/heure<br> --></li>
                  <li>Mercredi 15h15-16h45 - BungyPump de niveau modéré à soutenu<!-- , distance d’environ 5 km
                      (progressif au fur et à mesure de l’année).<br>Pour celles et ceux qui n’ont pas de pathologie
                      handicapante, pouvant marcher environ à 5km/heure.<br> --></li>
                </ul>
              </div>
              <h2 class="section-tips">(Toute l'année, hors vacances scolaires)</h2>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>RDV sur L’Isle-Adam, selon un planning défini à l’avance et envoyé par mail.</li>
                </ul>
              </div>




              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                  <li>Un questionnaire de santé sera à remplir et à remettre à l'intervenant <br>
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf">Voir le questionnaire</a> ou
                    <a href="src/bulletin/QUESTIONNAIRE_SANTE.pdf" download="QUESTIONNAIRE_SANTE">Télécharger</a>
                  </li>
                </ul>
              </div>



              <p class="section-price">Tarif : carte de 5 séances à 50 € ou tarif à l’année : 230 € <br>(30 séances prévues, soit 7 séances offertes par rapport à l’achat de cartes)</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>


      <div class="timeline-item sport" id="fb" data-type="sport">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Fitball</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#sl">Sylvie Legiemble</a></h1>
            <h3 class="activity-full couleur-badge-bleu">Mensuel</h3>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-fb">
              <input type="radio" name="radio-btn-fb" id="img-fb-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/fitball1.JPEG">
                </div>
                <label for="img-fb-4" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-fb-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-fb" id="img-fb-2" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/fitball2.jpg">
                </div>
                <label for="img-fb-1" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-fb-3" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-fb" id="img-fb-3" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/fitball3.jpg">
                </div>
                <label for="img-fb-2" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-fb-1" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Le fitball (ou gymball ou swissball), est un gros ballon souple de
                gymnastique d&#39;un diamètre de
                55 à 75 cm. Il est utilisé chez les kinésithérapeutes pour la rééducation du dos ou pour les femmes
                enceintes. Ludique, ce gros ballon sert tout autant aux étirements, au renforcement musculaire
                qu&#39;au maintien postural.<br><br>
                Intérêt santé : permet de renforcer les muscles profonds posturaux, d’améliorer le tonus
                musculaire par des exercices variés, en utilisant le principe d’instabilité du ballon. Travail de
                l’équilibre, de la posture et de la force sans à-coups, par un apprentissage progressif.
                Séances en petits groupes permettant un accompagnement individualisé.
              </p>

              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Lundi 23/09/2024 - 9h15 à 10h30</li>
                  <li>Lundi 14/10/2024 - 9h15 à 10h30</li>
                  <li>Lundi 18/11/2024 - 9h15 à 10h30</li>
                  <li>Lundi 16/12/2024 - 9h15 à 10h30</li>
                  <li>Lundi 13/01/2025 - 9h15 à 10h30</li>
                  <li>Lundi 3/02/2025  - 9h15 à 10h30</li>
                  <li>Lundi 10/03/2025 - 9h15 à 10h30</li>
                  <li>Lundi 31/03/2025 - 9h15 à 10h30</li>
                  <li>Lundi 12/05/2025 - 9h15 à 10h30</li>
                  <li>Lundi 16/06/2025 - 9h15 à 10h30</li>
                </ul>
              </div>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle au rez-de-chaussée de l’Espace Culturel, 1 chemin Pierre Terver, L’Isle Adam</li>
                </ul>
              </div>




              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                  <li>Apporter un ballon personnel (sauf en cas d’essai préalable)</li>
                  <li>Apporter une serviette, et une tenue souple avec des baskets propres.</li>
                </ul>
              </div>



              <p class="section-price">Tarif : 120 € les 10 séances<br> Séances d’essai possibles le 23/09 ou le 14/10.</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>
    </div>

    <div class="activity-global-container" id="activity-mind">
      <h1 class="activity-global-title">Bien-être</h1>

      <div class="timeline-item mind" id="sr" data-type="mind">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Sophro-Relaxation</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#el">Émilie Lefèvre</a></h1>
            <h3 class="activity-full couleur-badge-bleu">Hebdomadaire</h3>
          </div>
  
          <div class="activity-image">
            <ul class="activity-image-body" id="galery-sr">
              <input type="radio" name="radio-btn-sr" id="img-sr-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/sophro.jpg">
                </div>
                <label for="img-sr-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-sr-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>
        

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Les ateliers de Sophro-relaxation sont une occasion de s’offrir un temps
                pour : </p>
              <ul class="section-description-ul">
                <li>&nbsp;• Relâcher les tensions physiques et mentales</li>
                <li>&nbsp;• Mieux respirer et vivre sereinement ses émotions</li>
                <li>&nbsp;• Amplifier son bien- être et sa sérénité</li>
                <li>&nbsp;• S’évader et positiver en utilisation son imagination</li>
              </ul>

              <p class="section-description">La Sophrologie utilise des outils accessibles à tous, respiration,
                relaxation en mouvement et
                visualisation positive. Il suffit d’une chaise pour la pratique. <br>
                La sophrologie s’adresse à tous à l’exception des personnes atteintes de maladies liées à une
                altération de la conscience (ex : schizophrénie, maniaco-dépressif, …).</p>

              <!--  <p class="section-frequency">Planning : cours d’1H30 le vendredi après-midi hors périodes de vacances
                scolaires.
                Séance d’essai possible toute l’année sur demande.</p> -->
              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Lundi de 15h30 à 16h30</li> <!-- A CHANGER -->
                </ul>
              </div>
              <h2 class="section-tips">(Toute l'année, hors vacances scolaires)</h2>
              <div class="section-place">
                Lieu :
                <ul>
                  <li>Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290 L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                  <li>Avoir plus de 60 ans</li>
                </ul>
              </div>
              <p class="section-price">Tarif (année) : 60€</p>


            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>



      <!-- <div class="timeline-item mind" id="pc" data-type="mind">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Méditation de pleine conscience</h1>
            <h1 class="activity-presentator">Par : <a href="">Caroline Reverdy-Bazin</a></h1>
          </div>
        </div>
        

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Qu’est-ce que la pleine conscience ? Pourquoi et comment méditer ? Quelques
                heures pour
                expérimenter la méditation de pleine conscience et ainsi se familiariser avec cette pratique millénaire
                pour peut-être développer l’envie d’aller plus loin dans cette découverte du fonctionnement de soi, de
                ses pensées, de ses émotions, du lien corps esprit avec tous les bénéfices qui peuvent en découler.</p>

              <a href="https://www.etreenpleineconscience.fr/">https://www.etreenpleineconscience.fr/</a>
              <br>
              <br>
              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Lundi 08/01/2024 de 17H30 à 19H</li>
                  <li>Lundi 05/02/2024 de 17H30 à 19H</li>
                </ul>
              </div>


              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle cours 2, premier étage, Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290
                    L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Être adhérent</li>
                  <li>Afin de favoriser l’interactivité, le groupe est de 8 personnes maximum.</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 20 €/atelier</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div> -->
      <div class="timeline-item mind" id="aromachologie" data-type="mind">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Aromachologie</h1>
            <h1 class="activity-presentator">Avec : Marie-Ange Guillemet</h1>
            <h3 class="activity-full couleur-badge-saumon">Ponctuel</h3>
          </div>
          <div class="activity-image">
            <ul class="activity-image-body" id="galery-aromachologie">
              <input type="radio" name="radio-btn-aromachologie" id="img-aromachologie-1" checked />
              <li class="img-container">
                <div id="img-inner">
                <img src="src/images/activity/Olfaction-Flower-Illustration.jpeg">
                </div>
                <label for="img-aromachologie-2" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-aromachologie-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-aromachologie" id="img-aromachologie-2" checked />
              <li class="img-container">
                <div id="img-inner">
                <img src="src/images/activity/Aromachologie-illustration.jpeg">
                </div>
                <label for="img-aromachologie-1" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-aromachologie-1" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>
        

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">
              Vous connaissez certainement les huiles essentielles mais savez-vous comment les utiliser efficacement et
              lesquelles sélectionner en fonction de vos besoins ? 
              </p><p class="section-description">
              Savez-vous que ces mêmes huiles essentielles, via l’olfaction peuvent vous aider à mieux gérer votre stress et votre état psycho-émotionnel ?
              </p>
              <p class="section-description">
              Ce qui m’anime : former et conseiller en partageant mes connaissances et ma passion pour les huiles essentielles : j’ai suivi une formation en aromathérapie, et ai un diplôme universitaire en phyto-aromathérapie. Ainsi, je suis qualifiée pour accompagner aussi bien les adultes que les enfants. Je vous propose des ateliers vous permettant de découvrir l’utilisation des huiles essentielles dans différents domaines, et de réaliser une formule personnelle. 
              </p>

              <br>
              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Lundi 7 octobre 2024 de 17h à 18h30 : Un hiver tranquille vous attend grâce aux huiles essentielles <br>
                  Réalisation d'un roll-on (5 ml)<br><br>
                </li>

                  <li>Lundi 2 décembre 2024 de 17h à 18h30 : Découverte de l'aromachologie (ou olfactothérapie) et de ses bienfaits sur la sphère émotionnelle <br>
                  Réalisation d'un stick olfactif<br><br>
                  </li>

                  <li>Lundi 10 février 2025 de 17h à 18h30 : Favoriser une bonne digestion avec les huiles essentielles <br>
                  Réalisation d'une huile de massage (10 ml)<br><br></li>

                  <li>Lundi 7 avril 2025 de 17h à 18h30 : Quelles huiles végétales et quelles huiles essentielles pour les peaux matures ?<br> 
                  Réalisation d'un sérum (20 ml)<br><br>
                  </li>
                </ul>
              </div>


              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle cours 1, premier étage, Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290
                    L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Être adhérent</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 25 € - L’atelier est en petit groupe de 4 personnes et le matériel est inclus.</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>

      <div class="timeline-item mind" id="hy" data-type="mind">
        <div class="activity-data">
          <h1 class="activity-title">Hypnose</h1>
          <h1 class="activity-presentator">Avec : <a href="presentation.php#vv">Véronique Vicat</a></h1>
          <h3 class="activity-full couleur-badge-saumon">Ponctuel</h3>

        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">L’objectif n’est pas de faire de la thérapie, ni individuelle, ni de
                groupe.
                Mais simplement, expérimenter et apprécier ensemble cet état naturel qu’est
                l’hypnose (que nous traversons plusieurs fois par jour, sans le savoir !) et
                réaliser que les solutions sont en nous.
                Chaque atelier commence par des questions/réponses sur l’hypnose et le
                thème que l’on abordera.</p>

              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Vendredi 18/10/2024 de 14h30 à 16h : Réduire son stress</li>

                  <li>Vendredi 13/12/2024 de 14h30 à 16h : Lâcher prise</li>

                  <li>Vendredi 7/02/2025 de 14h30 à 16h : Confiance en soi et dans la vie</li>

                  <li>Vendredi 11/04/2025 de 14h30 à 16h : Retrouver son énergie</li>

                  <li>Vendredi 13/06/2025 de 14h30 à 16h : Oser</li>
                </ul>
              </div>

              <div class="section-place">
                Lieu :
                <ul>
                <li>Salle les Chênes, la Faisanderie, 1 avenue P . Thoureau, 95290
                    L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Être adhérent</li>
                  <li>L’atelier est accessible à tout public, en capacité de s’allonger par terre.</li>
                  <li>Afin de favoriser l’interactivité, le groupe est de 8 personnes maximum.</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 20 €/atelier</p>


            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>


      <div class="timeline-item mind" id="sh" data-type="mind">

        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Shiatsu / Do-In</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#bc">Benoit Chevojon</a></h1>
            <h3 class="activity-full couleur-badge-saumon">Ponctuel</h3>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-sh">
              <input type="radio" name="radio-btn-sh" id="img-sh-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/shiatsu1.jpeg">
                </div>
                <label for="img-sh-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-sh-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-sh" id="img-sh-2" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/shiatsu2.jpeg">
                </div>
                <label for="img-sh-1" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-sh-3" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>

              <input type="radio" name="radio-btn-sh" id="img-sh-3" />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/shiatsu3.jpeg">
                </div>
                <label for="img-sh-2" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-sh-1" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>


            </ul>
          </div>
        </div>


        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <div class="section-description">
              Le Do-In est une technique d’auto-massage issue de la médecine traditionnelle chinoise, utilisant des gestes simples de digitopression à faire sur soi pour favoriser la bonne circulation de notre énergie et ainsi rester en forme. 
              </div>
              <div class="section-description">
              L'atelier propose de pratiquer ensemble et de découvrir un déroulé que vous pourrez vous offrir chez vous au quotidien pour un regain général d'énergie.
              </div>


              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Mardi 12 novembre 2024 de 18h30 à 20h</li>
                  <li>Mardi 4 février 2025 de 18h30 à 20h</li>
                  <li>Mardi 6 mai 2025 de 18h30 à 20h</li>
                </ul>
              </div>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle cours 1, premier étage, Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290
                    L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Être adhérent</li>
                  <li>Afin de favoriser l’interactivité, le groupe est de 8 personnes maximum.</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 20 €/atelier</p>


            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>

      

      <div class="timeline-item mind" id="ate" data-type="mind">

        <div class="activity-header">
          
          <div class="activity-data">
            <h1 class="activity-title">Art-thérapie Évolutive</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#pf">Pascale Fontaine</a></h1>
            <h3 class="activity-full couleur-badge-saumon">Ponctuel</h3>
          </div>

          
        </div>


        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
            <div class="section-description">
            Comment le dessin nous parle t-il ? Quelle transformation nous propose t-il ?
                </div>

            <div class="section-description">
Le dessin est une information qui vient de la psyché et qui est inscrite sur le papier sous la forme de symboles. Tout ce qui est tracé peut être révélateur : un personnage, un animal, un élément de la nature, une couleur… Tout parle de soi et de son rapport à la vie.
Le dessin est libérateur s’il permet de déposer ses traumatismes, ses mémoires douloureuses et conscientes. Il est également possible de libérer des mémoires inconscientes qui se révèlent par le dessin et son analyse. La transformation ou destruction viendra après l’ analyse et la conscientisation de l’information.
               
Le dessinateur est toujours accompagné par le thérapeute dans toutes les étapes du processus de libération et de transformation, les symboles guérisseurs sont proposés par le thérapeute et choisis par la personne accompagnée, ils auront ainsi un sens symbolique pour elle.
            </div>
            
            <div class="section-description">
            Pourquoi pratiquer en groupe ?
            </div>
            <div class="section-description">
L’accompagnement en ATE se fait en individuel ou en groupe.
En groupe, ce qui est conscientisé pour l’un l’est pour les autres, par résonance émotionnelle et énergétique et effet miroir.
L’énergie du groupe est une force et permet d’ancrer puissamment dans la psyché les qualités élévatrices.
Les deux possibilités d’accompagnement permettent d’avancer sur le chemin du bien-être, car lorsqu’un symbole apparait, c’est toujours une proposition à se libérer et à aller vers une qualité créatrice de vitalité.

            </div>


              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Vendredi 27/09/2024 de 14h à 16h : Découverte de l’art thérapie évolutive</li>
                  <li>Vendredi 11/10/2024 de 14h à 16h : Gestion des émotions</li>
                  <li>Vendredi 6/12/2024 de 14h à 16h : La confiance en soi</li>
                  <li>Vendredi 24/01/2025 de 14h à 16h : Les symboles élévateurs</li>
                </ul>
              </div>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle les Chênes, la Faisanderie, 1 avenue P . Thoureau, 95290
                    L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Conditions requises :
                <ul>
                  <li>Être adhérent</li>
                </ul>
              </div>
              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Aucune aptitude en dessin n’est nécessaire</li>
                  <li>Matériel fourni</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 20 €/atelier sauf l’atelier découverte du 27/09 : 10 €</p>


            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>

    </div>



    <div class="activity-global-container" id="activity-food">
      <h1 class="activity-global-title">Alimentation</h1>

      <div class="timeline-item food" id="as" data-type="food">

        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Alimentation santé</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#dr">Dominique Rousseau</a></h1>
            <h3 class="activity-full couleur-badge-saumon">Ponctuel</h3>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-as">
              <input type="radio" name="radio-btn-as" id="img-as-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/alim_sante.png">
                </div>
                <label for="img-as-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-as-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">
                En matière d’alimentation, nous avons tous des idées reçues et des habitudes.<br>
                Pour faire évoluer son alimentation, bien s’informer est nécessaire. <br>
                Je propose des ateliers thématiques pour s'approprier les bases de l'alimentation santé.
              </p>
              
              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Atelier 1 : <br>
                  Le régime méditerranéen est-il le meilleur pour la santé ? Quels bénéfices et comment l’adopter au quotidien. <br><br>
                  lundi 25/11/2024 de 17h à 18h30 <br>
                  lundi 31/03/25 de 17h à 18h30 <br>
                  <br>
                  </li>
                  <li>Atelier 2 : <br>
                  Equilibre acido-basique : comprendre les principes et comment améliorer cet équilibre<br><br>
                  lundi 20/01/25 de 17h à 18h30<br>
                  </li>
                </ul>
              </div>

              <div class="section-place">
                Lieu :
                <ul>
                  <li>Salle cours 1, premier étage, Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290 L’Isle
                    Adam</li>
                </ul>
              </div>

              <div class="section-conditions">
                Informations complémentaires :
                <ul>
                  <li>Être adhérent</li>
                  <li>Afin de favoriser l’interactivité, le groupe est de 8 personnes maximum.</li>
                </ul>
              </div>

              <p class="section-price">Tarif : 20 €/atelier</p>
              <br>
              <span style="display: flex; flex-wrap: nowrap; margin-top: 15px;">
                <h4 style="border: solid 1px #999; border-radius: 20px; padding: 3px 5px; width: fit-content; color: red;">Nouveau</h4>
                <h1 style="margin: 4px 0 0 5px;"><bold>Newsletter alimentation santé : </bold> <br></h1>
              </span>
              <p class="section-description">
                Une newsletter qui vous apporte des connaissances utiles pour avoir de bons réflexes en nutrition, décrypte les informations sur les aliments et analyse un message délivré par les médias. Envoyée par mail.
              </p>
              <p class="section-description">
                Contenu de chaque newsletter :
                <ul class="section-description-ul">
                  <li>&nbsp;• Un article sur une thématique alimentaire </li>
                  <li>&nbsp;• Un aliment à la loupe </li>
                  <li>&nbsp;• Un nutriment expliqué</li>
                  <li>&nbsp;• Un site d’intérêt</li>
                  <li>&nbsp;• Un info ou intox</li>
                </ul>
              </p>
              <p class="section-description">
                Dates newsletter :
                <ul class="section-description-ul">
                  <li>&nbsp;• Octobre</li>
                  <li>&nbsp;• Décembre</li>
                  <li>&nbsp;• Février</li>
                  <li>&nbsp;• Avril</li>
                  <li>&nbsp;• Juin</li>
                </ul>
              </p>
              <p class="section-description">Tarif des 5 newsletters  : 20 €</p>
            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div>



      <!-- <div class="timeline-item food" id="ra" data-type="food">
        <div class="activity-header">
          <div class="activity-data">
            <h1 class="activity-title">Relations à l'alimentation</h1>
            <h1 class="activity-presentator">Avec : <a href="presentation.php#ah">Audrey Haziza</a><br> et
              <a href="presentation.php#dr">Dominique Rousseau</a>
            </h1>
          </div>

          <div class="activity-image">
            <ul class="activity-image-body" id="galery-ra">
              <input type="radio" name="radio-btn-ra" id="img-ra-1" checked />
              <li class="img-container">
                <div id="img-inner">
                  <img src="src/images/activity/comportement_alimentaire.jpeg">
                </div>
                <label for="img-ra-3" class="sb-bignav" title="Précédent">
                  <span class="sb-bignav-icon">&#x2039;</span>
                </label>
                <label for="img-ra-2" class="sb-bignav" title="Suivant">
                  <span class="sb-bignav-icon">&#x203a;</span>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="article-content-wrapper">
          <div class="content-container">
            <div class="content-item full-width">
              <p class="section-description">Atelier d’échanges : « Et si on discutait de notre relation à
                l’alimentation ? » <br>
                Un temps d’échanges avec une psychologue et une micro-nutritionniste, pour
                mieux comprendre les contrôles de la prise alimentaire
                et apprendre à déjouer les idées reçues et les comportements acquis.<br><br>
                Au final : se sentir mieux dans sa tête et son assiette !</p>

              <div class="section-frequency">
                Planning :
                <ul>
                  <li>Samedi 3 février 2024 - de 10h à 12h</li>
                </ul>
              </div>
              <div class="section-place">
                Lieu :
                <ul>
                  <li>Centre Culturel Michel Poniatowski, 1 chemin Pierre Terver, 95290 L’Isle
                    Adam</li>
                </ul>
              </div>
              <p class="section-price">Tarif : 20 €/atelier</p>

            </div>

          </div>

        </div>
        <hr>
        <button class="toggle-content">Voir moins</button>
      </div> -->

    </div>


  </div>

  <script>
    const showMoreButtons = Array.from(document.querySelectorAll('.content-item'));
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
  </script>
  <script src="app/activity1.js"></script>

  <?php
    include_once 'footer.php';
?>
