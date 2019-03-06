<?php 
require_once('../database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$db = new Database();

if(isset($_POST['acc']) && isset($_POST['tr']) && isset($_POST['tp'])){
	$_SESSION['accomodation'] = $_POST['acc'];
    $_SESSION['train'] = $_POST['tr'];
	$_SESSION['totalPass'] = $_POST['tp'];

	$acc_id = $_POST['acc'];
    $trn_id = $_POST['tr'];
	$tp = $_POST['tp'];
	$dp_date = $_SESSION['departure_date'];


	$return['valid'] = true;
	$return['url'] = "passenger.php";


	$sql = "SELECT COUNT(*) as totalBooked
			FROM booked 
			WHERE acc_id = ?
			AND book_departure = ?
	";
	$result = $db->getRow($sql, [$acc_id, $dp_date]);

	$slot = 30 - $result['totalBooked'];	
	$slot = $slot - $tp;
	$wtf['slot'] = $slot;
	echo json_encode($wtf);
}//end isset