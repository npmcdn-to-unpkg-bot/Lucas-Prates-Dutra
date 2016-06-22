angular.module("trainingCenter").factory("resultsAPI", function($http, config){

	var _getResults = function () {
		return $http.get(config.baseUrl + "/user_answer/?cod_user=1");
	};

	var _deleteUserAnswer = function () {
		return $http.delete(config.baseUrl + "/user_answer/?cod_user=1");
	};

	var _getAnswer = function () {
		return $http.get(config.baseUrl + "/answer/?=");
	};

	return {
		getResults: _getResults,
		deleteUserAnswer: _deleteUserAnswer,
		getAnswer:_getAnswer
	};
})