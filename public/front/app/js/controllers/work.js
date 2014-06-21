'use strict';

/**
 * @author Camilo da Silveira
 * @name silveiracamilo.controller:WorkCtrl
 * @description
 * # WorkCtrl
 * Controller of the silveiracamilo
 */
SC.controller('WorkCtrl', ['$scope', 'data', function ($scope, data) {
	log("WorkCtrl");

	$scope.work = data.work;
	$scope.work_pictures = data.work_pictures;	
}]);

SC.directive("workCarousel", function(){
	return{
		restrict:"A",
		link:function(scope, element, attrs){
			log('workCarousel.link');
			$('#myCarousel .carousel-inner a').lightBox();
    		$('#myCarousel').carousel();
		}
	};
});

SC.directive('workFlash', function(){
	return{
		restrict:"A",
		link:function(scope, element, attrs){
			log('workFlash.link');
    		var pathSWF   = scope.work.swf;
	        var flashvars     = {};
	        var attributes    = {style:"width:"+scope.work.swf_width+"px;margin-left:"+((730*.5) - (scope.work.swf_width*.5))+"px; margin-top:25px;"};
	        var params    = {};
	        var version   = "10";
	        log('attributes');
	        log(attributes);

	        params.allowscriptaccess    = "always";
	        params.menu           = "false";
	        params.scale          = "noscale";

	        if (swfobject.hasFlashPlayerVersion(version)) {
	          swfobject.embedSWF(pathSWF, "flashcontent", scope.work.swf_width, scope.work.swf_height, version, false, flashvars, params, attributes);
	        } else {
	          element.innerHTML = 'Para voce visualizar este trabalho voce precisa da versao mais recente do Flash Player. Faca o download abaixo.<br><a href="http://get.adobe.com/br/flashplayer/" alt="Download Flash Player" title="Download Flash Player" target="_blank"><img src="http://www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png"></a>';
	        }
		}
	};
});