<div class="w3-container">
    <p class="w3-xxxlarge">Other Projects</p>
</div>
<div class="w3-panel w3-card-4">My programming language of choice is C++ which I try to use whenever possible.
    <div class="w3-xlarge w3-panel">List of Projects</div>
    <div class="w3-large w3-panel">Github</div>
    <ul class="w3-ul">
        <li ng-repeat="x in gitItems">
            <a href="{{x.link}}"target="_blank">{{x.name}}</a>
            <div class="w3-panel"ng-bind-html="x.content"></div>
        </li>
    </ul>
    <div class="w3-large w3-panel">Others (Dead (Mostly))</div>
    <ul class="w3-ul">
        <li ng-repeat="x in otherItems">
            <a target="_blank"style="text-decoration:underline;">{{x.name}}</a>
            <div class="w3-panel"ng-bind-html="x.content"></div>
        </li>
    </ul>
</div>