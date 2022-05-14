<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>

<form action="delete.php" method="post">

 <label for="name">Choose a name</label>
 <input type="text" id="name" name="name" required
       minlength="1" maxlength="30" size="10">

<br>
<br>

 <input type="submit" value="Formulaire">

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
 
$name = $_POST["name"];

 if (preg_match ('/^[a-z]{1,8}$/',$name)) {
 	
	$sql = "DELETE FROM students WHERE students.name= \"$name\"";

	if (!empty ($_POST['name']) ) {
 
  		if (mysqli_query($conn, $sql)) {
 		echo "<br> Student Thanosed";
 		} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();

?>
</form>
</body>
</html>
