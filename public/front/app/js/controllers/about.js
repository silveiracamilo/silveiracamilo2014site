'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the silveiracamilo
 */
SC.controller('AboutCtrl',['$scope', 'Server', function ($scope, server) {
	log("AboutCtrl");
	
	server.getApi('about').
	success(function(data){
		log(data);
		$scope.about = data;
	}).
	error(function(data){
		log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
	});
	
  }]);
