angular.module("trainingCenter").controller("certifiedCtrl", function ($scope, certifieds){
            $scope.app = "Training Center";

            $scope.certifieds = certifieds.data;

            /*$http({
                method : "GET",
                url : "http://localhost/Projetos/Request/certified/?tittle="
            }).then( function mySuccess(response){
                $scope.certifieds = response.data;
            }, function myError(response){
                $scope.certifieds = response.statusText; 
            })*/
            
        })