<?php
	$sql_total="SELECT count(*) as `c`,type from reportdata where status = 0 group by type ";
	$sql_last_two_day="SELECT count(*) as `c`,type from reportdata where (`time` between sysdate() - interval 2 day and sysdate()) and status = 0  group by type";
	$dbhost = 'localhost';
	$dbuser = 'smanocha';
	$dbpass = '$smanocha$';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	$output = "<p><b>From the citizens of Kanpur</b></p>";
	$output .= "<p>Dear Municipal Corporation</p>";
	$output .= "<p>This is to bring to your notice the following summary of unsolved complaints.</p><p>OVERALL REPORT :</p><p>";
	if($conn)
	{
		mysql_select_db('interiit');
		$result = mysql_query($sql_total);
		while($info = mysql_fetch_array($result))
		{
			$output .= "There are " . $info['c'] . " reports in category " . $info['type'] . ". ";
		}
		$result = mysql_query($sql_last_two_day);
		$output .= "</p><p>LAST TWO DAYS REPORT :</p><p>";
		while($info = mysql_fetch_array($result))
		{
			$output .= "There are " . $info['c'] . " reports in category " . $info['type'] . ". ";
		}
		$output .= "</p><p>Thanks<br><b>The Initiative team</b></p>";
		$file = 'report.html';
		$handle = fopen($file,'w') or die('Cannot open file:  '. $file);
		fputs($handle , $output);
		fclose($handle);
		
		mysql_close($conn);
		echo $output;

	}
	else
	{
		die('Could not connect: ' . mysql_error());
	}
?>