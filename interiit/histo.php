<?php
$data = array (
               'Column 1' => 8,
               'Column 2' => 5,
               'Column 3' => 8,
               'Column 4' => 5,
               'Column 5' => 8,
               'Column 6' => 6,
               'Column 7' => 7,
               'Column 8' => 8,
               'Column 9' => 9,
               'Column 10' => 8,
               'Column 11' => 12,
               'Column 12' => 4,
               'Column 13' => 2
               );
$max = max($data);
echo '<table>';
foreach ($data as $k=>$v)
{
     echo "<tr><td>$k</td><td><img src='bar.php?max=$max&val=$v'> $v</td></tr>";
}
echo '</table>';
?>