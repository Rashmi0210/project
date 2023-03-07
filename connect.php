<?php

$server = "states.mysql.database.azure.com";
$userid ="admin123";
$Password = "gayatri@1234";
$myDB = "statesdb";
$con = mysqli_connect($server,$userid,$Password,$myDB);
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
