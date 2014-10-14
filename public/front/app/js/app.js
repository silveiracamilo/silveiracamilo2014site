'use strict';

var SC, ngRouteUrl = "//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.js", apiMapUrls = {};

apiMapUrls['/'] = 'home';
apiMapUrls['/trabalhos'] = 'works';
apiMapUrls['/trabalho/:path'] = 'work/:path';
apiMapUrls['/sobre'] = 'about';
apiMapUrls['/servicos'] = 'services';

InitLoader(document.getElementById('loader'), document.getElementById('bar'), 
		   ["/front/app/js/libs/jquery-1.7.2.min.js",		    
		    "//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js",
		    "//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js",		    
		    "//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-sanitize.min.js",
		    /*"//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-touch.min.js",
		    "/front/app/js/libs/angular-carousel.min.js",*/
		    "/front/app/js/libs/bootstrap-carousel.js",
		    "/front/app/js/libs/jquery.lightbox-0.5.min.js",
		    "/front/app/js/libs/swfobject.js",
		    "/front/app/js/libs/masonry.pkgd.min.js",
		   	ngRouteUrl,		   			   	
		   	"/front/app/js/libs/processing-1.4.1.min.js",
		   	"/front/app/js/modules/fractal-clock.js",
			"/front/app/js/factories/server.js",
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
	SC = angular.module('silveiracamilo', ['ngRoute', 'ngAnimate', 'ngSanitize', 'fractalClock'/*, 'angular-carousel'*/]);

	SC.config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/', {templateUrl: '/front/app/views/home.html', controller: 'HomeCtrl', resolve:{ data:resolveData } });
		$routeProvider.when('/trabalhos', {templateUrl: '/front/app/views/works.html', controller: 'WorksCtrl', resolve:{ data:resolveData }});
		$routeProvider.when('/trabalho/:path', {templateUrl: '/front/app/views/work.html', controller: 'WorkCtrl', resolve:{ data:resolveData }});
		$routeProvider.when('/sobre', {templateUrl: '/front/app/views/about.html', controller: 'AboutCtrl', resolve:{ data:resolveData }});
		$routeProvider.when('/servicos', {templateUrl: '/front/app/views/services.html', controller: 'ServicesCtrl', resolve:{ data:resolveData }});
		$routeProvider.when('/contato', {templateUrl: '/front/app/views/contact.html', controller: 'ContactCtrl'});
		$routeProvider.otherwise({redirectTo: '/'});
	}]);

	SC.run(function($rootScope){
		$rootScope.$on("$routeChangeStart", function (event, next, current) {
	        $rootScope.loadingStatus = "active";
	    });
	    $rootScope.$on("$routeChangeSuccess", function (event, current, previous) {
	        $rootScope.loadingStatus = "";
	    });
	    $rootScope.$on("$routeChangeError", function (event, current, previous, rejection) {
	        $rootScope.loadingStatus = "";
	    });
	});
}

function startApp() {
	setTimeout(function(){
		var loader = document.getElementById('loader');
		loader.style.display =  'none';

		var root = document.getElementById('root');
		root.style.display =  'block';
		root.style.transition = 'all 1s linear';
	    root.style.opacity =  '1';	
	}, 1000);	
}

function resolveData($q, Server, $route){
	var r = $route.current.$$route.originalPath, deferred = $q.defer(), url = getUrlApi(r), path = $route.current.params.path;

	if(url.indexOf(":path")>-1 && path)
		url = url.replace(":path", path)

	Server.getApi(url).success(function(data){
		log(data);		
		deferred.resolve(data);
	}).error(function(data){
		deferred.reject("Oopss!! Algum problema ocorreu, tente novamente mais tarde!");
	});	

	return deferred.promise;
}

function getUrlApi(route){
	return apiMapUrls[route];
}

function log(value){
	if(console.log) console.log(value);
}