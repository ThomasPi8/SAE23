<?php 
    session_start();
    if ( $_SESSION["connected"] != true) {
        header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/");
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body class="carte">

<ul class="tkt">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroom Vroom</a></li>
    <br>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/planning.php">Votre planning</a></li>
    <li class="dropdown">
    <div class="dropdown-content">
      <br>
      <a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/ChoixE.php">Choisir vos équipages</a>
      <br>
      <a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/push.php">Proposer votre véhicule à l'équipage</a>
      <br>
      <a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/infotrajet.php">Voir votre équipes</a>
      <br>
      <a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/information.php">Vos informations</a>
      <br>
      <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/ContactCompte.php">Nous contacter</a></li>
      <br>
      <a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/Connexion.html">Déconnexion</a>
    </div>
    <?php 
        echo "<br><p>".$_SESSION['LOG']."</p>";
    ?>
    </ul>
   

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

</div>
</body>
</html>