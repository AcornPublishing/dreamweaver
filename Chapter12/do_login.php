<?php require_once('Connections/myConn.php'); ?>
<?php
$username=$_POST["username"];
$password=md5($_POST["password"]);
mysql_select_db($database_myConn, $myConn);
$query_login = "SELECT username,password FROM members WHERE username='$username' and password='$password'";
$login = mysql_query($query_login, $myConn) or die(mysql_error());
$row_login = mysql_fetch_assoc($login);
$totalRows_login = mysql_num_rows($login);
if($totalRows_login >=1) {
session_start();
session_register("auth");
header("Location: my_secret_index.php");
exit;
} else {
header("Location: login.php");
exit;
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>
<?php
mysql_free_result($login);
?>

