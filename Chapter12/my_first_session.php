<?php 
session_start();
$name=$_POST["name"];
session_register("name");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php 
echo ("Hello ". $name);
?>
<p><a href="hello.php">hello.php</a> </p>
</body>
</html>
