angular.module("trainingCenter").factory("questionsAPI", function($http, config){

	var _getQuestion = function (cod) {
		return $http.get(config.baseUrl + "/question/?cod_topic=" + cod);
	};

	var _postAlternative = function (cod) {
		return $http.post(config.baseUrl + "/user_answer/?cod_user=1&cod_alternatives=" + cod);
	};

	return {
		getQuestion: _getQuestion,
		postAlternative: _postAlternative
	};
	
})