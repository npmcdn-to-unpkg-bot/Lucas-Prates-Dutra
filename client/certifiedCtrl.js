angular.module("trainingCenter", []);
angular.module("trainingCenter").controler("certifiedCtrl", function ($scope, $http){
	$scope.certified = [];
	var carregarCertificados = function (){
		$http.get("http://localhost/Projetos/Request/certified/");
			console.log(data);
	}

	carregarCertificados();
}