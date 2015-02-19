<?php
	if (!empty($_POST))
	{
		$obj = json_decode($_POST['mydata']);
		$id = $obj->{'id'};
		$zone = $obj->{'zone'};
		$sql = "UPDATE reportdata SET `zone` = $zone WHERE `id` = $id";
		$dbhost = 'localhost';
		$dbuser = 'smanocha';
		$dbpass = '$smanocha$';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);

		if(! $conn )
		{
		    die('Could not connect: ' . mysql_error());                              
		}
		else
		{
			mysql_select_db('interiit');
			$result = mysql_query($sql);
			echo $result;
		}
	}
	else
	{
		echo ("failed to fetch the data");
	}
?>
