angular.module("trainingCenter").controller("questionCtrl", function ($scope, $routeParams, question, questionsAPI){
            
            $scope.app = "Training Center";
            $scope.questions = question.data;


            $scope.alternativasUsuario = function(cod) {
            	questionsAPI.postAlternative(cod);
            };
           
});