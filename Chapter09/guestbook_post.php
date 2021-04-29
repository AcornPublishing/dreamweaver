<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<? 
if (($email=="")||($name=="")||($phone==""))
{
	echo "Please fill out the guestbook completely before submitting.";
}
else
{

	$fp = fopen("guestbook.txt", "w") ; //w will append or create a new file
	flock($fp, LOCK_EX); // lock the file

fwrite($fp, "$name signed the guestbook. \nHis e-mail address was $email \nHis phone number was $phone\n\n");
	
flock($fp, LOCK_UN); // unlock the file
	fclose($fp);	

mail("matteo@deviantart.com", "Guestbook Entry Added", wordwrap("$name signed the guestbook. \nHis e-mail address was $email \nHis phone number was $phone", 72, "\n", 1), "Return-Path: <matteo@deviantart.com>\nFrom: Matthew Stephens");
	
mail("$email", "Thanks for Signing the Guestbook", wordwrap("Thanks, $name, for signing the guestbook.", 72, "\n", 1), "Return-Path: <matteo@deviantart.com>\nFrom: Matthew Stephens");

		echo "<font face=verdana size=1>Thanks, " . $name . ", for signing the guestbook.";
}
?>

</body>
</html>
