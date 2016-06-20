angular.module("trainingCenter").controller("topicCtrl", function ($scope, $routeParams, topic){
            $scope.app = "Training Center";

            $scope.topics = topic.data;
});