<!DOCTYPE html>
<html>
<style>
.red {
color:red;
}
.blue {
color:blue;
}
.green {
color:green;
}
</style>
<head></head>

<body>
<?php
if ( $_GET['Color'] == 'red'){
	echo "<div class='red'>";
	for ($i =1; $i <= $_GET['NoC'];$i++){
		echo $_GET['char'];
	}
	echo "</div>";
}
if ( $_GET['Color'] == 'blue'){
	echo "<div class='blue'>";
	for ($i =1; $i <= $_GET['NoC'];$i++){
		echo $_GET['char'];
	}	
	echo "</div>";
}
if ( $_GET['Color'] == 'green'){
	echo "<div class='green'>";
	for ($i =1; $i <= $_GET['NoC'];$i++){
		echo $_GET['char'];
	}
	echo "</div>";
}
?>
</body>
</html>
