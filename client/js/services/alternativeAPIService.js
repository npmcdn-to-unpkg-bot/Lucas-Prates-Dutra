angular.module("trainingCenter").factory("alternativesAPI", function($http, config){

	var _getAlternatives = function (cod_question) {
		return $http.get(config.baseUrl + "/alternative/?cod_question=" + cod_question);
	};

	return {
		getAlternatives: _getAlternatives
	};
	
})