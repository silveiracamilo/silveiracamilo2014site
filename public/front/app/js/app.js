'use strict';

var SC, ngRouteUrl = "//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.js";
InitLoader(document.getElementById('loader'), document.getElementById('bar'), 
		   ["//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js",
		   	ngRouteUrl,
			"/front/app/js/factory/server.js",
			"/front/app/js/controllers/home.js",
			"/front/app/js/controllers/works.js",
			"/front/app/js/controllers/work.js",
			"/front/app/js/controllers/about.js",
			"/front/app/js/controllers/services.js",
			"/front/app/js/controllers/contact.js",
			"/api/home"], 
		   ngRouteUrl,
		   startNgApp,
		   startApp);

function startNgApp(){
	SC = angular.module('silveiracamilo', ['ngRoute']);

	SC.config(['$routeProvider', function($routeProvider) {
	  $routeProvider.when('/', {templateUrl: '/front/app/views/home.html', controller: 'HomeCtrl'});
	  $routeProvider.when('/trabalhos', {templateUrl: '/front/app/views/works.html', controller: 'WorksCtrl'});
	  $routeProvider.when('/trabalho/:path', {templateUrl: '/front/app/views/work.html', controller: 'WorkCtrl'});
	  $routeProvider.when('/sobre', {templateUrl: '/front/app/views/about.html', controller: 'AboutCtrl'});
	  $routeProvider.when('/servicos', {templateUrl: '/front/app/views/services.html', controller: 'ServicesCtrl'});
	  $routeProvider.when('/contato', {templateUrl: '/front/app/views/contact.html', controller: 'ContactCtrl'});
	  $routeProvider.otherwise({redirectTo: '/'});
	}]);
}

function startApp() {
	setTimeout(function(){
		var root = document.getElementById('root');
		root.style.transition = 'all 1s linear';
	    root.style.opacity =  '1';	
	}, 1000);	
}

function log(value){
	console.log(value);
}