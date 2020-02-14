app.controller("cTwisty", function($scope, $sce, $http){
	document.title = "Puzzles";
	$scope.items = [];
	
	$http.get("static/json/puzzles.json").then(function(res){
		$scope.items = res.data;
		for (let i = 0; i < $scope.items.length; i++)
			$scope.items[i].content = $sce.trustAsHtml($scope.items[i].content);
	});
});