<?
setcookie ("username", $username, time()-604800);
setcookie ("password", $password, time()-604800);
header("Loaction: form.php");
?>
