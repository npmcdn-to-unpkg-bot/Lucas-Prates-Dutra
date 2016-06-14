angular.module("trainingCenter").config(function ($routeProvider){
    $routeProvider.when("/home", {
        templateUrl: "view/home.html",
        controller: "certifiedCtrl"
    });

    $routeProvider.when("/my_account", {
        templateUrl: "view/my_account.html",
       // controller: "certifiedCtrl"
    });

    $routeProvider.otherwise({redirectTo:"/home"})
});