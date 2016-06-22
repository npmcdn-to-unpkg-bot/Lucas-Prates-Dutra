angular.module("trainingCenter").controller("alternativesCtrl", function ($scope, $routeParams, alternative){
            $scope.app = "Training Center";

            $scope.alternatices = alternative.data;
});