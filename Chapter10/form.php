<?
if (($_COOKIE ['username'] =="admin") && ($_COOKIE['password'] =="root"))
{
echo "Logged in as ";
echo $_COOKIE ['username'];
echo "<BR>This is where you put the valuable information.";
echo "<BR><a href=logout.php>Logout</a>";
} else {
?>
<form action="set.php" method="post" name="cookieset">
<input name="username" type="text" value="username" size="15" maxlength="30">
<input name="password" type="password" size="15" maxlength="30">
<input name="Submit" type="submit" value="Submit">
</form>
<? } ?>
