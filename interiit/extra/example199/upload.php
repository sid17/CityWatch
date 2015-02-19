<?php
include('db.php');
session_start();
$session_id='1'; //$session id
function bytesToSize1024($bytes, $precision = 2) 
{
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}
$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
echo <<<EOF
<p>Your file: {$sFileName} has been successfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;

$path = "uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['image_file']['name'];
$size = $_FILES['image_file']['size'];
echo ($name."</br>");
echo ($size."</br>");
$tmp = $_FILES['image_file']['tmp_name'];
echo ($tmp);
$uploads_dir = '/uploads';
echo ("entered1");
$tmp_name = $_FILES["image_file"]["tmp_name"][$key];
$name = $_FILES["image_file"]["name"][$key];
if (is_uploaded_file ($tmp_name  ))
{
echo ("true");
}
else
{
echo ("false");
}
echo ("entered2");

}

?>



