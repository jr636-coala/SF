<?php
    include ("../priv/db.php");

    $db = new DB("myDB");

    $x = $db->query("select * from Test order by date desc");

    $index = 0;
    if (isset($_GET['num'])) {
        $index = $_GET['num'];
    }
?>

<div class="w3-card">
    <div class="w3-container">
        <p class="w3-xxxlarge">
            <?php echo $x[$index]["title"] ?>
        </p>

        <div class="w3-third" style="color: rgba(0,0,0,0);">
        x
        </div>
        <div class="w3-third" style="color: rgba(0,0,0,0);">
        x
        </div>
        <div class="w3-third w3-small">
            <?php echo $x[$index]["time"] ?>
        </div>
    </div>

    

    <div class="w3-panel">
        <?php echo $x[$index]["content"] ?>
    </div>

    <div class="w3-sidebar w3-bar-block w3-card-4" style="right:0;top:0;height:500px;">
        <div class="w3-bar-item">
            Previous Posts:
        </div>
        <?php
            unset($x[$index]);
            forEach($x as $k=>$v) {
                $title = $v["title"];
                $date = $v["date"];
                $id = $v["id"];
                echo "<a href='#!/blog/$k' class='w3-bar-item w3-button'>$title<span class='w3-small w3-right'>$date</span></a>";
                echo "<a href='static/php/deletePostTest.php?id=$id' class='w3-xsmall w3-button'>&times;</a>";
            }
        ?>
   </div>
</div>