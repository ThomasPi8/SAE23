<html>
<head>
<title>Tp Php</title>
</head> 
<body>

<style>
    .color {
        color : green;
    }
    
    .rouge {
        color : red;
    }

	table, td, th {
  border: 1px solid black;
    }

	table {
  width: 20%;
  border-collapse: collapse;
    }

</style>
<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>

<h3> écrire dans l'url loop.php?n= un chiffre cad loop.php?n=5 par exemple </h3>

<?php
$valeur = $_GET['n'];

    if ($valeur<=20 && $valeur>=1) {
    for ($i=0; $i<=$valeur ;$i++) {
    echo "$i";
    echo " ";
    } 
    } else {
    echo "Error";  
    }
?>

<br>
<br>

<?php
$valeur = $_GET['n'];
     for ($n=1; $n<$valeur ; $n++) {
        for ($i=1; $i<$valeur; $i++) {
            echo $n*$i;
            echo " ";
        }
        echo "<br>";
    }
 ?>

<br>
<br>

<?php
$sheesh= $_GET['n'];
    echo "<table>";
    for ($n=1; $n<$sheesh ; $n++) {
        echo "<tr>";
        for ($i=1; $i<$sheesh; $i++) {
        echo "<td>"; 
        $res=$n*$i;

        if ($res >50) {
            echo "<div class = 'rouge'>";
        }
        if ($res >20 && $res <50) {
            echo "<div class = 'color'>"; 
        }
        echo $res;
        echo " ";
        }
        echo "<br>";
    }
 ?>


</body>
</html> 
