app.controller("cProjects", function($scope, $sce, $http){
	document.title = "Projects";
	$scope.gitItems = [];
	
	$http.get("static/json/gitProjects.json").then(function(res){
		$scope.gitItems = res.data;
		for (let i = 0; i < $scope.gitItems.length; i++)
			$scope.gitItems[i].content = $sce.trustAsHtml($scope.gitItems[i].content);
	});

	$scope.otherItems = [];
	
	$http.get("static/json/otherProjects.json").then(function(res){
		$scope.otherItems = res.data;
		for (let i = 0; i < $scope.otherItems.length; i++)
			$scope.otherItems[i].content = $sce.trustAsHtml($scope.otherItems[i].content);
	});
});