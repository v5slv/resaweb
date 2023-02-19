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
    <link rel="stylesheet" href="css/produit.css">
    <link rel="icon" href="img/favicon.png">
    <title>Votre chambre</title>
</head>

<?php
include('connexion.php');
$id_chambre=$_GET["id"];
$requete = "SELECT * FROM chambre WHERE id_chambre=$id_chambre";
$stmt=$db->query($requete);
$result=$stmt->fetch(PDO::FETCH_ASSOC);
?>

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

        <nav class="nav">
            <a href="index.php">ACCUEIL</a>
            <a href="index.php#nos-services">NOS SERVICES</a>
            <a href="liste.php" class="actif">NOS CHAMBRES</a>
            <a href="index.php#tourisme">TOURISME</a>
            <a href="apropos.html">À PROPOS</a>
        </nav>
    </header>

    <div class="entete">
        <h1><?= $result["nom_chambre"] ?></h1>
    </div>

    <div id="produit"></div>

    <div class="page">
        <div class="info-chb">
        <a href="liste.php#nos-chambres"><div class="retour"></div></a>
            <img src="img/<?= $result["img_chambre"]?>.jpg" alt="" class="grandeimg">
            <div class="info-txt">
                <div>
                <h1><?= $result["nom_chambre"] ?></h1>
                <h2><?= $result["prix_nuit"] ?>€/nuit</h2></div>
                <div class="caracteristiques">
                    <p>Capacité : <span><?= $result["nb_personne"] ?></span></p>
                    <p>Surface : <span><?= $result["surface"] ?>m²</span></p>
                    <p>Lit simple : <span><?= $result["lit_simple"] ?></span></p>
                    <p>Lit double : <span><?= $result["lit_double"] ?></span></p>
                </div>
                <p><span>Description</span><br><?= $result["description"] ?></p>
                <div class="equip">
                    <?php 
                    if($result["vue_mer"]==1) {
                        echo"<div><img src='img/vuemer.svg' alt=''><p>Vue sur mer</p></div>";
                    }
                    if($result["baignoire"]==1) {
                        echo"<div><img src='img/baignoire.svg' alt=''><p>Baignoire</p></div>";
                    }
                    if($result["minibar"]==1) {
                        echo"<div><img src='img/minibar.svg' alt=''><p>Minibar</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="contient-form">
        <form action="insert.php?id=<?= $id_chambre ?>" method="post">
        <div class="form-chps">
            <div class="form-part">
                <div class="titreform">
                    <h1>Votre réservation</h1>
                </div>

                <div class="formbox">
                    <label for="check-in">DATE D'ARRIVÉE :</label>
                    <input type="date" id="check-in" name="check-in" value="">
                </div>

                <div class="formbox">
                    <label for="check-out">DATE DE DÉPART :</label>
                    <input type="date" id="check-out" name="check-out" value="">
                </div>

                <div class="formbox2">
                    <div class="littlebox">
                        <label for="nb-adulte">ADULTES :</label>
                        <select name="nb-adulte" id="nb-adulte">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="littlebox">
                        <label for="nb-enfant">ENFANTS :</label>
                        <select name="nb-enfant" id="nb-enfant">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-part">
                <div class="titreform">
                    <h1>Vos informations</h1>
                </div>

                <div class="formbox">
                    <label for="nom">NOM :</label>
                    <input type="text" name="nom" id="nom" class="cap">
                </div>

                <div class="formbox">
                    <label for="prenom">PRÉNOM :</label>
                    <input type="text" name="prenom" id="prenom" class="cap">
                </div>

                <div class="formbox">
                    <label for="mail">MAIL :</label>
                    <input type="mail" name="mail" id="mail">
                </div>
            </div>
            </div>

            <div class="form-part form-resa">
                <p>Un mail de confirmation vous sera envoyé suite à votre réservation.</p>

                <input type="submit" name="reserver" value="RÉSERVER" class="submit">
            </div>

        </form>
        </div>
    </div>

    <footer>
        <div>
            <p>© 2022 Tous droits réservés par Valérie Lapeyre.</p>
            <a href="apropos.html#mentions-legales">Mentions légales</a>
        </div>
    </footer>
</body>

<script src="js/calendrier.js"></script>
<script src="js/todaydateform.js"></script>
<script src="js/caplettre.js"></script>
<script src="js/menu.js"></script>


</html>