<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres</title>
    <link rel="stylesheet" href="style.css">
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<body class="joie">
<center>
<div class="sombrero">
    <h2>Veuillez choisir votre formation</h2>
    <br>
    <form action="planning.php" method="post">
<label for="formation">Formation</label>
<br>
<br>
            <select name="formation" id="formation">
                <option value="">Choisir la formation</option>
                <option value="2">LK-1</option>
                <option value="1">LK-2</option>
                <option value="3">GB-1</option>
                <option value="4">GB-2</option>
                <option value="5">ALT</option>
            </select>
            <br>
            <div>
                <input type="submit" value="Valider">
            </div>
    </form>
    <br>
    <div>
    <h2>Voici votre emploi du temps</h2>
    <?php

  $servername = "localhost";
  $username = "smaurer3";
  $password = "Tprt12346";
  $DBname = "smaurer3_02";
  $conn = new mysqli($servername, $username, $password, $DBname);
  $formation = $_POST['formation'];

$result = mysqli_query ($conn, "SELECT * FROM Planning WHERE Planning.nogroupe='$formation'");

echo "<table border=1>
<tr>
<th>Lundi</th>
<th>Mardi</th>
<th>Mercredi</th>
<th>Jeudi</th>
<th>Vendredi</th>
<th>Samedi</th>
</tr>";

while($row= mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['lundi-s'] . "</td>";
echo "<td>" . $row['mardi-s'] . "</td>";
echo "<td>" . $row['mercredi-s'] . "</td>";
echo "<td>" . $row['jeudi-s'] . "</td>";
echo "<td>" . $row['vendredi-s'] . "</td>";
echo "<td>" . $row['samedi-s'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>" . $row['lundi-e'] . "</td>";
echo "<td>" . $row['mardi-e'] . "</td>";
echo "<td>" . $row['mercredi-e'] . "</td>";
echo "<td>" . $row['jeudi-e'] . "</td>";
echo "<td>" . $row['vendredi-e'] . "</td>";
echo "<td>" . $row['samedi-e'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</div>    
</body>
</html>