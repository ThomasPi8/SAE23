<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>sign-up</title>
</head>
<body>
    <?php
    include "info.php";
    include "DBconnect.php";
    $sql = "INSERT INTO Membres (Membres.email, Membres.username, Membres.password) 
    VALUES ('$email','$username','$pass_crypt')";
    if ( !empty($_POST["pwd"]) && !empty($_POST["email"]) && !empty($_POST["username"]) ) {

        if (mysqli_query($conn, $sql)) {
            session_start();
		    echo "<br>Good information flow";
            $_SESSION["connected"] = "true";
            $_SESSION["LOG"]= $email;
            $_SESSION["New"]= "true";
            header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/validation.php");
		    } else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
		    }
	    $conn->close();

       
    } else {
        echo "<p>Error : Empty</p>";
    }
    ?>
</body>
</html>