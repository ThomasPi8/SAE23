<?php

  $servername = "localhost";
  $username = "smaurer3";
  $password = "Tprt12346";
  $DBname = "smaurer3_02";

$conn = new mysqli($servername, $username, $password, $DBname);
$result = mysqli_query($conn,"SELECT * FROM Contact");

echo "<table border='1'>
<tr>
<th>Prenom</th>
<th>Nom</th>
<th>Email</th>
<th>Message</th>
</tr>";

while($row= mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['Prenom'] . "</td>";
echo "<td>" . $row['Nom'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>" . $row['Message'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
