<?php
$mysql_hostname = "localhost";

$mysql_user = "smanocha";

$mysql_password = '$smanocha$';

$mysql_database = "interiit";

$prefix = "";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");

mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>
