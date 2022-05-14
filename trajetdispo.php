<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

  $servername = "localhost";
  $username = "smaurer3";
  $password = "Tprt12346";
  $DBname = "smaurer3_02";

  $conn = new mysqli($servername, $username, $password, $DBname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM Disponibilite");

echo "<table border='1'>
<tr>
<th>Vehicule</th>
<th>Places libres</th>
<th>Participation au niveau de</th>
</tr>";

while($row= mysqli_fetch_array($result))
{

echo "<td>" . $row['vehicule'] . "</td>";
echo "<td>" . $row['place'] . "</td>";
echo "<td>" . $row['participation'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

</form>
</body>
</html>