'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the silveiracamilo
 */

SC.controller('ContactCtrl', ['$scope', 'Server', function ($scope, Server) {
	log("ContactCtrl");

	$scope.contact = {};
	$scope.submitted = false;
	$scope.sendSuccess = false;
	$scope.sendError = false;
	$scope.sendLabel = "Enviar";

	$scope.sendContact = function(){
		this.submitted = true;
		this.sendSuccess = false;
		this.sendError = false;
		if(this.contactForm.$valid) {
			this.sendLabel = "Enviando...";
			Server.postApi("sendContact", this.contact).success(function(data){
				$scope.sendLabel = "Enviar";
				$scope.submitted = false;

				if(data.success) {
					$scope.contact = {};
					$scope.contactForm.$setPristine();
					$scope.sendSuccess = true;	
				} else {
					$scope.sendError = true;
				}		

			}).error(function(data){
				$scope.sendLabel = "Enviar";
				$scope.submitted = false;				
				$scope.sendError = true;
			});
		}
	}

	$scope.isValidate = function (input){
		if(this.submitted && input.$invalid)
			return false;

		return true;
	}
}]);