<?php
    include("../priv/db.php");

    $db = new DB("myDB");

    $id = $_GET['id'];

    $db->run("delete from Test where id=$id");

?>