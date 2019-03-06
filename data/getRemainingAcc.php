<?php 
require_once('../database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

$db = new Database();

if(isset($_POST['acc']) && isset($_POST['tp'])){
	$acc_id = $_POST['acc'];
	$tp = $_POST['tp'];
	$dp_date = $_SESSION['departure_date'];

	$sql = "CALL myproc ('".$acc_id."','".$dp_date."');";
	$result = $db->getRow($sql, [$acc_id, $dp_date]);
	$return['value'] = $result['totalBooked'] - $tp;
	

	echo $tp;
}


$db->Disconnect(); 


