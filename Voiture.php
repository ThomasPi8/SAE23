<?php
session_start();
// if ($_SESSION["New"] != true) {
//   header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/connexion.html");
//}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choix du véhicule</title>
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/style.css">
</head>
<body class="rapide">
<h1 class="accueil"> <a href =espace.php> Retour </a></h1>
<center>
<div class="gova">
            <form action="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/Voiture.php" method="post">
            <br>
            <h4> Informations sur le véhicule </h4>
            <div>
            <label for="Modele">Marque</label>
            <br>
            <input type="texte" name="Modele" id="Modele" size="30">
            </div>
            <br>
            <div>
            <label for="Immatriculation">Entrez votre plaque d'immatriculation</label>
            <br>
            <input type="text" name="Immatriculation" id="Immatriculation" size="30">
            </div>
            <br>
            <div>
            <label for="Nbplace">Nb de places</label>
            <br>
            <input type="number" name="Nbplace" id="Nbplace" required value="1" min="1" max="10">
            </div>
            <br>
            <div>
            <label for="Cartegrise"> Votre carte grise est-elle à jour ? </label>
            <br>
            <input type="radio" name="Cartegrise" id="Cartegrise" value="Oui">
            <label for="Cartegrise">Oui</label>
            <input type="radio" name="Cartegrise" id="Cartegrise" value="Non" checked>
            <label for="Cartegrise">Non</label>
            </div>
            <br>
            <div>
            <label for="Controletech"> Votre contrôle technique est-il effectué ? </label>
            <br>
            <input type="radio" name="Controletech" id="Controletech" value="Oui">
            <label for="Controletech">Oui</label>
            <input type="radio" name="Controletech" id="Controletech" value="Non" checked>
            <label for="Controletech">Non</label>
            </div>
            <br>
            <div>
            <input type="radio" name="Assurance" id="Assurance" value="Oui">
            <label for="Assurance">Oui</label>
            <input type="radio" name="Assurance" id="Assurance" value="Non" checked>
            <label for="Assurance">Non</label>
            <br>
            </div>
            <br>
            <div>
            <input type="submit" value="Inscription">
            </div>
            </form>
</div>

<?php
$servername = "localhost";
$username = "smaurer3";
$password = "Tprt12346";
$DBname = "smaurer3_02";

if ((!empty($_POST['Marque'])) && (!empty($_POST['Immatriculation'])) && (!empty($_POST['Nbplace'])) && (!empty($_POST['Cartegrise'])) && (!empty($_POST['Controletech'])) && (!empty($_POST['Assurance']))){

$modele = $_POST['Modele'];
$immatriculation = $_POST['Immatriculation'];
$nbplace = $_POST['Nbplace'];
$cartegrise = $_POST['Cartegrise'];
$controletech = $_POST['Controletech'];
$assurance = $_POST['Assurance'];

$conn = new mysqli($servername, $username, $password, $DBname);

mysqli_query ($conn, "INSERT INTO Vehicule (modele, immatriculation, nbplace, cartegrise, controletech, assurance) VALUES ('$modele','$immatriculation', '$nbplace', $cartegrise','$controletech', '$assurance')");

}

?>

</div>
</center>
</body>
</html>
