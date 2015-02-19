<?php
if (!empty($_POST))
{
                $obj = json_decode($_POST['mydata']);
                $lat=$obj->{'lat'};
                $lang=$obj->{'lang'};
$final="";             
$query="";
$location="";
$sql="SELECT id,place,lat,lang,`desc`,type  FROM reportdata ORDER BY id DESC limit 50";
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
      	$a = array();
        while ($row = mysql_fetch_assoc($result))
        {
             array_push($a,$row);

        }
echo (json_encode($a));
}
}
else
{
echo ("invalid");
}
?>

