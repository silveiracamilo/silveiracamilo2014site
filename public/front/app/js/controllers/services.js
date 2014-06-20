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

}]);