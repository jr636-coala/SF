<?php
	session_start();

	if(!isset($_SESSION['user'])) {
		//	header("Location: /#!/blog");
		echo "Not logged in";
		die();
	}

	include("../priv/db.php");

	$x = $db->query("SELECT userId FROM Post WHERE id=:id", array("id" => $_POST['postId']));

	if (count($x) > 0 && $_SESSION['user']['id'] == $x[0]['userId']) {
		$db->run("DELETE FROM Post WHERE id=:id", array("id" => $_POST['postId']));
	}
	header("Location: /#!/blog/dash");
	die();
?>
