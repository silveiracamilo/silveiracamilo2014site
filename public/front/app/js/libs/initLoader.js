function InitLoader(loader, bar, assets, ngUrl, loadNgCallBack, initCallBack){
	var loadPercent = 0, datas = {}, assetsCount = 0, totalAssets = assets.length - 1;;
	
	function loadAssets(){
		function ajaxComplete(){
			loadPercent =  Math.floor( (assetsCount / (totalAssets)) * 100 )/2;
			if(assetsCount < totalAssets){
				assetsCount++;
				loadNext();
			}else{
				loadAssetsData();
			}
			showPercent(loadPercent);
		}

		function loadNext () {
			var item = assets[assetsCount];

			if(item.indexOf(".js")>-1){
				var script = document.createElement('script');
				script.onload = function() {
					if(item==ngUrl) 
						loadNgCallBack.call();

					ajaxComplete();
				};
				script.src = item;
				document.getElementsByTagName('head')[0].appendChild(script);
			}else{
				var xhr = new XMLHttpRequest();
			    xhr.onreadystatechange = function() {
			        if (xhr.readyState === 4) {
			            if (xhr.status === 200) {
			            	datas[item] = JSON.parse(xhr.responseText) || {};
							ajaxComplete();
			            } else {
			               console.log("error load:"+item);
			            }
			        }
			    };
			    xhr.open("GET", item, true);
			    xhr.send();
			}
		}
		loadNext();
	}

	function loadAssetsData(){
		var dataAssets = [], assetCount = 0, percent, works = datas['/api/home'].works;

		for(var work in works){
			dataAssets.push(works[work].thumb);
		}

		var assetTotal = dataAssets.length - 1

		function loadAsset(){
			var path = dataAssets[assetCount], img = new Image();
			img.onload = loadAssetComplete;1
			img.src = path;
		}

		function loadAssetComplete(){
			loadPercent =  (Math.floor( (assetCount / (assetTotal)) * 100 )/2) + 50;
			showPercent(loadPercent);
			if(assetCount < assetTotal){
				assetCount++;
				loadAsset();
			}else{
				hideLoader();
			}			
		}	

		if(assetTotal > 0)
			loadAsset();	
		else
			initCallBack.call();
	}

	function showPercent(n){
		bar.style.width = n+"%";
	}

	function hideLoader(){
		setTimeout(function(){
			loader.className = 'hide-opacity';	

			initCallBack.call();
		}, 1000);	
	} 

	loadAssets();
}