<?php
if (!empty($_POST))
        {
                $obj = json_decode($_POST['mydata']);
                $lat=$obj->{'lat'};
                $lang=$obj->{'lang'};



//$lat=26.514724;
//$lang=80.24190;
$query="";
$location="";
$sql="SELECT id,place,lat,lang,`desc`,type, ( 3959 * acos( cos( radians(".$lat.") ) * cos( radians( lat ) ) * cos( radians( lang ) - radians(".$lang.") ) + sin( radians(".$lat.") ) * sin( radians( lat ) ) ) ) AS distance FROM reportdata HAVING distance < 200 ORDER BY distance LIMIT 0 , 20";
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
        while ($row = mysql_fetch_assoc($result))
        {
                    $query="['".$row['place']."".$row['desc']."',". $row['lat'].",".$row['lang'].",".$row['type']."]";
                    $location.=$query.",";
                   

        }
        echo "[".$location."]";

}
}
else
{
echo ("invalid");
}

?>

