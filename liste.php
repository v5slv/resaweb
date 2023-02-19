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
    <link rel="stylesheet" href="css/liste.css">
    <link rel="icon" href="img/favicon.png">
    <title>Nos chambres</title>
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
            <a href="index.php" class="nav-item">ACCUEIL</a>
            <a href="index.php#nos-services" class="nav-item">NOS SERVICES</a>
            <a href="liste.php" class="actif nav-item">NOS CHAMBRES</a>
            <a href="index.php#tourisme" class="nav-item">TOURISME</a>
            <a href="apropos.html" class="nav-item">À PROPOS</a>
        </nav>
    </header>

    <div class="entete">
        <h1>Nos chambres</h1>
    </div>

    <div class="flex-catalogue" id="nos-chambres">
        <div class="ligne2chb">
            <?php
            include('connexion.php');
        $requete = "SELECT * FROM chambre";

        if (isset($_GET["submit"])) {
            $requete = $requete . " WHERE nb_personne=" . $_GET["capacite"] . " AND lit_simple=" . $_GET["lit-simple"] . " AND lit_double=" . $_GET["lit-double"] . " AND vue_mer=" . $_GET["vuemer"] . " AND baignoire=" . $_GET["baignoire"] . " AND minibar=" . $_GET["minibar"] . " ORDER BY " . $_GET["ordre"];
         }
        

        $stmt=$db->query($requete);
        $result=$stmt->fetchall(PDO::FETCH_ASSOC);
        if (empty($result)) {
            echo "
            <img src='img/fail.png' alt=''>
            <p class='fail'>Désolé, aucune chambre ne corrrespond à vos critères... :(</p>
            ";
          }
        else {
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
            " ;}}
        ?>
        </div>

        <div class="contient-tri">
            <form action="liste.php#nos-chambres" class="tri">
                <div class="critere-tri">
                    <label for="ordre">Trier par</label>
                    <select name="ordre" id="ordre" onchange='saveValue(this);'>
                        <option value="prix_nuit">Prix croissant</option>
                        <option value="prix_nuit DESC">Prix décroissant</option>
                        <option value="surface">Surface croissante</option>
                        <option value="surface DESC">Surface décroissante</option>
                    </select>
                </div>

                <div class="critere-tri">
                    <label for="capacite">Capacité</label>
                    <select name="capacite" id="capacite" onchange='saveValue(this);'>
                        <option value="nb_personne">Toute</option>
                        <option value="1">1 personne</option>
                        <option value="2">2 personnes</option>
                        <option value="3">3 personnes</option>
                        <option value="4">4 personnes</option>
                    </select>
                </div>
                <div class="critere-tri">
                    <label for="lit-simple">Lit simple</label>
                    <select name="lit-simple" id="lit-simple" onchange='saveValue(this);'>
                        <option value="lit_simple">Tout</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="critere-tri">
                    <label for="lit-double">Lit double</label>
                    <select name="lit-double" id="lit-double" onchange='saveValue(this);'>
                        <option value="lit_double">Tout</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="critere-equip">
                    <span class="equip">Équipements</span>
                    <div class="flex-checkbox">
                        <div class="check-pointer">
                            <input type="hidden" name="vuemer" value="0">
                            <input type="checkbox" name="vuemer" id="vuemer" value="1"
                                onclick='if (this.checked) this.value="1"; else this.value="0";'
                                onchange='saveValue(this);'>
                            <label for="vuemer" class="check-pointer">Vue sur mer</label>
                        </div>

                        <div class="check-pointer">
                            <input type="hidden" name="baignoire" value="0">
                            <input type="checkbox" name="baignoire" id="baignoire" value="1"
                                onclick='if (this.checked) this.value="1"; else this.value="0";'
                                onchange='saveValue(this);'>
                            <label for="baignoire" class="check-pointer">Baignoire</label>
                        </div>

                        <div class="check-pointer">
                            <input type="hidden" name="minibar" value="0">
                            <input type="checkbox" name="minibar" id="minibar" value="1"
                                onclick='if (this.checked) this.value="1"; else this.value="0";'
                                onchange='saveValue(this);'>
                            <label for="minibar" class="check-pointer">Minibar</label>
                        </div>
                    </div>
                </div>



                <button type="submit" name="submit">VALIDER</button>
            </form>
        </div>




    </div>

    </div>

    <footer>
        <p>© 2022 Tous droits réservés par Valérie Lapeyre.</p>
        <a href="apropos.html#mentions-legales">Mentions légales</a>
    </footer>

</body>

<script src="js/slider.js"></script>
<script src="js/calendrier.js"></script>
<script src="js/liste.js"></script>
<script src="js/menu.js"></script>


</html>