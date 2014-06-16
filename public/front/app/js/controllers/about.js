'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the silveiracamilo
 */


SC.controller('AboutCtrl',['$scope', 'data', function ($scope, data) {
	log("AboutCtrl");
	
	$scope.about = data;
}]);