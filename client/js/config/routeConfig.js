angular.module("trainingCenter").config(function ($routeProvider){
    
    $routeProvider.when("/home", {
        templateUrl: "view/home.html",
        controller: "certifiedCtrl",
        resolve: {
            certifieds: function(certifiedAPI) {
                return certifiedAPI.getCertifieds();
            }
        }

    });

    $routeProvider.when("/my_account", {
        templateUrl: "view/my_account.html"
       // controller: "certifiedCtrl"
    });

    $routeProvider.when("/topic/:cod", {
        templateUrl: "view/topic.html",
        controller: "topicCtrl",
        resolve: {
            topic: function(topicsAPI, $route) {
                return topicsAPI.getTopic($route.current.params.cod)
            }
        }
    });

    $routeProvider.when("/question/:cod", {
        templateUrl: "view/question.html",
        controller: "questionCtrl", 
        resolve: {
            question: function(questionsAPI, $route) {
                return questionsAPI.getQuestion($route.current.params.cod)
            }
        }
    });

    $routeProvider.otherwise({redirectTo:"/home"})
});