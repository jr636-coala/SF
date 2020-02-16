<div class="w3-modal-content w3-card-4 w3-animate-top w3-round">
	<div class="w3-container w3-light-grey w3-round">
		<span ng-click="closeModal()" class="w3-button w3-display-topright w3-xlarge w3-round">
			&times;
		</span>
		<h1>
			Markov Chains & N-grams
		</h1>
		<form>
			<ul class="w3-ul">
				<li>
				<label class="w3-row">
					Order
				</label>
				<input type="range" ng-model="nOrder" max="10" min="1" />
				<span>
					{{nOrder}}
				</span>
				</li>
				<li>
				<label class="w3-row">
					Length
				</label>
				<input type="range" ng-model="nLength" max="2000" min="50" />
				<span>
					{{nLength}}
				</span>
				</li>
				<li>
				<label class="w3-row">
					Input Text
				</label>
				<textarea cols="100" rows="7" ng-model="nText"></textarea>
				<textarea cols="100" rows="7" ng-bind="nMarkov" disabled class="w3-white w3-text-black"></textarea>
				</li>
			</ul>
		</form>
	</div>
</div>