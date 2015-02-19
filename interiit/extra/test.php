<?php
$dbhost = 'localhost';
$dbuser = 'smanocha';
$dbpass = '$smanocha$';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{

      die('Could not connect: ' . mysql_error());                               

}
$sql = 'INSERT INTO data '.
       '(s_no,name, age) '.
       'VALUES ( 12, "XYZ", 20)';
mysql_select_db('interiit');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
?>

