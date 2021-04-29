<?php 
include ("header.php");
?>
<?php require_once('Connections/friendsofed.php'); ?>
<?php
mysql_select_db($database_friendsofed, $friendsofed);
$query_Recordset1 = "SELECT * FROM pics_europe ORDER BY ID ASC";
$Recordset1 = mysql_query($query_Recordset1, $friendsofed) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php do { ?>
<table width="210" height="49" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td><img src="<?php echo $row_Recordset1['Image']; ?>" alt="" name="dynamicImage" hspace="6" style="background-color: #FFFFFF"></td>
    <td><strong>Name: </strong><?php echo $row_Recordset1['Title']; ?><br> <strong>Cost:</strong> 
      <?php if ($row_Recordset1["Cost"] == 0) {
	echo "FREE&nbsp&nbsp<A HREF=\"photos/".$row_Recordset1["Path_zip"]."\">.zip</A>&nbsp|&nbsp<A HREF=\"photos/".$row_Recordset1["Path_sit"]."\">.sit</A> ";
} else {
	echo "$".$row_Recordset1["Cost"]."&nbsp&nbsp<a href=\"https://www.paypal.com/cgibin/webscr?amount=".$row_Recordset1["Cost"]."&no_shipping1&item_name=".$row_Recordset1["Title"]."&business=todd%40mindgrub.com&item_number=".$row_Recordset1["ID"]."&invoice=".$row_Recordset1["ID"]."&cmd=_xclick&no_note=1\" target=\"_blank\">BUY</a>";
}
?>
      <br> <strong>Desc:</strong> <?php echo $row_Recordset1['Description']; ?><?php echo"<a href=\"javascript:openNewWindow('photos/".$row_Recordset1["DemoURL"]."',".$row_Recordset1["popWidth"]."," .$row_Recordset1["popHeight"].")\">view</a>"?></td>
  </tr>
  <tr> 
    <td><img src="/Images/gray.gif" width="100%" height="1"></td>
    <td><img src="/Images/gray.gif" width="90%" height="1"></td>
  </tr>
</table>
<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<?php
mysql_free_result($Recordset1);
?>
