<?php
	session_start();

	if (!isset($_SESSION['user'])) {
		header("Location: /#!/blog");
		die();
	}

	include ("../priv/db.php");

	$db->run("INSERT INTO Post(title, content, userId, creationDate, creationTime) VALUES(:title, :content, :user, CURRENT_DATE, CURRENT_TIMESTAMP)", array("title" => $_POST['title'], "content" => $_POST['content'], "user" => $_SESSION['user']['id']));

	header("Location: /#!/blog");
?>
