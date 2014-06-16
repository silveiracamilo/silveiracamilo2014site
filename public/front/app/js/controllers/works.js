'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:WorksCtrl
 * @description
 * # WorksCtrl
 * Controller of the silveiracamilo
 */

SC.controller('WorksCtrl', ['$scope', 'data', function ($scope, data) {
	log("WorksCtrl");

	$scope.works = data.works;
	$scope.work_types = data.work_types;

	/*
	server.getApi('works').
	success(function(data){
		log(data);
		$scope.works = data.works;
		$scope.work_types = data.work_types;
	}).
	error(function(data){
		log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
	});*/
}]);