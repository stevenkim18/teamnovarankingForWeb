<?php 

$conn = mysqli_connect( 
	'13.124.64.187', 
	'teamnovaranking', 
	'teamnovaranking1234', 
	'ranking', 
	'3306'); 
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}

$sql = "SELECT VERSION()"; 
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($result); 
print_r($row["VERSION()"]); 

?>
