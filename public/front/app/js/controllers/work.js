'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:WorkCtrl
 * @description
 * # WorkCtrl
 * Controller of the silveiracamilo
 */
SC.controller('WorkCtrl', ['$scope', 'Server', '$routeParams', function ($scope, server, $routeParams) {
	log("WorkCtrl:"+$routeParams.path);

	server.getApi('work/'+$routeParams.path).
	success(function(data){
		log(data);
		$scope.work = data.work;
		$scope.work_pictures = data.work_pictures;
	}).
	error(function(data){
		log("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
	});
}]);