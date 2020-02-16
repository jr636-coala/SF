<?php
    session_start();

    include("../priv/db.php");

    if (isset($_GET['param'])) {
        if ($_GET['param'] == "logout") {
            session_unset();
            session_destroy();
        }
    }
    else if (isset($_GET['num'])) {
        $_SESSION['blognum'] = $_GET['num'];
    }

    if (isset($_POST['userlogin'])) {
        $x = $db->query("select * from User where username=:user and password=SHA2(:pass,256)",
                        array('user' => $_POST['userlogin'], 'pass' => $_POST['passlogin']));
        if (count($x) != 0) {
            $_SESSION['user'] = $x[0];
        }
        header('Location: /#!/blog');
        die();
    }

    if (isset($_SESSION['user'])) {
    }


    $x = $db->query("select * from Post order by creationDate desc", null);
    $index = 0;
    if (isset($_SESSION['blognum'])) {
        foreach($x as $k=>$v) {
            if ($v['id'] == $_SESSION['blognum']) {
                $index = $k;
            }
        }
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
            <?php echo $x[$index]["creationTime"] ?>
        </div>
    </div>

    <div class="w3-panel">
        <?php echo $x[$index]["content"] ?>
    </div>

    <div class="w3-sidebar w3-bar-block w3-card-4" style="right:0;top:0;height:60vh;">
        <?php
        if (!isset($_SESSION['user'])) {
            echo "
            <form id='loginForm' class='w3-bar-item w3-tiny' action='static/page/blog.php' method='post'>
                <input class='w3-input' placeholder='username' name='userlogin'/>
                <input class='w3-input' type='password' placeholder='password' name='passlogin'/>
                <input type='submit' value='Login' class='w3-button w3-blue w3-round w3-right'>
            </form>";
        } else {
            echo "
            Welcome " . $_SESSION['user']['username'];
            echo "
            <a href='#!/blog/dash' class='w3-bar-item w3-button w3-tiny'>Dashboard</a>
            <a href='#!/blog/0/logout' class='w3-bar-item w3-button w3-tiny'>Logout</a>
            ";
        }
        ?>
        <br />
        <div class="w3-bar-item">
            Previous Posts:
        </div>
        <?php
            unset($x[$index]);
            forEach($x as $k=>$v) {
                $title = $v["title"];
                $date = $v["creationDate"];
                $id = $v["id"];
                echo "<a href='#!/blog/$id' class='w3-bar-item w3-button'>$title<span class='w3-small w3-right'>$date</span></a>";
                echo "<a href='static/php/deletePostTest.php?id=$id' class='w3-xsmall w3-button'>&times;</a>";
            }
        ?>
   </div>
</div>