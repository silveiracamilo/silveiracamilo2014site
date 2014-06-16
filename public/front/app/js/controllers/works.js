'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:WorksCtrl
 * @description
 * # WorksCtrl
 * Controller of the silveiracamilo
 */
//function initWorksCtrl(){
	SC.controller('WorksCtrl', ['$scope', 'Server', function ($scope, server) {
		log("WorksCtrl");

		server.getApi('works').
		success(function(data){
			log(data);
			$scope.works = data.works;
			$scope.work_types = data.work_types;
		}).
		error(function(data){
			log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
		});
	}]);
//}