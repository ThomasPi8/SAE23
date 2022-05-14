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
 
$name = $_GET["name"];

 if (preg_match ('/^[a-z]{1,8}$/',$name)) {
 	
	$sql = "DELETE FROM students WHERE students.name= \"$name\"";

	if (!empty ($_GET['name']) ) {
 
  		if (mysqli_query($conn, $sql)) {
 		echo "<br> Student Thanosed";
 		} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
header("Location: show.php");
?>
</form>
</body>
</html>
