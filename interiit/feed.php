<?php
 if (!empty($_POST))
 {
$obj = json_decode($_POST['mydata']);
$description=$obj->{'desc'};
$dbhost = 'localhost';
$dbuser = 'smanocha';
$dbpass = '$smanocha$';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{

      die('Could not connect: ' . mysql_error());                               

}
$sql ="INSERT INTO `feedback` ( `feedback` )  values ('$description')";

mysql_select_db('interiit');
//echo ($sql);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo ("\nEntered data successfully\n");
mysql_close($conn);
}
?>

 

