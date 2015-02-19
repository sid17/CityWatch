<?php
	if (!empty($_POST))
	{
		$obj = json_decode($_POST['mydata']);
		$id=$obj->{'id'};
		$number=$obj->{'number'};
		$height=$obj->{'height'};
		$sql = "select * from reportdata order by id desc limit $id , $number";
		$output = "";
		$net = "";
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
			
			
			$last = strrpos($info['place'], ',');
			if ($last === false) 
			{
  			$next_to_last=0;
			}
			else
			{
			$next_to_last = strrpos($info['place'], ',', $last - strlen($info['place']) - 1);
			}	
                    	$my_place=substr($info['place'], 0,$next_to_last );
                    	
                    	
                    	if ($info['type']==1)
                    	{
                    	$my_type="Damaged Roads";
                    	}
                    	else if ($info['type']==2)
                    	{
                    	$my_type="Garbage Dumps";
                    	}
                    	else if ($info['type']==3)
                    	{
                    	$my_type="Water Logging";
                    	}
                    	else if ($info['type']==4)
                    	{
                    	$my_type="Sewage Problems";
                    	}
                    	else if ($info['type']==5)
                    	{
                    	$my_type="Others";
                    	}
                    	 	
                		
                		
          $descrptn = substr($info['desc'], 0,25) . "...";
         $output.="<hr><div  style='height:".$height."px;background-color:white;width:100%;overflow:hidden'>";
$output.="<a href='#display_recent' style='text-decoration:none;font-size:180%;' onclick='update_recent(this)' data-status='".$info['status']."' data-time='".$info['time']."'        data-long='".$info['lang']."' data-lat='".$info['lat']."' id='".$info['id']."' >";
           $output.="<div style='height:100%;width:30%;background-color:white;float:left'><img "; 					   		$output.="src='".$info['image']."' style='width:100%;height:100%'/></div>";
                    		$output.="<div class='status".$info['status']."' style='height:100%;width:70%;float:right;word-wrap:"; 
                    		$output.="break-word;text-decoration:none;color:#384c80;'>"."<p style='font-size:50%;'><b>".$my_type."</b><br><p style='font-size:30%;'>".$my_place ."</p></p>";
                    		$output.="</div><div style='display:none' id='hidden_desc'>".$info['desc']."</div></a></div><hr>";
                    		
                    		
                		
				
				
				
				
				
				
				

			}
			echo $output;
		}
	}
	else
	{
		echo ("failed to fetch the data");
	}
?>

 

