app.controller("cBlogDash", function($scope, $http){
	document.title = "Blog | Dashboard";

	$scope.tab = "feed";

	$scope.postId = -1;

	$scope.action = "";

	$scope.edit = {"title" : "", "content" : ""};

	$scope.doAction = function(x, id) {
		$scope.postId = id;
		let t = {
			"delete" : {"action" : "static/php/deletePost.php", "modal" : "blog-delete", "func" : ()=>{}},
			"edit" : {"action" : "static/php/editPost.php", "modal" : "blog-edit", "func" : ()=>{$http.get("static/php/getPost.php?id=" + $scope.postId).then(function(response){
				let x = response.data;
				$scope.edit.title = x.title;
				$scope.edit.content = x.content;
			})}}
		};
		if (t[x] != null) {
			$scope.formAction = t[x]["action"];
			$scope.showModal(t[x]["modal"]);
			t[x]["func"]();
			let editor = angular.element(document.getElementById("editor"));
			console.log(editor);
			new Quill(editor, {theme : 'snow'});
		}
	};
});
