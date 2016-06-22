angular.module("trainingCenter").factory("topicsAPI", function($http, config){

	var _getTopic = function (cod) {
		return $http.get(config.baseUrl + "/topic/?cod_certified=" + cod);
	};

	return {
		getTopic: _getTopic
	};
})