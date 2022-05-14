<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/style.css">
    <title>Contact</title>
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<body>
<style>
label,
textarea {
    font-size: .8rem;
    letter-spacing: 1px;
}
textarea {
    padding: 10px;
    max-width: 100%;
    line-height: 1.5;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
}

label {
    display: block;
    margin-bottom: 10px;
}

</style>
    <center>
    <form action="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/Contact.php" method="post">       
            <h1> Formulaire de contact </h1>
            <br>
            <div>
            <label for="Prenom">Votre prenom :</label>
            <input type="text" name="Prenom" id="Prenom" size="50">
            </div>
            <div>
            <label for="Nom">Votre nom :</label>
            <input type="texte" name="Nom" id="Nom" size="50">
            </div>
            <div>
            <label for="Email">Votre adresse email :</label>
            <input type="email" name="Email" id="Email" size="50">
            </div>
           <div>
            <label for="Message">Votre message :</label>
            <input type="text" name="Message" id="Message" size="100">
            </div>
            <div>
            <input type="submit" value="Envoyer">
            </div>
            </form>
    </center>
<?php
$servername = "localhost";
$username = "smaurer3";
$password = "Tprt12346";
$DBname = "smaurer3_02";

if ((!empty($_POST['Nom'])) && (!empty($_POST['Prenom'])) && (!empty($_POST['Email'])) && (!empty($_POST['Message']))) {

    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];
    $conn = new mysqli($servername, $username, $password, $DBname);
    $sql = "INSERT INTO Contact (Prenom, Nom, Email, Message) VALUES ('$prenom', '$nom', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
    echo "Message correctement envoyé";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
