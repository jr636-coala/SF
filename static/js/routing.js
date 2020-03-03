app.config(function($routeProvider){
    $routeProvider.when("/maths", {
        templateUrl : "static/page/maths.php",
        controller  : "cMaths"
    }).when("/computing", {
        templateUrl : "static/page/computing.php",
        controller  : "cComputing"
    }).when("/theory", {
        templateUrl : "static/page/theory.php",
        controller : "cTheory"
    }).when("/alevel", {
        templateUrl : "static/page/alevel.php",
        controller  : "cALevel"
    }).when("/projects", {
        templateUrl : "static/page/projects.php",
        controller : "cProjects"
    }).when("/hobbies", {
        templateUrl : "static/page/hobbies.php",
        controller  : "cHobbies"
    }).when("/twisty", {
        templateUrl : "static/page/twisty.php",
        controller : "cTwisty"
    }).when("/contact", {
        templateUrl : "static/page/contact.php",
        controller  : "cContact"
    }).when("/todo", {
        templateUrl : "static/page/todo.php",
        controller	: "cTodo"
    }).when("/blog/dash", {
        templateUrl : "static/page/blog/blog-dashboard.php",
        controller : "cBlogDash"
    }).when("/blog/:num/:param", {
        templateUrl : function(params){return "static/page/blog/blog.php?num=" + params.num + "&param=" + params.param},
        controller : "cBlog"
    }).when("/blog/:num/", {
        templateUrl : function(params){return "static/page/blog/blog.php?num=" + params.num},
        controller : "cBlog"
    }).when("/blog", {
        templateUrl : "static/page/blog/blog.php",
        controller : "cBlog"
    }).when("/jos", {
        templateUrl : "static/page/jos.php",
        controller : "cJos"
    }).when("/jos/man", {
        templateUrl : "static/page/jos/man/index.html",
        controller : "cJos"
    }).when("/jos/man/:page", {
        templateUrl : function(params){return "static/page/jos/man/" + params.page + ".html"},
        controller : "cJos"
    }).otherwise({
        templateUrl : "static/page/home.php",
        controller  : "cHome"
    });
});
