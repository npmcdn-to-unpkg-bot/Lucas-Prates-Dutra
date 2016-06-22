angular.module("trainingCenter").controller("resultCtrl", function ($scope, $routeParams, result, resultsAPI, answer){
            $scope.app = "Training Center";

            $scope.results = result.data;
            $scope.answers = answer.data;

            $scope.apagarRespostaUsuario = function() {
            	resultsAPI.deleteUserAnswer();
            };
});