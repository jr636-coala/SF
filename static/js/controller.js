app.controller("tController", function($scope, $interval){
	$scope.tTime = new Date().toLocaleTimeString();
	$scope.nOld = [0,0,""];
	$interval(function(){
			$scope.tTime = new Date().toLocaleTimeString();
			console.log($scope.markov.g($scope.nOrder,$scope.nText));
			let rand = Math.floor(Math.random()*($scope.nText.length-$scope.nOrder));
			let nNew = $scope.markov.k($scope.markov.g($scope.nText,$scope.nOrder),$scope.nText.substring(rand,rand+$scope.nOrder),$scope.nOrder,$scope.nLength);
			if ($scope.nOrder!=$scope.nOld[0]||$scope.nLength!=$scope.nOld[1]||$scope.nText!=$scope.nOld[2])
				$scope.nMarkov = nNew.substring(nNew.indexOf('.')+1);
			$scope.nOld = [$scope.nOrder,$scope.nLength,$scope.nText];
	}, 1000);
	$scope.nLength = 1000;
	$scope.nText = "";
	$scope.contentMargin = document.getElementById("navigation").offsetWidth;
	$scope.markov = {
		g:function(t,o){let g={};for(let i=0;i<t.length-o;i++){let x=t.substring(i,i+o);if(!(x in g)){g[x]=[]}g[x].push(t.charAt(i+o))}return g;},
		k:function(n,i,o,s){let w=i;for(let i=0;i<s-o;i++){let p=n[w.substring(i,i+o)];if(!p){break;}w+=p[Math.floor(Math.random()*p.length)]}return w;}
	};
});


app.controller("cTheory", function($scope, $sce, $http){
	document.title = "Theory";
	$scope.theoryItems = [];
	
	$http.get("./static/json/theory.json").then(function(res){
		$scope.theoryItems = res.data;
		for (let i = 0; i < $scope.theoryItems.length; i++)
			$scope.theoryItems[i].content = $sce.trustAsHtml($scope.theoryItems[i].content);
	});
});

app.controller("cProjects", function($scope, $sce, $http){
	document.title = "Projects";
	$scope.gitItems = [];
	
	$http.get("./static/json/gitProjects.json").then(function(res){
		$scope.gitItems = res.data;
		for (let i = 0; i < $scope.gitItems.length; i++)
			$scope.gitItems[i].content = $sce.trustAsHtml($scope.gitItems[i].content);
	});

	$scope.otherItems = [];
	
	$http.get("./static/json/otherProjects.json").then(function(res){
		$scope.otherItems = res.data;
		for (let i = 0; i < $scope.otherItems.length; i++)
			$scope.otherItems[i].content = $sce.trustAsHtml($scope.otherItems[i].content);
	});
});

app.controller("cTwisty", function($scope, $sce, $http){
	document.title = "Puzzles";
	$scope.items = [];
	
	$http.get("./static/json/puzzles.json").then(function(res){
		$scope.items = res.data;
		for (let i = 0; i < $scope.items.length; i++)
			$scope.items[i].content = $sce.trustAsHtml($scope.items[i].content);
	});
});

app.controller("cMaths", function($scope){
	document.title = "Maths";
});

app.controller("cComputing", function($scope){
	document.title = "Computing";
});

app.controller("cALevel", function($scope){
	document.title = "A-Level";
});

app.controller("cContact", function($scope){
	document.title = "Contact";
});

app.controller("cHome", function($scope){
	document.title = "Home";
});

app.controller("cHobbies", function($scope){
	document.title = "Hobbies";
});
