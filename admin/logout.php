<?php
session_start();
if(isset($_SESSION['email']))
{
	session_destroy();
	$_SESSION['email'] = '';
	header("Location: index.php");
} else {
	header("Location: index.php");
}

?>