<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vos informations</title>
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<body class="touma">
<center>
<div class="batman">
<?php
session_start();

$servername = "localhost";
$username = "smaurer3";
$password = "Tprt12346";
$DBname = "smaurer3_02";
$conn = new mysqli($servername, $username, $password, $DBname);

    $email = $_SESSION['LOG'];
    
    $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');

    $SELECT_ID = "SELECT ID_student FROM Membres WHERE email='$email'";
    $fetch_ID = $dbh->query($SELECT_ID);
    $A_ID = $fetch_ID->fetch(PDO::FETCH_ASSOC);
    $ID = $A_ID['ID_student'];


    
    $SELECT_NoG = "SELECT Groupe.nogroupe FROM Groupe, Appartient WHERE Groupe.nomgroupe=Appartient.nomgroupe AND Appartient.ID_student='$ID'";
    $fetch_NoG = $dbh->query($SELECT_NoG);
    $A_NoG = $fetch_NoG->fetch(PDO::FETCH_ASSOC);
    $NoG = $A_NoG['nogroupe'];




    $result = mysqli_query ($conn, "SELECT * FROM possede, Vehicule, Etudiant, Groupe, Appartient, Planning 
    WHERE Groupe.nomgroupe=Appartient.nomgroupe 
    AND Groupe.nogroupe=Planning.nogroupe 
    AND Etudiant.ID_student=possede.ID_student 
    AND possede.novehicule=Vehicule.novehicule 

    AND possede.ID_student='$ID' 
    AND Appartient.ID_student='$ID' 
    AND Groupe.nogroupe ='$NoG'");
    
    echo "<h2>Compte : ".$email."</h2>";
    while($row= mysqli_fetch_array($result)) {
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Ville de l'étudiant : </th>";
        echo "<td>" . $row['ville'] . "</td>";
        echo "</tr>";
        echo "<th>Groupe de l'étudiant : </th>";
        echo "<td>" . $row['nomgroupe'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Modèle : </th>";
        echo "<td>" . $row['modele'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Immatriculation : </th>";
        echo "<td>" . $row['immatriculation'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Nombre de place : </th>";
        echo "<td>" . $row['nbplace'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Carte grise : </th>";
        echo "<td>" . $row['cartegrise'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Contrôle technique : </th>";
        echo "<td>" . $row['controletech'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Assurance : </th>";
        echo "<td>" . $row['assurance'] . "</td></tr>";
        echo "</tr>";
        echo "</table>";

        echo "<table>";
        echo "<tr>";
        echo "<th> Début des cours : </th>";
        echo "</tr>";
        echo "<th> Lundi </th>";
        echo "<th> Mardi </th>";
        echo "<th> Mercredi </th>";
        echo "<th> Jeudi </th>";
        echo "<th> Vendredi </th>";
        echo "<th> Samedi </th>";
        echo "<tr>";
        echo "<td>" . $row['lundi-s'] . "</td>";
        echo  "<td>" . $row['mardi-s'] . "</td>";
        echo "<td>" . $row['mercredi-s'] . "</td>";
        echo "<td>" . $row['jeudi-s'] . "</td>";
        echo  "<td>" . $row['vendredi-s'] . "</td>";
        echo "<td>" . $row['samedi-s'] . "</td>";
        echo "</tr>";
        echo "</table>";

        echo "<table>";
        echo "<tr>";
        echo "<th> Fin des cours : </th>";
        echo "</tr>";
        echo "<th> Lundi </th>";
        echo "<th> Mardi </th>";
        echo "<th> Mercredi </th>";
        echo "<th> Jeudi </th>";
        echo "<th> Vendredi </th>";
        echo "<th> Samedi </th>";
        echo "<tr>";
        echo "<td>" . $row['lundi-e'] . "</td>";
        echo  "<td>" . $row['mardi-e'] . "</td>";
        echo "<td>" . $row['mercredi-e'] . "</td>";
        echo "<td>" . $row['jeudi-e'] . "</td>";
        echo  "<td>" . $row['vendredi-e'] . "</td>";
        echo "<td>" . $row['samedi-e'] . "</td>";
        echo "</tr>";
        echo "</table>";

        }

mysqli_close($conn);
?>
</div>
</center>
</body>
</html>