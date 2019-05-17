<?php
session_start();

if(isset($_SESSION['user'])){

	unset($_SESSION['user']);
	setcookie('authToken', '', time() - 5000);
}
header('Location: index.php');
die;


?>
