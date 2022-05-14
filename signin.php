<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>sign-in</title>
</head>
<body>
    <?php
    
    include "info.php";

    if ( !empty($_POST["pwd"]) && !empty($_POST["email"])) {
        $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');
        $sth = $dbh->prepare("SELECT count(*)  as total from Membres
        WHERE email='$email' AND password='$pass_crypt'
        ");
        $sth->execute();
        $count = $sth->fetch(PDO::FETCH_ASSOC);
        if ($count["total"] == 0) {
            header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/connexion.html");
        }
        if ($count["total"] == 1) {
            session_start();
            $_SESSION["connected"]="true";
            $_SESSION["LOG"]= $email;
            header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php");
        }else {
            echo "<p>Une erreur s'est produite</p>";
        }
    }
      ?>
</body>
</html>