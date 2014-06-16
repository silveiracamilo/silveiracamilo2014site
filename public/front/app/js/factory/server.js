/**
 * @author Camilo da Silveira
 * @name silveiracamilo.factory:Server
 * @description
 * # Server
 * Factory of the silveiracamilo
 */

//function initServer(){
	SC.factory('Server', ['$http',function ($http) {
		return {
			getApi: function (name) {
				return $http.get('/api/'+name);
			}
		};
	}]);
//}