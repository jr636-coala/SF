<div class="w3-container">
	<p class="w3-xxxlarge">
		Twisty Puzzles
	</p>
</div>
<div class="w3-panel w3-card-4">
	Twisty puzzles are any puzzles in which the permutation or orientation of the pieces it is composed of can be altered by turning part of the puzzle. The most well known of these puzzles is the Rubik's Cube which was released in 1980 and since then has sold over 400 million copies making it one of the best selling toys.
	<div class="w3-xlarge">
		My Collection
	</div>
	<img src="./static/res/img/collection.png" class="w3-round w3-image" usemap="#collectionMap" />
	<div class="w3-panel">
		<ul class="w3-ul">
			<div ng-repeat="x in items" ng-init="x.displayContent">
				<li><button class="w3-button w3-grey w3-hover-dark-grey w3-round-xxlarge" ng-click="x.displayContent = !x.displayContent">{{x.name}}</button></li>
				<div class="w3-panel" ng-show="x.displayContent" ng-bind-html="x.content">
				</div>
			</div>
		</ul>
	</div>
</div>
