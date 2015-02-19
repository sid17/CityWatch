<?php
if (!empty($_POST))
 {
	$obj = json_decode($_POST['mydata']);
	$id=$obj->{'id'};
	$ch_uuid=$obj->{'uuid'};
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

		                 $sql1 = "select * from reviewdata where id=".$id;
		                 mysql_select_db('interiit');
		                $result = mysql_query($sql1);
		                while($info = mysql_fetch_array($result))
		                {
		                   $user_name=$info['name'];
		                   $place=$info['place'];
		                    $lang=$info['lang'];
		                     $lat=$info['lat'];
		                       $desc=$info['desc'];
		                     $type=$info['type'];
		                     $UUID=$info['UUID'];
		                      $zone=$info['zone'];
		                        $status=$info['status'];
				$image=$info['image'];
	}
if ($UUID==$ch_uuid)
{
echo 0;
}
else
{

	$sql ="INSERT INTO `reportdata` ( `name`,`desc`,`place`,`lat`,`lang`,`image`,`status`,`type`,`UUID`,`zone` )  values ('$user_name','$desc','$place','$lat','$lang','$image','$status','$type','$UUID','$zone')";

	

	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not enter data: ' . mysql_error());
	}
	


	$sql2 = "DELETE FROM reviewdata WHERE id= ".$id ;
	    $delete = mysql_query($sql2);
	 //echo $sql2;
	    if(! $delete)
	    {
		echo " Unable to proceed successfully.";
	    }
	    echo 1;
	   }
	}
	mysql_close($conn);
	}
?>

 











			
			

