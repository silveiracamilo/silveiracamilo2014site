'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:HomeCtrl
 * @description
 * # HomeCtrl
 * Controller of the silveiracamilo
 */


var HomeCtrl = SC.controller('HomeCtrl', ['$scope', 'data', function ($scope, data) {
	log("HomeCtrl");

	$scope.home = data.home;
	$scope.works = data.works;	 	
}]);

SC.directive("worksGrid", function(){
	return {
		restrict:"E",
		templateUrl:"/front/app/views/works-grid.html",
		link:function(scope, element, attrs){
			element.masonry({
						      itemSelector: '.hero-item',
						      columnWidth: '.grid-sizer'
						    });
		}
	};
});