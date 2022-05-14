<?php
session_start();
// if ($_SESSION["New"] != true) {
//   header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/connexion.html");
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
    <?php
    echo "<h1>" . $_SESSION["LOG"] . "</h1>";
    ?>
    <form class="validationform" method="post" action="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/validation.php">
        <div class="perso">
            <div>
                <label for="prenom">Prénom*</label>
                <input type="text" name="prenom" id="prenom" size="16">
            </div>
            <br>
            <div>
                <label for="nom">Nom*</label>
                <input type="text" name="nom" id="nom" size="16">
            </div>
            <br>
            <div>
                <label for="birthday">Date de naissance*</label>
                <input type="date" name="birthday" id="birthday">
            </div>
        </div>
        <br>
        <div class="vehicule">
            <label for="Hvehicule">Possession d'un véhicule</label>
            <select name="HV">
                <option value="NON">NON</option>
                <option value="OUI">OUI</option>
            </select>
            <label for="marque">Marque</label>
            <select name="marques" id="marques">
                <option value="">Choisir la marque</option>
                <option value="Peugeot">Peugeot</option>
                <option value="Mercedes">Mercedes</option>
                <option value="Renault">Renault</option>
            </select>
            <br>
            <br>
            <label for="Immatriculation">Immatriculation</label>
            <input type="text" name="plate" id="plate">
            <br>
            <label for="NBplaces">Nombre de place(s)</label>
            <input type="number" name="places" id="places">
        </div>
        <br>
        <div class="Domicile">
            <label for="codepostal">Code postal</label>
            <input type="text" name="codepostal" id="codepostal" size="6">
            <br>
            <br>
            <div class="Rue">
                <label for="Novoie">Numéro de voie</label>
                <input type="number" name="Novoie" id="Novoie" min="0" max="500">
                <br>
                <label for="voie">Nom de la voie</label>
                <input type="text" name="voie" id="voie">   
            </div>
            <br>
            <label for="Ville">Ville</label>
            <input type="text" name="ville" id=""ville">
        </div>
        <br>
        <input type="submit" value="Envoyer">
    </form>
    <center>
</body>
</html>
<?php

?>