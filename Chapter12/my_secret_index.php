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
<p><a href="my_secret_page1.php">my_secret_page1.php</a></p>
<p><a href="my_secret_page2.php">my_secret_page2.php</a></p>
<p><a href="logout.php">logout</a></p>
</body>
</html>
