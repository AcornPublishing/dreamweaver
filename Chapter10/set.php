<?
if (($username == "admin") && ($password == "root"))
{				
setcookie("username", $username, time()+604800);
setcookie("password", $password, time()+604800);
echo "Cookie has been set. <a href= form.php>Click here to Visit the Admin Section</a>";
}
else
{
	echo "You entered the wrong username and/or password.";
}
?>
