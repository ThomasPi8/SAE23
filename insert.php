<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post">
        <label for="AdminLOG">LOGIN : </label>
        <input type="text" name="LOGIN" id="LOGIN">
        <label for="AdminPASS"> Mot de passe</label>
        <input type="password" name="PASS" id="PASS">
        <label for="Envoie"></label>
        <input type="submit" value="LAUNCH JSON">
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ADMIN = "Admin";
    $PASS = "a5ed452b8c8a216979fd1d237ef8d018082b48a0e077506992ca7ba6c9b7a4fbb81b7ef1e9250279293c56be63139c1d0b7fa4dd0abb542ab621c1b445a1485d";

    if ($ADMIN == $_POST['LOGIN'] and $PASS == hash('sha512', $_POST['PASS'])) {

        $DATA_Etudiants = file_get_contents("https://rt-projet.pu-pm.univ-fcomte.fr/~smaurer3/DATA/Etudiants.json");
        $DATA_array = json_decode($DATA_Etudiants, true);

        echo "<p>Conversion du fichier json effectué dans la base de données</p>";

        $mdp = "";
        $nom = "";
        $prenom = "";
        $ville = "";
        $groupe = "";
        $immatriculation = "";
        $NbPlace = "";
        $modele = "";
        $cartegrise = "";
        $controletech = "";
        $assurance = "";
        $ready = "";
        $readyI = "";

        foreach ($DATA_array as $key => $value) {
            echo "<br>";
            echo "<br>";
            foreach ($value as $key1 => $value1) {
                if ($key1 == "vehicule") {
                    foreach ($value1 as $key2 => $value2) {
                        if ($key2 == "immatriculation") {
                            foreach ($value2 as $keyI => $valueI) {
                                /*
                        echo " | ", $keyI;
                        echo " => ";
                        print_r($valueI);
                        echo "<br>";
                        */
                                switch ($keyI) {
                                    case 'immatriculation':
                                        $immatriculation = $valueI;
                                        break;

                                    case 'NbPlace':
                                        $NbPlace = $valueI;
                                        $readyI = "true";
                                        break;
                                    case 'modele':
                                        $modele = $valueI;
                                        break;
                                    case 'cartegrise':
                                        $cartegrise = $valueI;
                                        break;
                                    case 'controletech':
                                        $controletech = $valueI;
                                        break;
                                    case 'assurance':
                                        $assurance = $valueI;
                                        break;
                                }
                            }
                            if ($readyI == "true") {
                                /*
                        echo
                        " Immatriculation : ", $immatriculation,
                        "<br>",
                        " Nombres de places : ", $NbPlace;
                        echo "<br>";
                        echo $AID["ID_student"];
                        */
                                $sqlV = "INSERT INTO Vehicule (modele, immatriculation, nbplace, cartegrise, controletech, assurance)
                        VALUES ('$modele', '$immatriculation', '$NbPlace','$cartegrise','$controletech','$assurance')";
                                $insertV = $dbh->prepare($sqlV);
                                $insertV->execute();

                                $sqlSV = "SELECT novehicule FROM Vehicule WHERE immatriculation='$immatriculation'";
                                $selSV = $dbh->query($sqlSV);
                                $AIDSV = $selSV->fetch(PDO::FETCH_ASSOC);
                                $IDSV = $AIDSV['novehicule'];

                                $sqlP = "INSERT INTO possede (ID_student, novehicule) VALUES ('$ID', '$IDSV')";
                                $insertP = $dbh->prepare($sqlP);
                                $insertP->execute();
                            }
                        }
                    }
                } else {
                    /*
            echo " | ", $key1;
            echo " => ";
            print_r($value1);
            */
                    switch ($key1) {
                        case "mdp":
                            $mdp = $value1;
                            break;
                        case "nom":
                            $nom = $value1;
                            break;
                        case "prenom":
                            $prenom = $value1;
                            break;
                        case "ville":
                            $ville = $value1;
                            break;
                        case "groupe":
                            $groupe = $value1;
                            $ready = "true";
                            break;
                    }
                    if ($ready == "true") {
                        /*
                echo "Mot de passe : ",$mdp,
                "<br>",
                " Prénom : ",$prenom,
                "<br>",
                " Nom : ",$nom,
                "<br>",
                " Ville : ", $ville,
                "<br>",
                " Groupe : " ,$groupe;
                echo "<br>";
                */
                        $ready = "";

                        $username = strtolower($prenom) . "." . strtolower($nom);
                        $email = strtolower($prenom) . "." . strtolower($nom) . '@smt.fr';
                        $pass_crypt = hash('sha512', $mdp);

                        $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');


                        $sqlM =
                            "INSERT INTO Membres (username, email, password)
                VALUES ('$username','$email','$pass_crypt')";

                        $insert = $dbh->prepare($sqlM);
                        $insert->execute();

                        $sqlID = "SELECT ID_student FROM Membres WHERE email='$email'";
                        $selID = $dbh->query($sqlID);
                        $AID = $selID->fetch(PDO::FETCH_ASSOC);
                        $ID = $AID["ID_student"];

                        $sqlE = "INSERT INTO Etudiant (ID_student, prenom, nom, ville)
                VALUES ('$ID','$prenom','$nom', '$ville')";

                        $insert = $dbh->prepare($sqlE);
                        $insert->execute();

                        /*
                $sqlGID = "SELECT Groupe.nogroupe 
                FROM Groupe WHERE Groupe.nomgroupe='$groupe'";
                $selGID = $dbh->query($sqlGID);
                $AGID = $selGID->fetch(PDO::FETCH_ASSOC);
                $GID = $AGID["nogroupe"];
                */

                        $sqlA = "INSERT INTO Appartient (ID_student, nomgroupe)
                VALUES ('$ID', '$groupe')";
                        $insertA = $dbh->prepare($sqlA);
                        $insertA->execute();
                    }
                }
            }
        }
    }else{
        echo "<p>Erreur dans le login ou dans le mot de passe</p>";
    }
}
?>