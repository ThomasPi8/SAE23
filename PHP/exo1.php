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
</style>

<h3> Revenir a index </h3>
	<p> <a href =index.html> vers index.html </a></p>
	<br>

<?php
   echo "Hi R&T";
?>

<br>
<br>

<?php
    for($i=0;$i<5;$i++)
   echo "*";
?>

<br>
<br>

<?php
    for ($i = 0; $i < 3 ; $i++) {
        for ($p=0;$p<5;$p++)
    {
    echo "*";
    }
    echo "<br>";
    }
?>

<br>

<?php
    for ($i = 0; $i < 5 ; $i++) {
        for ($p=0;$p<5-$i;$p++)
    {
    echo "*";
    }
    echo "<br>";
    }
?>


</body>
</html>






