<div class="w3-modal-content w3-card-4 w3-animate-top w3-round">
	<div class="w3-container w3-light-grey w3-round">
		<span ng-click="closeModal()" class="w3-button w3-display-topright w3-xlarge w3-round">
			&times;
		</span>
		<h1>
			Login
		</h1>
		<form class="w3-container">
			<label>
				Username
			</label>
			<input class="w3-input w3-margin-bottom" type="text" />
			
			<label>
				Password
			</label>
			<input class="w3-input w3-margin-bottom" type="password" />
			
			<button class="w3-button w3-margin-bottom" ng-click="signedIn=true">
				Login
			</button>
			
		</form>
	</div>
	<div class="w3-container w3-border-top w3-grey w3-round">
		<p class="w3-button w3-red w3-text-white" ng-click="closeModal()">
			Cancel
		</p>
	</div>
</div>