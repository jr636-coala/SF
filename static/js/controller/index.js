app.controller("tController", function($scope, $interval, $sce, $http){
	$scope.tTime = new Date().toLocaleTimeString();
	$scope.contentMargin = document.getElementById("navigation").offsetWidth;
	$scope.nOld = [0,0,""];
	$scope.sidebar = false;
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
	$scope.loadModal("static/page/modal/login.php", "login");
	$scope.loadModal("static/page/modal/markov.php", "markov");
	$scope.loadModal("static/page/modal/random.php", "random");
	$scope.loadModal("static/page/modal/bodge.php", "bodge");
	$scope.loadModal("static/page/modal/blog-new.php", "blog-new");
	//
	
	
	$scope.MODALloadRandomItems = function(){
		$http.get("static/json/modal-randomItems.json").then(function(res){
			$scope.MODALrandomItems = res.data;
		for (let i = 0; i < $scope.MODALrandomItems.length; i++)
			$scope.MODALrandomItems[i].content = $sce.trustAsHtml($scope.MODALrandomItems[i].content);
		});
		$scope.MODALrandomButton = true;
	};

	$scope.openSidebar = function(){
		$scope.sidebar = true;
	};

	$scope.closeSidebar = function(){
		$scope.sidebar = false;
	};
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