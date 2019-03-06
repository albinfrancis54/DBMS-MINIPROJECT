<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$db = new Database();
$trn_id = $_SESSION['train'];

$sql = "SELECT *
		FROM train
		WHERE trn_id = ?;
";

$train = $db->getRow($sql, [$trn_id]);


$db->Disconnect();