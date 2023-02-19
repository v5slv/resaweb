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
    <link rel="stylesheet" href="css/reservation.css">
    <link rel="icon" href="img/favicon.png">
    <title>Confirmation de réservation</title>
</head>

<?php
include('connexion.php');
$id_chambre=$_GET["id"];

$requete = "SELECT * FROM chambre, reservation WHERE id_chambre=ext_chambre AND id_chambre='$id_chambre'";

$stmt=$db->query($requete);
$result=$stmt->fetch(PDO::FETCH_ASSOC);

setlocale(LC_ALL,'fr_FR', 'fra');

$date_arrivee=strftime('%d %B %Y', strtotime($result['date_arrivee']));
$date_depart=strftime('%d %B %Y', strtotime($result['date_depart']));

$contenu="<h1>Votre réservation à l'Hôtel du Coquillage</h1>
<p>Bonjour " . $result['prenom_client'] . ",</br>
Vous avez bien réservé la chambre \"" . $result['nom_chambre'] . "\" du " . $date_arrivee . " au " . $date_depart . ".</br>À bientôt, <br>L'équipe du Coquillage</p>";

$mail=$result['mail_client'];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
mail($mail,'Réservation Hôtel Le Coquillage',$contenu,implode("\r\n", $headers));

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

        <nav class="nav navresp">
            <a href="index.php" class="nav-item">ACCUEIL</a>
            <a href="index.php#nos-services" class="nav-item">NOS SERVICES</a>
            <a href="liste.php" class="actif nav-item">NOS CHAMBRES</a>
            <a href="index.php#tourisme" class="nav-item">TOURISME</a>
            <a href="apropos.html" class="nav-item">À PROPOS</a>
        </nav>
    </header>

        

    <div class="recap">
        <h1>Réservation confirmée</h1>
        <p>Merci <?= $result["prenom_client"] ?> !<p>
    <p> Vous avez bien réservé la chambre "<?= $result['nom_chambre'] ?>" du <?= $date_arrivee?> au <?= $date_depart?>. Vous recevrez dans votre boîte mail un récapitulatif de votre réservation. <br>
    Nous attendons avec impatience votre arrivée, à bientôt !</p>
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
<script src="js/menu.js"></script>

</html>