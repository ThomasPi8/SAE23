<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$cle = array('0'=>'I','1'=>'N','2'=>'M','3'=>'C',
             '4'=>'L','5'=>'T','6'=>'R','7'=>'E',
             '8'=>'S','9'=>'A','A'=>'U','B'=>'X',
             'C'=>'_','D'=>'O');

$char = $_GET['char'];
$tab = str_split($cle) 


echo "<table border='1'>
<tr>
<th></th>
<th>char</th>
<th>decode</th>
</tr>";

echo "<tr>";
echo "<td>" . "$arr1 = str_split($char);" . "print_r($arr1)"; . "</td>";
echo "<td>" . $tab ."</td>";
echo "</tr>";
}
echo "</table>";


     

?>
</body>
</html>
