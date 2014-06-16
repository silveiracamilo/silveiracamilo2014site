'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:ServicesCtrl
 * @description
 * # ServicesCtrl
 * Controller of the silveiracamilo
 */


SC.controller('ServicesCtrl', ['$scope', 'data', function ($scope, data) {
	log("ServicesCtrl");

	$scope.services = data;

	/*server.getApi('services').
	success(function(data){
		log(data);
		$scope.services = data;
	}).
	error(function(data){
		log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
	});*/
}]);