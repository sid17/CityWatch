<?php
	if (!empty($_POST))
	{
		$obj = json_decode($_POST['mydata']);
		$id=$obj->{'id'};
		$number=$obj->{'number'};
		$sql = "select * from reportdata order by id desc limit $id , $number";
		$output = "";
		//connecting to mysql db
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
				$descrptn = substr($info['desc'], 0,25) . "...";
				$output .= "<div class='report'>";
				$output .= "<table border = '1' style='width = 100%'>";
				$output .= "<tr><td>";
				$output .= "<img src =".$info['image']."></img></td>";
				$output .= "<td><p><b>".$info['type']." at ".$info['place']."</b><br>".$descrptn ."</p>";
				$output .= /*"<p>It has been inserted at ".$info['time']."</p>*/"</td></tr></table></div>";

			}
			echo $output;
		}
	}
	else
	{
		echo ("failed to fetch the data");
	}
?>

 

