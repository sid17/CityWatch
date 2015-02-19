<?php
       
              $sql_every = "select `id`,`place`,`image`,`time`,`name`,`desc`,`type`,`status` from reportdata order by id desc";
                $dbhost = 'localhost';
                $dbuser = 'smanocha';
                $dbpass = '$smanocha$';
                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                if($conn)
                {
                        mysql_select_db('interiit');
                        $result = mysql_query($sql_every);
                        $i = 0;
                        
                        while($info = mysql_fetch_array($result))
                        {
                            $btn_s = "<button class='btn btn-primary btn-small' type='button'onclick='genreport(this.id)'id ='".$info['id']."'>Generate Letter</button>";
                            $my_type = "";
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
		            	$my_st = "";
		            	if ($info['status']==0)
		            	{
		            	$my_st="Not started";
		            	}
		            	else if ($info['status']==1)
		            	{
		            	$my_st="In Progress";
		            	}
		            	else
		            	{
		            	$my_st="Done :)";
		            	}
                            $img = "<img src ='".$info['image']."'>";
                                $i++;
                                $output .= "<tr><td>".$info['id']."</td><td>".$my_type."</td><td>".$img."</td><td>".$info['desc']."</td><td>".$info['place']."</td><td>".$info['time']."</td><td>".$my_st."</td><td>".$btn_s."</td></tr>";
                        }
                        echo $output;
                }
                else
                {
                        die('Could not connect: ' . mysql_error());
                }
?>
