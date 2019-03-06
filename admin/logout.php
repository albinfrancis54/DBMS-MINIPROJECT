<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}

unset($_SESSION['logged']);

header('Location: index.php');
