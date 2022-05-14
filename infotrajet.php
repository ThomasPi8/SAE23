<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Info Trajet</title>
    <link rel="stylesheet" href="style.css">
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<body>

<?php
session_start();

$servername = "localhost";
$username = "smaurer3";
$password = "Tprt12346";
$DBname = "smaurer3_02";
$conn = new mysqli($servername, $username, $password, $DBname);
$email =$_SESSION['LOG'];

$dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');
        $SELECT_ID = "SELECT ID_student FROM Membres WHERE email='$email'";
        $fetch_ID = $dbh->query($SELECT_ID);
        $A_ID = $fetch_ID->fetch(PDO::FETCH_ASSOC);
        $ID = $A_ID['ID_student'];


$result = mysqli_query ($conn, "SELECT * FROM Equipage, Trajet, Etudiant WHERE Etudiant.ID_student = Equipage.ID_student AND Equipage.noequipe = Trajet.noequipe AND Equipage.ID_student='$ID'");
    
echo "<table border=1>
<tr>
<th>Ville de départ</th>
<th>Participation nécessaire ?</th>
<th> Horaire de depart </th>
</tr>";

while($row= mysqli_fetch_array($result)) {
    
    echo "<tr>";
    echo "<td>" . $row['villedepart'] . "</td>";
    echo "<td>" . $row['participation'] . "</td>";
    echo "<td>" . $row['horaire'] . "</td>";
    echo "</tr>";
    

    }
    echo "</table>";
mysqli_close($conn);
?>


 </body>
</html>