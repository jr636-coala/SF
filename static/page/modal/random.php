<div class="w3-modal-content w3-card-4 w3-animate-top w3-round">
	<div class="w3-container w3-light-grey w3-round">
		<span ng-click="closeModal()" class="w3-button w3-display-topright w3-xlarge w3-round">
			&times;
		</span>
		<h1>
			Random Code Stuff
		</h1>
		<span class="w3-button" ng-click="MODALloadRandomItems()"></span>
		
		<div class="w3-panel" ng-show="MODALrandomButton">
			<ul class="w3-ul">
				<div ng-repeat="x in MODALrandomItems" ng-init="x.displayContent">
					<li><button class="w3-button w3-grey w3-hover-dark-grey w3-round-xxlarge" ng-click="x.displayContent = !x.displayContent">{{x.name}}</button></li>
				<div class="w3-panel w3-border" ng-show="x.displayContent" compile-html="x.content">
				</div>
		</div>
	</ul>
</div>
	</div>
</div>