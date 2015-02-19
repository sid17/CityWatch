<?php
	if (!empty($_POST))
	{
		$obj = json_decode($_POST[mydata]);
		$num = $obj->{'num'};
		$id = $obj->{'id'};
$sql="SELECT id, ( 3959 * acos( cos( radians(26.514724) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians(80.24190900000008) ) + sin( radians(26.514724) ) * sin( radians( lat ) ) ) ) AS distance FROM reportdata HAVING distance < 25 ORDER BY distance LIMIT 0 , 20";

		$places = ();
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
			while($info = mysql_fetch_array($result))
			{
				$var = array($info['lat'],$info['lang'],$info['place']);
				array_push($places, $var);
			}
			echo json_encode($places);
	}
?>
