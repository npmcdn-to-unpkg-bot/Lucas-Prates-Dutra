angular.module("trainingCenter").controller("questionCtrl", function ($scope, $routeParams, question){
            $scope.app = "Training Center";

            $scope.questions = question.data;
});