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

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
 
$identifiant = $_GET["Identifiant"];

 if (preg_match ('/^[a-z]{1,8}$/',$name)) {
 	
	$sql = "DELETE FROM Discord WHERE Discord.Identifiant= \"$identifiant\"";

	if (!empty ($_GET['Identifiant']) ) {
 
  		if (mysqli_query($conn, $sql)) {
 		echo "<br> Message Thanosed";
 		} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
header("Location: showmessage.php")
?>
</form>
</body>
</html>