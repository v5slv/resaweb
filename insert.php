<?php
include('connexion.php');
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$mail=$_POST["mail"];
$id_chambre=$_GET["id"];
$date_arrivee=$_POST["check-in"];
$date_depart=$_POST["check-out"];
$nb_adulte=$_POST["nb-adulte"];
$nb_enfant=$_POST["nb-enfant"];

$requete = "INSERT INTO reservation (nom_client,prenom_client,mail_client,ext_chambre,date_arrivee,date_depart,nb_adulte,nb_enfant) VALUES('$nom','$prenom','$mail','$id_chambre','$date_arrivee','$date_depart','$nb_adulte','$nb_enfant')";
$db->query($requete);
header('Location:reservation.php?id=' . $id_chambre);

?>



