<!DOCTYPE html>
<html>
<head>
<title>Ajouter Message</title>
</head>
<body>
<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>

  <form action="addmessage.php" method="post" class="form-example">
  
    <div >
      <label for="auteur">Auteur</label>
      <input type="text" name="auteur" id="auteur">
    </div>
    <div >
      <label for="message">Ecrire un message</label>
      <br>
      <textarea type="text" name="message" id="message" cols="70" rows="20" required></textarea>
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

    $date = date("F j, Y, g:i a");
    $auteur = $_POST ['auteur'];
    $message = $_POST ['message'];

      if ((!empty($_GET['auteur'])) && (!empty($_GET['message']))) {

         $conn = new mysqli($servername, $username, $password, $DBname);
          $sql="INSERT INTO Discord (Date, Auteur, Message) VALUES ('$date', '$auteur', '$message')";
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
      } else {
        echo "Erreur";
      }
      ?>

</body>
</html>
