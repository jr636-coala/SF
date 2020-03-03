<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
		<link rel="stylesheet"href="https://www.w3schools.com/w3css/4/w3.css"/>
		<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link href="https://fonts.googleapis.com/css?family=Roboto"rel="stylesheet"/>
		<link rel="stylesheet"href="./static/css/style.css"/>
		<link rel="shortcut icon" type="image/png" href="static/res/img/icon.jpg"/>
		<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-quill/4.5.3/ng-quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
	</head>
	<body>
		<div ng-app="tApp" ng-controller="tController">
			<div id="navigation" ng-show="sidebar" class="w3-sidebar w3-bar-block w3-light-grey w3-border w3-card-4 w3-animate-left">
				<div class="w3-xlarge w3-bar-item w3-button" ng-click="closeSidebar()">
					&times;
				</div>
				<a href="#!home" class="w3-bar-item w3-button">Home</a>
				<a href="#!maths" class="w3-bar-item w3-button">Maths</a>
				<div class="w3-dropdown-hover">
					<a href="#!computing"><button class="w3-button">Computing</button></a>
					<div class="w3-dropdown-content w3-bar-block w3-card-4">
						<a href="#!theory" class="w3-bar-item w3-button w3-light-grey">Theory</a>
						<a href="#!alevel" class="w3-bar-item w3-button w3-light-grey">A Level Project</a>
						<a href="#!projects" class="w3-bar-item w3-button w3-light-grey">Other Projects</a>
						<span class="w3-bar-item w3-button w3-light-grey" ng-click="showModal('random')">Random Code Stuff</span>
					</div>
				</div>
				<div class="w3-dropdown-hover">
					<a href="#!hobbies"><button class="w3-button">Hobbies</button></a>
					<div class="w3-dropdown-content w3-bar-block w3-card-4">
						<a href="#!twisty" class="w3-bar-item w3-button w3-light-grey">Twisty Puzzles</a>
					</div>
				</div>
				<a href="#!contact" class="w3-bar-item w3-button">Contact</a>
				<a href="#!blog" class="w3-bar-item w3-button">Blog</a>
				<a href="#!jos" class="w3-bar-item w3-button">JOS</a>


				<!--Login--><div class="w3-container w3-cell"><span class="w3-circle w3-jumbo w3-button fa fa-user w3-{{signedIn?'green':'red'}}"ng-click="showModal('login')"></span></div>
				<!--BlindMarkov--><div class="w3-container w3-cell"><span class="w3-bar-item w3-button fa fa-blind"onclick="document.write('');"></span><span class="w3-bar-item w3-button fa fa-link"ng-click="showModal('markov')"></span></div>
				<!--Time--><div style="position:absolute; top:90%;"ng-bind="tTime"class="w3-panel"></div>
				<div class="w3-bottom w3-margin-bottom w3-text-grey">
					<u>
						<div class="w3-cell-row">
							<a href="#!todo">
								TO-DO
							</a>
						</div>
					</u>
				</div>
			</div>
			<div class="w3-xxxlarge w3-button" ng-click="openSidebar()" style="display: fixed;">
				&#9776;
			</div>
			<div class="w3-rest" style="position: absolute; top: 0px; left: 70px;">
			<!--Content--><div class="w3-content" style="max-width: 70%; position: relative; margin-left:{{contentMargin+10}}px;margin-right:{{contentMargin+10}}px;"><ng-view></ng-view></div>
			</div>
			<!--Modal--><div id="modal" class="w3-modal" onchange="function(){console.log(nicEditors.allTextAreas())}" compile-html="modalContent"></div>
		</div>
		<script>
			var app = angular.module("tApp", ["ngRoute"]);
		</script>

		
		<script src="static/js/routing.js"></script>
		<script src="static/js/controller/index.js"></script>
		<script src="static/js/controller/alevel.js"></script>
		<script src="static/js/controller/computing.js"></script>
		<script src="static/js/controller/contact.js"></script>
		<script src="static/js/controller/hobbies.js"></script>
		<script src="static/js/controller/home.js"></script>
		<script src="static/js/controller/math.js"></script>
		<script src="static/js/controller/projects.js"></script>
		<script src="static/js/controller/theory.js"></script>
		<script src="static/js/controller/todo.js"></script>
		<script src="static/js/controller/twisty.js"></script>
		<script src="static/js/controller/blog.js"></script>
		<script src="static/js/controller/blog-dashboard.js"></script>
		<script src="static/js/controller/jos.js"></script>
        </body>
</html>
