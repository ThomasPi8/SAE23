 <!DOCTYPE html>
<html>
<body>

<style>
    .rouge {
        color : red ; 
    }
    .souligner { 
        text-decoration: underline; 
    }
    .gras {
	font-weight: bold;
    }

</style>
  
<?php
echo "<table border =1>";
echo "<tr>";
for ($up =0 ; $up <= 15 ; $up++){
echo "<th>" ;
echo "$up"; 
echo "</th>" ;
}
echo "</tr>" ;
echo "<tr>" ;  
for ($i=1; $i < 21; $i++){
  echo "<td>";
  echo "<div class = 'gras'>" .$i. "</div>";
  echo "</td>";
    for ($j=1; $j < 16; $j++){
        echo "<td>";
	$res=$j*$i;
        TablePro($res);
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

function TablePro($res){
    if ($res>=1 and $res<=4){
    echo "<div class = 'rouge'>" .$res. "</div>";
    } else if ($res===0){
    echo "<div class = 'gras'>" .$res. "</div>";
    } else if ($res===5){
    echo "<div class = 'souligner'>" .$res. "</div>";
    } else {
        echo $res;
    }
}

?>

</body>
</html> 
