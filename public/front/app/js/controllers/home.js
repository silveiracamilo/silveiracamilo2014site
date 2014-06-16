'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:HomeCtrl
 * @description
 * # HomeCtrl
 * Controller of the silveiracamilo
 */

//function initHomeCtrl(){
	SC.controller('HomeCtrl', ['$scope', 'Server', function ($scope, server) {
		log("HomeCtrl");

		server.getApi('home').
		success(function(data){
			log(data);
			$scope.home = data.home;
			$scope.works = data.works;
		}).
		error(function(data){
			log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
		});
	}]);
//}