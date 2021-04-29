<?php 
session_start();
if(!session_is_registered("auth")) {
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
