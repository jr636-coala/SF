app.controller("tController", function($scope, $interval, $sce, $http){
	$scope.tTime = new Date().toLocaleTimeString();
	$scope.contentMargin = document.getElementById("navigation").offsetWidth;
	$scope.nOld = [0,0,""];
	$interval(function(){
			$scope.tTime = new Date().toLocaleTimeString();
			let rand = Math.floor(Math.random()*($scope.nText.length-$scope.nOrder));
			if ($scope.nOrder!=$scope.nOld[0]||$scope.nLength!=$scope.nOld[1]||$scope.nText!=$scope.nOld[2])
			{	
				let nNew = $scope.markov.k($scope.markov.g($scope.nText,$scope.nOrder),$scope.nText.substring(rand,rand+$scope.nOrder),$scope.nOrder,$scope.nLength);
				$scope.nMarkov = nNew.substring(nNew.indexOf('.')+1);
			}
			$scope.nOld = [$scope.nOrder,$scope.nLength,$scope.nText];
	}, 1000);
	// Markov Stuff
	$scope.nLength = 1000;
	$scope.nText = "";
	$scope.markov = {
		g:function(t,o){let g={};for(let i=0;i<t.length-o;i++){let x=t.substring(i,i+o);if(!(x in g)){g[x]=[]}g[x].push(t.charAt(i+o))}return g;},
		k:function(n,i,o,s){let w=i;for(let i=0;i<s-o;i++){let p=n[w.substring(i,i+o)];if(!p){break;}w+=p[Math.floor(Math.random()*p.length)]}return w;}
	};
	//
	
	$scope.loadModal = function(path,name){
		$http.get(path).then(function(res){
			$scope.modals[name] = $sce.trustAsHtml(res.data);
		});
	};
	$scope.showModal = function(modal){
		$scope.modalContent = $scope.modals[modal];
		document.getElementById('modal').innerHTML = "";
		document.getElementById('modal').style.display='block';
	};
	$scope.closeModal = function(){
		document.getElementById('modal').style.display='none';
		$scope.modalContent = $scope.modals["bodge"];
	};
	// Load Modals
	$scope.modals = {};
	$scope.loadModal("./static/pages/modal/login.html", "login");
	$scope.loadModal("./static/pages/modal/markov.html", "markov");
	$scope.loadModal("./static/pages/modal/random.html", "random");
	$scope.loadModal("./static/pages/modal/bodge.html", "bodge");
	//
	
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

// Stolen from - https://odetocode.com/blogs/scott/archive/2014/09/10/a-journey-with-trusted-html-in-angularjs.aspx
app.directive("compileHtml", function($parse, $sce, $compile) {
    return {
        restrict: "A",
        link: function (scope, element, attributes) {
 
            var expression = $sce.parseAsHtml(attributes.compileHtml);
 
            var getResult = function () {
                return expression(scope);
            };
 
            scope.$watch(getResult, function (newValue) {
                var linker = $compile(newValue);
                element.append(linker(scope));
            });
        }
    }
});