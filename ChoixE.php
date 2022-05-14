<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/style.css">
    <title>Choix Equipage</title>
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<body class="uwu">
<style>
    .Trajet {
        border: 2px solid black;
        width:fit-content;
        margin: 3%;
    }
    .Trajet2 {
        border: 2px solid black;
        width:fit-content;
    }
</style>


<div class="papa">
    <?php
    session_start();
    if (!isset($_SESSION['connected']) OR $_SESSION["connected"] != 'true'  ) {
        header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/");
    }else {
        $email = isset($_SESSION['LOG']) ? $_SESSION['LOG'] : NULL;
        $i = 0;
        $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');
        $SELECT_ID = "SELECT ID_student FROM Membres WHERE email='$email'";
        $fetch_ID = $dbh->query($SELECT_ID);
        $A_ID = $fetch_ID->fetch(PDO::FETCH_ASSOC);
        $ID = $A_ID['ID_student'];

        $SELECT_Ville = "SELECT Etudiant.ville FROM Etudiant WHERE Etudiant.ID_student='$ID'";
                $fetch_ville = $dbh->query($SELECT_Ville);
                $AVille = $fetch_ville->fetch(PDO::FETCH_ASSOC);
                $Ville = $AVille['ville'];

        $SELECT_Trajet = "SELECT Trajet.* FROM Trajet 
        WHERE villedepart='$Ville' ORDER BY participation
        ";

        $fetch_Trajet = $dbh->prepare($SELECT_Trajet);
        $fetch_Trajet->execute();
        $DATA_Trajet = $fetch_Trajet->fetchAll(PDO::FETCH_ASSOC);
        
        $SELECT_VilleD ="SELECT Trajet.villedepart FROM Trajet INNER JOIN Etudiant WHERE Trajet.villedepart=Etudiant.ville AND
        Etudiant.ID_student='$ID' GROUP BY Trajet.villedepart";
        $fetch_VilleD = $dbh->query($SELECT_VilleD);
        $AvilleD = $fetch_VilleD->fetch(PDO::FETCH_ASSOC);
        $VilleD = $AvilleD['villedepart'];


        echo "<div class='Trajet2'>";
        if (is_array($DATA_Trajet) || is_object($DATA_Trajet)) {
            foreach ($DATA_Trajet as $keyT => $valueTrajet) {
                echo "<div class='Trajet'>";
                 foreach($valueTrajet as $keyTT => $valueTT){
                    //if($VilleD != isset($valueTrajet['villedepart']) ? $valueTrajet['villedepart'] : NULL) {
                        if ($keyTT == "noequipe") {
                            $noequipe = $valueTT;
                        
                            
                         } elseif ($keyTT == "novehicule") {
                            $novehicule = $valueTT;
                         }
                         else {
                            
                            echo "<p>",$keyTT, " => ", $valueTT,"</p>";
                         }
                     }
                    $i++;
                    echo "<form action='ChoixE.php' method='post'>
                    <button name='C' value='",$i,"'>Choisir</button>
                    </form>";
                    
                    $C = isset($_POST['C']) ? $_POST['C'] : NULL;
                    if ($C == $i) {
                        $INSERT_Equipage = "INSERT INTO Equipage (ID_student, noequipe)
                        VALUES ('$ID','$noequipe')";
                         $insert = $dbh->prepare($INSERT_Equipage);
                         $insert->execute();
                    }
                    echo "<br>";
                    echo "</div>";
                }
            }         
        }
    //}
    ?>
    </div>
</body>
</html>