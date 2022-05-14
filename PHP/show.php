<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>
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

$result = mysqli_query($conn,"SELECT * FROM students");

echo "<table border='1'>
<tr>
<th>delete</th>
<th>Mark</th>
<th>Name</th>
</tr>";

while($row= mysqli_fetch_array($result))
{
$lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~smaurer3/delete2.php?name=".$row['name'];
echo "<tr>";
echo "<td> <a href=".$lien.">X</a></td>";
echo "<td>" . $row['mark'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

</form>
</body>
</html>
