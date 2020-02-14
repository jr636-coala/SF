app.controller("cTheory", function($scope, $sce, $http){
	document.title = "Theory";
	$scope.theoryItems = [];
	
	$http.get("static/json/theory.json").then(function(res){
		$scope.theoryItems = res.data;
		for (let i = 0; i < $scope.theoryItems.length; i++)
			$scope.theoryItems[i].content = $sce.trustAsHtml($scope.theoryItems[i].content);
	});
});