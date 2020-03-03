<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        die();
    }

    include("../../priv/db.php");

    $x = $db->query("select * from Post where userId=:id", array('id' => $_SESSION['user']['id']));
?>

<div class="w3-container">
    <div class="w3-jumbo">
	Dashboard
	<form id="form" method="post" action="{{formAction}}" style="display:none;">
	<input name="postId" ng-value="postId" />
	</form>
    </div>
</div>

<div class="w3-panel">
    <div class="w3-bar w3-black w3-row">
        <button class="w3-bar-item w3-col s4 m4 l4 w3-button" ng-click="tab='feed'">Feed</button>
        <button class="w3-bar-item w3-col s4 m4 l4 w3-button" ng-click="tab='posts'">Posts</button>
        <button class="w3-bar-item w3-col s4 m4 l4 w3-button" ng-click="tab='settings'">Settings</button>
    </div>
    <div class="w3-card" ng-show="tab=='feed'">
    Hello Feed
    </div>
    <div class="w3-card" ng-show="tab=='posts'">
    <div class="w3-row">
        <div class="fa fa-plus w3-button w3-right w3-xxlarge" ng-click="showModal('blog-new')">
            New Post
        </div>
    </div>
    <?php
        if (count($x) == 0) {
            echo "No posts";
        } else {
            foreach($x as $v) {
                $id = $v['id'];
                $title = $v['title'];
                echo "<a class='w3-button' href='#!/blog/$id'>$title</a>";
                echo "<a class='w3-button w3-right fa fa-trash' ng-click='doAction(\"delete\", $id)' title='Delete'></a>";
                echo "<a class='w3-button w3-right fa fa-edit' ng-click='doAction(\"edit\", $id)' title='Edit'></a>";
		echo "<br />";
            }
        }
    ?>
    </div>
    <div class="w3-card" ng-show="tab=='settings'">
    Hello Settings
    </div>
</div>
