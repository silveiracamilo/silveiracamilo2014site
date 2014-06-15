'use strict';


// Declare app level module which depends on filters, and services
var SC = angular.module('silveiracamilo', ['ngRoute']);

SC.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {templateUrl: '/front/app/views/home.html', controller: 'HomeCtrl'});
  $routeProvider.when('/trabalhos', {templateUrl: '/front/app/views/works.html', controller: 'WorksCtrl'});
  $routeProvider.when('/trabalho/:path', {templateUrl: '/front/app/views/work.html', controller: 'WorkCtrl'});
  $routeProvider.when('/sobre', {templateUrl: '/front/app/views/about.html', controller: 'AboutCtrl'});
  $routeProvider.when('/servicos', {templateUrl: '/front/app/views/services.html', controller: 'ServicesCtrl'});
  $routeProvider.when('/contato', {templateUrl: '/front/app/views/contact.html', controller: 'ContactCtrl'});
  $routeProvider.otherwise({redirectTo: '/'});
}]);

function log(value){
	console.log(value);
}