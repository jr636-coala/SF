<?php
    include("../priv/db.php");

    $db = new DB("myDB");

    $title = $_GET["title"];
    $content = $_GET["content"];

    $sql = "insert into Test(title, content, date, time) values ('$title', '$content', '" . date("Y-m-d") . "', '". date("Y-m-d H:i:s") ."')";

    echo $sql;

    $db->run($sql);
?>