<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/style.css">
    <title>Proposition Vehicule</title>
    <ul class="topnav">
    <li><a class="active" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/index.html">R&T Vroum Vroum</a></li>
    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/espace.php">Revenir à l'espace étudiant</a></li>
    </ul>
</head>
<style>
    .Vehicule {
        border: 2px solid black;
        padding: 5px;
        width: fit-content;
    }
</style>
<body>
<?php
session_start();
if (!isset($_SESSION['connected']) OR $_SESSION["connected"] != 'true'  ) {
    header("location:https://rt-projet.pu-pm.univ-fcomte.fr/users/smaurer3/");
}else {$email = isset($_SESSION['LOG']) ? $_SESSION['LOG'] : NULL;

    $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');

    $SELECT_ID = "SELECT ID_student FROM Membres WHERE email='$email'";
    $fetch_ID = $dbh->query($SELECT_ID);
    $A_ID = $fetch_ID->fetch(PDO::FETCH_ASSOC);
    $ID = $A_ID['ID_student'];

    $SELECT_Ve = "SELECT Vehicule.modele, Vehicule.nbplace, Vehicule.immatriculation,
        Vehicule.cartegrise, Vehicule.controletech, Vehicule.assurance, Vehicule.novehicule 
        FROM Vehicule, possede WHERE
        Vehicule.novehicule=possede.novehicule 
        AND possede.ID_student='$ID'";

    $fetch_Ve = $dbh->query($SELECT_Ve);
    $DATA_Ve = $fetch_Ve->fetch(PDO::FETCH_ASSOC);


    echo "<div class='Vehicule'><ul>";
    if (is_array($DATA_Ve) || is_object($DATA_Ve)) {
        foreach ($DATA_Ve as $keyVe => $valueVe) {
            if ($keyVe != "novehicule") {
                echo "<li>", $keyVe, " : ", $valueVe, "</li>";
            } else {
                $novehicule = $valueVe;
            }
        }
    }



    echo "</ul>
        <form action='push.php'>
            <button type='submit' name='p' value='PUSH'>Proposer ce véhicule au covoiturage</button>
        </form>";


    if ($_SERVER["QUERY_STRING"] == !null) {

        if ($_GET["p"] == "PUSH") {
            echo "<form action='' method='post'>
            <fieldset>
                <legend>Rentrez les jours où vous voulez proposer un covoiturage</legend>
                <input type='checkbox' name='Lundi' id='track' value='true' /><label for='track'>Lundi</label>
                <select name='Lundi-GB' id='GO-BACK'>
                    <option>------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-L' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                <input type='checkbox' name='Mardi' id='Jour' value='true' /><label for='Jour'>Mardi</label>
                <select name='Mardi-GB' id='GO-BACK'>
                    <option>-------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                    
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-M' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                <input type='checkbox' name='Mercredi' id='message' value='true' /><label for='message'>Mercredi</label>
                <select name='Mercredi-GB' id='GO-BACK'>
                    <option  value=''>-------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                    
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-Me' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                <input type='checkbox' name='Jeudi' id='track' value='true' /><label for='track'>Jeudi</label>
                <select name='Jeudi-GB' id='GO-BACK'>
                    <option  value=''>-------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                    
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-J' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                <input type='checkbox' name='Vendredi' id='Jour' value='true' /><label for='Jour'>Vendredi</label>
                <select name='Vendredi-GB' id='GO-BACK'>
                    <option  value=''>-------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                    
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-V' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                <input type='checkbox' name='Samedi' id='message' value='true' /><label for='message'>Samedi</label>
                <select name='Samedi-GB' id='GO-BACK'>
                    <option  value=''>-------</option>
                    <option value='Aller'>Aller</option>
                    <option value='Retour'>Retour</option>
                    <option value='Les Deux'>Les Deux</option>
                    
                </select>
                <label for='Participation'> Participation : </label>
                <input type='number' name='participation-S' id='Participation' max='50' min='0' placeholder='Euro'>
        
                <br />
        
                 <input type='submit' value='Valider'>
                </fieldset>
                  </form>";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $dbh = new \PDO("mysql:host=localhost;dbname=smaurer3_02", 'smaurer3', 'Tprt12346');

                $sqlGID = "SELECT nogroupe FROM Groupe, Appartient, Etudiant WHERE
                Etudiant.ID_student=Appartient.ID_student 
                AND Appartient.nomgroupe=Groupe.nomgroupe AND
                Etudiant.ID_student='$ID'";
                $selGID = $dbh->query($sqlGID);
                $AGID = $selGID->fetch(PDO::FETCH_ASSOC);
                $GID = $AGID["nogroupe"];
                
                
                
                $SELECT_Planning = "SELECT Planning.* FROM Planning WHERE Planning.nogroupe='$GID'";
                $fetch_Planning = $dbh->query($SELECT_Planning);
                $DATA_Planning = $fetch_Planning->fetch(PDO::FETCH_ASSOC);
                

                $SELECT_Ville = "SELECT Etudiant.ville FROM Etudiant WHERE Etudiant.ID_student='$ID'";
                $fetch_ville = $dbh->query($SELECT_Ville);
                $AVille = $fetch_ville->fetch(PDO::FETCH_ASSOC);
                $Ville = $AVille['ville'];

                $Lundi = $_POST['Lundi'];
                $Lundi_GB = $_POST['Lundi-GB'];;
                $participation_L = $_POST['participation-L'];;
                $Mardi = $_POST['Mardi'];
                $Mardi_GB = $_POST['Mardi-GB'];
                $participation_M = $_POST['participation-M'];
                $Mercredi_GB = $_POST['Mercredi-GB'];
                $participation_Me = $_POST['participation-Me'];
                $Jeudi = $_POST['Jeudi'];
                $Jeudi_GB = $_POST['Jeudi-GB'];
                $participation_J = $_POST['participation-J'];
                $Vendredi = $_POST['Vendredi'];
                $Vendredi_GB = $_POST['Vendredi-GB'];
                $participation_V = $_POST['participation-V'];
                $Samedi = $_POST['Samedi'];
                $Samedi_GB = $_POST['Samedi-GB'];
                $participation_S = $_POST['participation-S'];

                if ($Lundi = "true") {
                    switch ($Lundi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['lundi-s'];
                            $INSERT_Trajet1 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_L', '$horaireS')
                            ";

                            $insert1 = $dbh->prepare($INSERT_Trajet1);
                            $insert1->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['lundi-e'];
                            $INSERT_Trajet2 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_L', '$horaireE')
                            ";

                            $insert2 = $dbh->prepare($INSERT_Trajet2);
                            $insert2->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['lundi-s'];
                            $INSERT_Trajet3 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_L', '$horaireS')
                            ";

                            $insert3 = $dbh->prepare($INSERT_Trajet3);
                            $insert3->execute();

                            $horaireE = $DATA_Planning['lundi-e'];
                            $INSERT_Trajet4 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_L', '$horaireE')
                            ";

                            $insert4 = $dbh->prepare($INSERT_Trajet4);
                            $insert4->execute();
                            
                        break;
                    }
                }
                if ($Mardi = "true") {
                    switch ($Mardi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['Mardi-s'];
                            $INSERT_Trajet5 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_M', '$horaireS')
                            ";

                            $insert5 = $dbh->prepare($INSERT_Trajet5);
                            $insert5->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['mardi-e'];
                            $INSERT_Trajet6 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_M', '$horaireE')
                            ";

                            $insert6 = $dbh->prepare($INSERT_Trajet6);
                            $insert6->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['mardi-s'];
                            $INSERT_Trajet7 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_M', '$horaireS')
                            ";

                            $insert7 = $dbh->prepare($INSERT_Trajet7);
                            $insert7->execute();

                            $horaireE = $DATA_Planning['mardi-e'];
                            $INSERT_Trajet8 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_M', '$horaireE')
                            ";

                            $insert8 = $dbh->prepare($INSERT_Trajet8);
                            $insert8->execute();
                            
                        break;
                    }
                }
                if ($Mercredi = "true") {
                    switch ($Mercredi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['mercredi-s'];
                            $INSERT_Trajet9 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_Me', '$horaireS')
                            ";

                            $insert9 = $dbh->prepare($INSERT_Trajet9);
                            $insert9->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['mercredi-e'];
                            $INSERT_Trajet10 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_Me', '$horaireE')
                            ";

                            $insert10 = $dbh->prepare($INSERT_Trajet10);
                            $insert10->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['mercredi-s'];
                            $INSERT_Trajet11 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_Me', '$horaireS')
                            ";

                            $insert11 = $dbh->prepare($INSERT_Trajet11);
                            $insert11->execute();

                            $horaireE = $DATA_Planning['mercredi-e'];
                            $INSERT_Trajet12 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_Me', '$horaireE')
                            ";

                            $insert12 = $dbh->prepare($INSERT_Trajet12);
                            $insert12->execute();
                            
                        break;
                    }
                }
                if ($Jeudi = "true") {
                    switch ($Jeudi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['jeudi-s'];
                            $INSERT_Trajet13 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_J', '$horaireS')
                            ";

                            $insert13 = $dbh->prepare($INSERT_Trajet13);
                            $insert13->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['jeudi-e'];
                            $INSERT_Trajet14 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_J', '$horaireE')
                            ";

                            $insert14 = $dbh->prepare($INSERT_Trajet14);
                            $insert14->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['jeudi-s'];
                            $INSERT_Trajet15 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_J', '$horaireS')
                            ";

                            $insert15 = $dbh->prepare($INSERT_Trajet15);
                            $insert15->execute();

                            $horaireE = $DATA_Planning['jeudi-e'];
                            $INSERT_Trajet16 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_J', '$horaireE')
                            ";

                            $insert16 = $dbh->prepare($INSERT_Trajet16);
                            $insert16->execute();
                            
                        break;
                    }
                }
                if ($Vendredi = "true") {
                    switch ($Vendredi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['vendredi-s'];
                            $INSERT_Trajet17 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$GID', '$Ville', '$participation_V', '$horaireS')
                            ";

                            $insert17 = $dbh->prepare($INSERT_Trajet17);
                            $insert17->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['vendredi-e'];
                            $INSERT_Trajet18 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_V', '$horaireE')
                            ";

                            $insert18 = $dbh->prepare($INSERT_Trajet18);
                            $insert18->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['vendredi-s'];
                            $INSERT_Trajet19 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_V', '$horaireS')
                            ";

                            $insert19 = $dbh->prepare($INSERT_Trajet19);
                            $insert19->execute();

                            $horaireE = $DATA_Planning['vendredi-e'];
                            $INSERT_Trajet20 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_V', '$horaireE')
                            ";

                            $insert20 = $dbh->prepare($INSERT_Trajet20);
                            $insert20->execute();
                            
                        break;
                    }
                }
                if ($Samedi = "true") {
                    switch ($Samedi_GB) {
                        case 'Aller':
                            $horaireS = $DATA_Planning['samedi-s'];
                            $INSERT_Trajet21 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_S', '$horaireS')
                            ";

                            $insert21 = $dbh->prepare($INSERT_Trajet21);
                            $insert21->execute();

                        break;
                        case 'Retour':
                            $horaireE = $DATA_Planning['samedi-e'];
                            $INSERT_Trajet22 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_S', '$horaireE')
                            ";

                            $insert22 = $dbh->prepare($INSERT_Trajet22);
                            $insert22->execute();
                        break;
                        case 'Les Deux':
                            $horaireS = $DATA_Planning['samedi-s'];
                            $INSERT_Trajet23 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_S', '$horaireS')
                            ";

                            $insert23 = $dbh->prepare($INSERT_Trajet23);
                            $insert23->execute();

                            $horaireE = $DATA_Planning['samedi-e'];
                            $INSERT_Trajet24 = "INSERT INTO Trajet 
                            (novehicule, villedepart, participation, horaire)
                            VALUES ('$novehicule', '$Ville', '$participation_S', '$horaireE')
                            ";

                            $insert24 = $dbh->prepare($INSERT_Trajet24);
                            $insert24->execute();
                            
                        break;
                    }
                }
                

            }

            echo "</div>";

        }
    }
}
?>
</body>
</html>

