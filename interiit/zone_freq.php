<?php
		if (!empty($_POST))
		{
		$obj = json_decode($_POST['mydata']);
                $state=$obj->{'state'};
                if ($state==1)
                {
		$sql = "select * from reportdata";
		$dbhost = 'localhost';
		$dbuser = 'smanocha';
		$dbpass = '$smanocha$';
		$x=0;
		$y=0;
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		/*$type_count=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0

);
		$ward_1=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12  	 => 0,
	    13    => 0,
	    14    => 0
	    

);

		$ward_2=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12  	 => 0,
	    13    => 0,
	    14    => 0
	    

);

		$ward_3=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12  	 => 0,
	    13    => 0,
	    14    => 0
	    

);

		$ward_4=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12  	 => 0,
	    13    => 0,
	    14    => 0
	    

);

		$ward_5=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12   => 0,
	    13    => 0,
	    14    => 0
	   

);

		$ward_cumulative=array(
	    1    => 0,
	    2  	 => 0,
	    3    => 0,
	    4    => 0,
	    5	 => 0,
		6    => 0,
	    7  	 => 0,
	    8    => 0,
	    9    => 0,
	    10	 => 0,
	    11    => 0,
	    12   => 0,
	    13    => 0,
	    14    => 0
	   

);*/
$type_count=array();
$ward_1=array();
$ward_2=array();
$ward_3=array();
$ward_4=array();
$ward_5=array();
$ward_cumulative=array();	   

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
				$x=$x+1;
				//echo("hello");
			if ($info['type']==1)
			{
				$type_count[1]+=1;
				$ward_1[$info['zone']]+=1;
			}
			else if($info['type']==2)
			{
				$type_count[2]+=1;
				$ward_2[$info['zone']]+=1;
			}
			else if($info['type']==3)
			{
				$type_count[3]+=1;
				$ward_3[$info['zone']]+=1;

			}
			else if($info['type']==4)
			{
				$type_count[4]+=1;
				$ward_4[$info['zone']]+=1;
			}
			else if($info['type']==5)
			{
				$type_count[5]+=1;

				$ward_5[$info['zone']]+=1;
			}
			else
				$y++;

		}
			for ($i=1;$i<=15;$i++)
			{
				$ward_cumulative[$i]=$ward_1[$i]+$ward_2[$i]+$ward_3[$i]+$ward_4[$i]+$ward_5[$i];
			}
			//echo ("ward1</br>");
			//echo implode(", ", $ward_1);
			//echo ("</br>ward2</br>");
			//echo implode(", ", $ward_2);
			//echo ("</br>ward3</br>");
			//echo implode(", ", $ward_3);
			//echo ("</br>ward4</br>");
			//echo implode(", ", $ward_4);
			//echo ("</br>ward5</br>");
			//echo implode(", ", $ward_5);
			//echo ("</br>cumulative</br>");
			//echo implode(", ", $ward_cumulative);
			//echo ("</br>type</br>");
			//echo implode(", ", $type_count);
			//echo ("</br>total</br>");
			//echo($x);
			//echo ("</br>others</br>");
			//echo($y);
			$stack=array();
			array_push($stack, $ward_1,$ward_2,$ward_3,$ward_4,$ward_5,$ward_cumulative,$type_count);
			echo (json_encode($stack));

			
		}
}}

		

		?>

 

