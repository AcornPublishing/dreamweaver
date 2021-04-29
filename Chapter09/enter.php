<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
if ($age < 13) {
		if ($state == "Oklahoma")
				{
echo "We don't allow people under 13 from Oklahoma";
		}
		elseif ($state == "Texas")
		{
echo "We don't allow people under 13 from Texas";
}
		}
else 	{
		echo "You are able to enter.";
				}
if ($state === $age) {

echo "State and Age must be different types and not equal.";
			}
?>
</body>
</html>
