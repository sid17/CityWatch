<!DOCTYPE html>
<html>
<head>
  <title>ASDDF</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

  <script type="text/javascript" src ="jquery.js"></script>
  <script type="text/javascript" src ="jspdf.min.js"></script>
  <script type="text/javascript" src="./libs/FileSaver.js/FileSaver.js"></script>
	<script type="text/javascript" src="./libs/Blob.js/Blob.js"></script>
	<script type="text/javascript" src="./libs/Blob.js/BlobBuilder.js"></script>
	<script type="text/javascript" src="./libs/Deflate/deflate.js"></script>
	<script type="text/javascript" src="./libs/Deflate/adler32cs.js"></script>
  <script type="text/javascript" src ="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function myFunction()
  {
    var doc = new jsPDF();
       var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };
        doc.fromHTML(document.getElementById('letter').innerHTML, 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
             });
       
        var file_name = window.location.href.split('=')[1];
        doc.save('report'+file_name+'.pdf');
  }
</script>
</head>
<body>
<div id = "letter">
<?php
       
		$id=$_GET['id'];
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
                        $output = "<p><b></b></p>";
                        $output .= "<p>To, <br> The Commisioner</p>";
                        $info = mysql_fetch_array($result);
                        $output .= "<p><b>Subject</b> : Problem of type ".$info['type']." at ".$info['place'];
                        $output .= "<p>This is to bring to your notice that there is a problem of type".$info['type']." at ".$info['place'].". Its description is given below : <br>".$info[desc]."</p>";        
                        $output .= "<p>Thanks</p><p><b>The Initiative team</b></p>";
                        echo $output;
                }
                else
                {
                        die('Could not connect: ' . mysql_error());
                }
?>
</div>
<button class="btn btn-primary" type="button" onclick="myFunction()">Click to generate pdf</button>
</body>
</html>
