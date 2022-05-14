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


function str_split_unicode($cle, int $l = 1) {
    	if ($l > 0) {
        $ret = array();
	}
}
$str = "67879ABC75C57473D22A103950D18";	
$arr1 = str_split($str);     
	print_r($arr1);
?>
</body>
</html>
