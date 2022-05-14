<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

  $servername = "localhost";
  $username = "smaurer3";
  $password = "Tprt12346";
  $DBname = "smaurer3_01";

  $conn = new mysqli($servername, $username, $password, $DBname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM Discord");

echo "<table border='1'>
<tr>
<th>delete</th>
<th>Auteur</th>
<th>Message</th>
</tr>";

while($row= mysqli_fetch_array($result))
{
$lien = "https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/deletemessage.php?identifiant=".$row['Identifiant'];
echo "<tr>";
echo "<td> <a href=".$lien.">X</a></td>";
echo "<td>" . $row['Auteur'] . "</td>";
echo "<td>" . $row['Message'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

</form>
</body>
</html>