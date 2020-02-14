<div class="w3-container">
    <p class="w3-xxxlarge">Computing Theory</p>
</div>
<div class="w3-panel">
    <ul class="w3-ul">
        <div ng-repeat="x in theoryItems"ng-init="x.displayContent">
            <li>
                <button class="w3-button w3-grey w3-hover-dark-grey w3-round-xxlarge"ng-click="x.displayContent=!x.displayContent">{{x.name}}</button>
            </li>
            <div class="w3-panel"ng-show="x.displayContent"ng-bind-html="x.content"></div>
        </div>
    </ul>
</div>
