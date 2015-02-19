<?php
$name=$_POST['name'];  
$age=$_POST['age']; 
$s_no=$_POST['s_no']; 
$dbhost = 'localhost';
$dbuser = 'smanocha';
$dbpass = '$smanocha$';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{

      die('Could not connect: ' . mysql_error());                               

}
$sql = "INSERT INTO data ".
       "(s_no,name, age) ".
       "VALUES ('$s_no','$name','$age')";
mysql_select_db('interiit');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);

echo('{
   "time": "siddhant",
   "fuck yeah initial victory!!!!": 1385830997715,
   "date": "manocha"
}');
?>
