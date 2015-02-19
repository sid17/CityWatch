<?php
       $obj = json_decode($_POST['mydata']);
		$id=$obj->{'id'};
              $sql_every = "select `id`,`place`,`time`,`name`,`desc`,`type`,`status` from reportdata where id = ". $id;
                $dbhost = 'localhost';
                $dbuser = 'smanocha';
                $dbpass = '$smanocha$';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                if($conn)
                {
                        mysql_select_db('interiit');
                        $result = mysql_query($sql_every);
                         $i = 0;
                        $output = "<p><b>From the citizens of Kanpur</b></p>";
 		        $output .= "<p>Dear Municipal Corporation</p>";
                  	 $info = mysql_fetch_array($result);
			$output .= "<p><b>Subject</b> : Problem of type ".$info['type']." at ".$info['place'];
			$output .= "<p>This is to bring to your notice that there is a problem of type".$info['type']." at ".$info['place'].". Its description is given below : <br>".$info[desc]."</p>";        
			$output .= "<p>Thanks<br><b>The Initiative team</b></p>";
			echo $output;
                        
                }
                else
                {
                        die('Could not connect: ' . mysql_error());
                }
?>
