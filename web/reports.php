<?php
header('Content-type: application/json');

$server = "localhost";
$username = "p472666_rice";
$password = "T=t6Grz9W[rm";
$database = "p472666_rice";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);

$sql = "SELECT id, description, name, image FROM reports ORDER BY id DESC";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$bugs = array();

while($row = mysql_fetch_assoc($result)) {
	$bugs[] = $row;
}

echo $_GET['jsoncallback'] . '(' . json_encode($bugs) . ');';

mysql_close($con);
?>