/**
 * @author Camilo da Silveira
 * @name silveiracamilo.factory:Server
 * @description
 * # Server
 * Factory of the silveiracamilo
 */

var URL_API = '/api/';
SC.factory('Server', ['$http',function ($http) {
	return {
		getApi: function (name) {
			return $http.get(URL_API+name);
		},
		postApi: function (name, data) {
			return $http.post(URL_API+name, data);
		}
	};
}]);