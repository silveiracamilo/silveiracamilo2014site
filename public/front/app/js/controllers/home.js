'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:HomeCtrl
 * @description
 * # HomeCtrl
 * Controller of the silveiracamilo
 */


var HomeCtrl = SC.controller('HomeCtrl', ['$scope', 'data', function ($scope, data) {
	log("HomeCtrl");

	$scope.home = data.home;
	$scope.works = data.works;	 	
}]);