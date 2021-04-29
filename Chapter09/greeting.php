<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
if ($name=="")
{
// this says that if the name is empty, to display the form.
?>
<font face="Verdana" size="2">
Enter Your Name:
</font>
<form method="GET" action=greeting.php>
<input type="text" name="name">
<input type="submit" value="Submit">
</form>
</body>
</html>
<?
}
else
{
?>

<html>
<font face ="Verdana" size="2">
<body>
Hello, <? echo $name; ?>. How are you?
</body></font>

</html>

<? } ?>