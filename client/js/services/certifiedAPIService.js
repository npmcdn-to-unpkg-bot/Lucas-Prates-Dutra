angular.module("trainingCenter").factory("certifiedAPI", function ($http, config){
	var _getCertifieds = function () {
		return $http.get(config.baseUrl + "/certified/tittle=");
	};

	return {
		getCertifieds: _getCertifieds
	};
	
})