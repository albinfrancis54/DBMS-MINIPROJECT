<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session n
}
$db = new Database();
$tracker = $_SESSION['tracker'];

$sql = "call myproc(?)";
$bookPass = $db->getRows($sql, [$tracker]);

$sqlBookBy = "SELECT * 
			  FROM booked
			  WHERE book_tracker = ?
			  LIMIT 1;
";
$bookByInfo = $db->getRow($sqlBookBy, [$tracker]);



$db->Disconnect();