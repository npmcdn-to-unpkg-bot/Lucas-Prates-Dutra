angular.module("trainingCenter").controller("certifiedCtrl", function ($scope, $http){
            $scope.app = "Training Center";

            $http({
                method : "GET",
                url : "http://localhost/Projetos/Request/certified/?tittle="
            }).then( function mySuccess(response){
                $scope.certifieds = response.data;
            }, function myError(response){
                $scope.certifieds = response.statusText; 
            })
            
        })