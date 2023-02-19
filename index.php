<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:wght@300;400&family=Forum&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/favicon.png">
    <title>Le Coquillage - Hôtel</title>
</head>

<body>
    <header>
        <div class="flex-haut">
            <a href="apropos.html"><img src="img/info.svg" alt="lien vers à propos" class="iconinfo"></a>

            <div class="etoiles" alt="hôtel 3 étoiles">
                <img src="img/etoile.svg" alt="" class="etoile">
                <img src="img/etoile.svg" alt="" class="etoile">
                <img src="img/etoile.svg" alt="" class="etoile">
            </div>

            <div class="hamburger" alt="lien vers menu">
                <span class="nav-icon material-icons">menu</span>
                <span class="close-icon material-icons">close</span>
            </div>

            <a href="liste.php" class="resalien"><img src="img/cal.svg" alt="" class="cal">
                <p>Réserver →</p>
            </a>
        </div>

        <div class="separateur1"></div>

        <a href="index.php"><img src="img/logowave.svg" alt="Le Coquillage hôtel" class="logo"></a>

        <div class="separateur2"></div>

        <nav class="nav navresp">
            <a href="index.php" class="actif nav-item">ACCUEIL</a>
            <a href="#nos-services" class="nav-item clic">NOS SERVICES</a>
            <a href="liste.php" class="nav-item">NOS CHAMBRES</a>
            <a href="#tourisme" class="nav-item clic">TOURISME</a>
            <a href="apropos.html" class="nav-item">À PROPOS</a>
        </nav>
    </header>

    <div class="slider">
        <img src="img/slide1.jpg" class="slide active">
        <img src="img/slide2.jpg" class="slide">
        <img src="img/slide3.jpg" class="slide">
        <img src="img/slide4.jpg" class="slide">
        <img src="img/slide5.jpg" class="slide">

        <div class="slider-txt">
            <p class="petittxt">L'HÔTEL DU COQUILLAGE</p>
            <p class="grostxt">En face à face avec l'Atlantique<p>
                    <p class="petittxt">Un endroit idéal pour vous ressourcer</p>
        </div>

        <div class="suivant">
            <img src="img/fleche-droite.svg" alt="">
        </div>
        <div class="precedent">
            <img src="img/fleche-gauche.svg" alt="">
        </div>
    </div>


    <main id="main">
        <section class="bienvenue">
            <div class="bienvenue-bg"></div>
            <img src="img/hotel.jpg" alt="">
            <div class="bienvenue-txt">
                <h1>Bienvenue</h1>
                <p>Situé entre les belles plages de Cancale et les célèbres remparts de Saint-Malo,
                    l’Hôtel 3 étoiles du Coquillage vous permettra de découvrir toutes les richesses de la côte
                    atlantique :
                    gastronomie, vélo,
                    patrimoine, plage, détente et bien d'autres...
                </p>
                <p> L’hôtel est composé de chambres récemment rénovées qui bénéficient de tout le confort nécessaire
                    pour
                    votre
                    séjour. Vous y trouverez un wifi gratuit disponible dans tout l’hôtel, une climatisation, une
                    literie
                    confortable, de nombreux rangements, une décoration agréable... Elles possèdent également une
                    excellente
                    insonorisation, essentielle à votre tranquilité. Par ailleurs, vous trouverez dans nos chambres
                    équipées
                    une
                    vue sur le littoral, une baignoire à jets hydromassants, ou encore un minibar silencieux.
                </p>
                <div class="voirchb-gauche">
                    <a href="liste.php" class="voirchb">> VOIR NOS CHAMBRES</a>
                </div>
            </div>
        </section>


        <section class="nouvelles-chb">
            <h1>Nos nouvelles chambres</h1>
            <div class="chb-wrap">
                <?php
                include('connexion.php');
                $requete = "SELECT * FROM chambre ORDER BY id_chambre DESC LIMIT 3";
                $stmt=$db->query($requete);
                $result=$stmt->fetchall(PDO::FETCH_ASSOC);
                foreach ($result as $chb){
                    echo "
                <div class= 'chb-container'>
                    <div class='chb-img-cont'>
                        <a href='produit.php?id={$chb["id_chambre"]}#produit'> 
                        <img src='img/{$chb["img_chambre"]}.jpg'>
                        </a>
                    </div>
                
                    <div class= 'flex-chb-txt'>
                    <div class='flex-case'>
                        <h2>{$chb["nom_chambre"]}</h2>
                        <h2>{$chb["prix_nuit"]}€/nuit</h2>
                    </div>
                    
                    <div class='flex-case'>
                        <p>Capacité : <span>{$chb["nb_personne"]}</span></p>
                        <p>Surface : <span>{$chb["surface"]}m²</span></p>
                    </div>

                    <a href='produit.php?id={$chb["id_chambre"]}#produit' class='resa-bouton'>
                    > RÉSERVER
                    </a>
                </div>


            </div> 
                    " ;}
                ?>
            </div>
        </section>

        <section id="nos-services" class="nos-services">
            <h1>Nos services</h1>
            <div class="flex-services">
                <div class="serv">
                    <img src="img/velo.jpg" alt="">
                    <div class="serv-txt">
                        <h2>Location de vélo</h2>
                        <p>Nous proposons la location de vélo de toute taille. C'est un excellent moyen de découvrir la
                            région (et de bouger vos muscles). </p>
                    </div>
                </div>
                <div class="serv"><img src="img/petitdej.jpg" alt="">
                    <div class="serv-txt">
                        <h2>Petit-déjeuner</h2>
                        <p>Vous pourrez profiter d'un petit-déjeuner en buffet à volonté dans la salle à manger.
                            Celui-ci est
                            servi de 7h à 11h30.</p>
                    </div>
                    
                </div>
                <div class="serv">
                    <img src="img/laverie.jpg" alt="">
                    <div class="serv-txt">
                        <h2>Laverie</h2>
                        <p>Nous mettons une laverie automatique à disposition de nos clients. Quoi de mieux pour vous
                            garder propre ?</p>
                    </div>
                </div>
                <div class="serv">
                    <img src="img/salon.jpg" alt="">
                    <div class="serv-txt">
                        <h2>Salon détente</h2>
                        <p>Notre salon détente est parfait pour vous reposer entre amis. Téléviseur 4K, tables, canapés
                        et fauteuils, distributeurs... Il ne manque plus que vous.</p>
                    </div>
                    
                </div>

            </div>

            </div>
        </section>

        <section id="tourisme" class="tourisme">
            <h1>Visiter la région</h1>
            <div class="slidert">
                <div class="slidet active">
                    <img src="img/huitre.jpg" alt="">
                    <div class="slidet-txt">
                    <h2>Déguster des huîtres</h2>
                    <p>Spécialité de Cancale, vous n'en ferez qu'une bouchée. Rendez-vous au marché du matin pour goûter ses crustacés fraîchement pêchés.</p>
                    </div>
                </div>
                <div class="slidet">
                <img src="img/rando.jpg" alt="">
                    <div class="slidet-txt">
                    <h2>Faire des randonnées</h2>
                    <p>Admirez les paysages magnifiques de la région. Falaises, plages, rochers, vagues... L'océan vous appelle.</p>
                    </div>
                </div>
                <div class="slidet">
                <img src="img/msm.jpg" alt="">
                    <div class="slidet-txt">
                    <h2>Voir le Mont-Saint-Michel</h2>
                    <p>Un classique, une valeur sûre. Le Mont-Saint-Michel est proche de l'hôtel. Allez visiter ce monument du patrimoine français !</p>
                    </div>
                </div>
                <div class="slidet">
                <img src="img/balade.jpg" alt="">
                    <div class="slidet-txt">
                    <h2>Se balader sur les plages</h2>
                    <p>Admirez un beau coucher de soleil sur la côte atlantique et baladez-vous sur les plages les soirs d'été. Plaisir garanti.</p>
                    </div>
                </div>

                <div class="suivantt">
                    <img src="img/fleche-dn.svg" alt="">
                </div>
                <div class="precedentt">
                    <img src="img/fleche-gn.svg" alt="">
                </div>
            </div>
        </section>

    </main>




    <footer>
        <div>
            <p>© 2022 Tous droits réservés par Valérie Lapeyre.</p>
            <a href="apropos.html#mentions-legales">Mentions légales</a>
        </div>
    </footer>

</body>

<script src="js/slider.js"></script>
<script src="js/slider-tourisme.js"></script>
<script src="js/calendrier.js"></script>
<script src="js/menu.js"></script>




</html>