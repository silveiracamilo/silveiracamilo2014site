'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:ServicesCtrl
 * @description
 * # ServicesCtrl
 * Controller of the silveiracamilo
 */

//function initServicesCtrl(){
	SC.controller('ServicesCtrl', ['$scope', 'Server', function ($scope, server) {
		log("ServicesCtrl");

		server.getApi('services').
		success(function(data){
			log(data);
			$scope.services = data;
		}).
		error(function(data){
			log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
		});
	}]);
//}