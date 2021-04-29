<html>
<head>
<title>Test MySQL</title>
<body>
<!-- mysql_test.php -->
<?php
$host="hostname";

mysql_connect($host,”root”,””);
$sql="show status";
$result = mysql_query($sql);
if ($result == 0)
   echo("<b>Error " . mysql_errno() . ": " . mysql_error() . "</b>");
elseif (mysql_num_rows($result) == 0)
   echo("<b>Query executed successfully!</b>");
else
{
?>
<!-- Table that displays the results -->
<table border="1">
  <tr><td><b>Variable_name</b></td><td><b>Value</b></td></tr>
  <?php
    for ($i = 0; $i < mysql_num_rows($result); $i++) {
      echo("<TR>");
      $row_array = mysql_fetch_row($result);
      for ($j = 0; $j < mysql_num_fields($result); $j++) {
        echo("<TD>" . $row_array[$j] . "</td>");
        }
        echo("</tr>");
    }
  ?>
</table>
<?php } ?>
</body>
</html>
