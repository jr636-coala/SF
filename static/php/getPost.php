<?php

	session_start();
	
	include("../priv/db.php");

	$x = $db->query("SELECT * FROM Post WHERE id=:id", array("id" => $_GET['id']));
	
	if (count($x)) {
		echo json_encode($x[0]); 
	}
	else {
		echo "{}";
	}
?>
