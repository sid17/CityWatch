<?php
	$dbhost = 'localhost';
	$dbuser = 'smanocha';
	$dbpass = '$smanocha$';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	$sql = "SELECT `lat`, `lang`,`id` FROM reportdata";
	if(! $conn )
	{
	    die('Could not connect: ' . mysql_error());
	}
	else
	{
		mysql_select_db('interiit');
        $result = mysql_query($sql);
        $a = array();
        while ($row = mysql_fetch_assoc($result))
        {
                   array_push($a,$row);
        }
         echo (json_encode($a));
	}
?>