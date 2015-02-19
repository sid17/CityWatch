<?php
 if (!empty($_POST))
 {
$obj = json_decode($_POST['mydata']);
$image=$obj->{'image'};
$user_name=$obj->{'user_name'};
$place=$obj->{'place'};
$lang=$obj->{'lang'};
$lat=$obj->{'lat'};
$desc=$obj->{'desc'};
$type=$obj->{'type'};
$UUID=$obj->{'uuid'};
$zone=$obj->{'zone'};
$status=0;
echo($image);
 }
 else
 {
 echo ("false");
 }
$dbhost = 'localhost';
$dbuser = 'smanocha';
$dbpass = '$smanocha$';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{

      die('Could not connect: ' . mysql_error());                               

}
$sql ="INSERT INTO `reviewdata` ( `name`,`desc`,`place`,`lat`,`lang`,`image`,`status`,`type`,`UUID`,`zone` )  values ('$user_name','$desc','$place','$lat','$lang','$image','$status','$type','$UUID','$zone')";

mysql_select_db('interiit');
//echo ($sql);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
//echo ("\nEntered data successfully\n");
mysql_close($conn);
?>

 

