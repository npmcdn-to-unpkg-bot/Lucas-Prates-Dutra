angular.module("trainingCenter").factory("questionsAPI", function($http, config){

	var _getQuestion = function (cod) {
		return $http.get(config.baseUrl + "/question/?cod_topic=" + cod);
	};

	return {
		getQuestion: _getQuestion
	};
	
})