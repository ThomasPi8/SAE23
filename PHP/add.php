<!DOCTYPE html>
<html>
<head>
<title>Ajouter nom</title>
</head>
<body>
<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>
  <form action="add.php" method="get" class="form-example">
    <div >
      <label for="name">name</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div >
      <label for="mark">mark</label>
      <input type="number" name="mark" id="mark" required value="1" min="1" max="10">
    </div>
      <div>
      <input type="submit" value="submit" include>
    </div>
  </form>
    <?php
     	$servername = "localhost";
  	$username = "smaurer3";
  	$password = "Tprt12346";
  	$DBname = "smaurer3_01";
	
      if ((!empty($_GET['name'])) && (!empty($_GET['mark']))){
        $name = $_GET['name'];
        $mark = $_GET['mark'];
        if (preg_match ('/^[a-z]{1,8}$/', $name) && preg_match ('/^[0-9]$/', $mark)){
          $conn = new mysqli($servername, $username, $password, $DBname);
          $sql="INSERT INTO students (Name, Mark)
          VALUES ('$name', '$mark')";
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
      } else {
        echo "Erreur";
      }
      }
      ?>

</body>
</html>
