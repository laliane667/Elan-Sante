    <nav class="navbar">
        <a href="index.php">
            <img id="navbar__logo" src="src/images/logos/logo_accueil.png" alt="logo">
        </a>

        <div class="navbar__container">
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item" id="navbar__linkLogoContainer">
                    <div class="btn-container">
                        <a href="index.php" class="animated-word">ACCUEIL</a>
                    </div>
                </li>
                <li class="navbar__item" id="navbar__linkLogoContainer">
                    <div class="btn-container">
                    <div class="dropdown">
                        <button class="animated-word dropbtn">ACTIVITÉS&nbsp;&&nbsp;INTERVENANTS</button>
                        <div class="dropdown-content">
                        <a href="activites.php">ACTIVITÉS</a>
                        <a href="presentation.php">INTERVENANTS</a>
                        </div>
                      </div>
                    </div> 
                </li>
                <li class="navbar__item">
                    <div class="btn-container">
                        <a href="publications.php" class="animated-word">PUBLICATIONS</a>
                    </div>
                </li>

                <li class="navbar__item">
                    <div class="btn-container">
                        <a href="avis.php" class="animated-word">AVIS</a>
                    </div>
                </li>

                <li class="navbar__item">
                    <div class="btn-container">
                        <a href="adhesion-en-ligne.php" class="animated-word">ADHÉSION</a>
                    </div>
                </li>
                <?php
                    if(isset($_SESSION["memberId"])){
                        echo '<li class="navbar__item"><div class="btn-container"><a href="menu.php" class="animated-word"><i class="fa-solid fa-gear"></i></a></div></li>';
                    } 
                    ?>
            </ul>
        </div>
    </nav>