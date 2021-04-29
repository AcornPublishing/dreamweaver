<?php 
// This file is in the downloads as badvarnames.php
$1stNumber = 15;		// Bad! Cannot start with a number!
$your name = "Steve";	// Bad! Spaces not allowed!
$sun&moon = true;		// Bad! Alphanumeric and _ only!

$firstNumber = 15; 		// Good!
$your_name = "Steve";	// Good!
$sunAndMoon = true;		// Good!
$_test = "Good";		// Good! Can start with _
?>
