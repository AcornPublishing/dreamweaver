<?php require_once('Connections/myConn.php'); ?>
<?php
$maxRows_my_contacts = 10;
$pageNum_my_contacts = 0;
if (isset($HTTP_GET_VARS['pageNum_my_contacts'])) {
  $pageNum_my_contacts = $HTTP_GET_VARS['pageNum_my_contacts'];
}
$startRow_my_contacts = $pageNum_my_contacts * $maxRows_my_contacts;

mysql_select_db($database_myConn, $myConn);
$query_my_contacts = "SELECT * FROM contacts ORDER BY id ASC";
$query_limit_my_contacts = sprintf("%s LIMIT %d, %d", $query_my_contacts, $startRow_my_contacts, $maxRows_my_contacts);
$my_contacts = mysql_query($query_limit_my_contacts, $myConn) or die(mysql_error());
$row_my_contacts = mysql_fetch_assoc($my_contacts);

if (isset($HTTP_GET_VARS['totalRows_my_contacts'])) {
  $totalRows_my_contacts = $HTTP_GET_VARS['totalRows_my_contacts'];
} else {
  $all_my_contacts = mysql_query($query_my_contacts);
  $totalRows_my_contacts = mysql_num_rows($all_my_contacts);
}
$totalPages_my_contacts = ceil($totalRows_my_contacts/$maxRows_my_contacts)-1;
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="400" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" bgcolor="#33FFFF">Name</td>
    <td align="center" bgcolor="#33FFFF">Email</td>
    <td align="center" bgcolor="#33FFFF">Comments</td>
  </tr>
  <?php do { ?>
  <tr> 
    <td><?php echo $row_my_contacts['name']; ?></td>
    <td><?php echo $row_my_contacts['email']; ?></td>
    <td><?php echo nl2br($row_my_contacts['comments']); ?></td>
  </tr>
  <?php } while ($row_my_contacts = mysql_fetch_assoc($my_contacts)); ?>
</table>

</body>
</html>
<?php
mysql_free_result($my_contacts);
?>

