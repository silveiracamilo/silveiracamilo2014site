@extends('admin/layouts.scaffold')

@section('main')

<script src="/assets/js/swfobject.js"></script>

<h1>Show Work</h1>

<p>{{ link_to_route('admin.works.index', 'Return to all works') }}</p>
<div style="background-color:#DDD; padding:20px 20px 20px 20px;">
	
	<h4>Work type</h4>
	{{{ $work->work_type()->name }}}
	</br></br>
	<h4>Title</h4>
	{{{ $work->title }}}
	</br></br>
	<h4>Description</h4>
	{{{ $work->description }}}
	</br></br>
	<h4>Date</h4>
	{{{ $work->date }}}
	</br></br>
	<h4>Technologies</h4>
	{{{ $work->technologies }}}
	</br></br>
	<h4>Produced_in</h4>
	{{{ $work->produced_in }}}
	</br></br>
	<h4>Produced_link</h4>
	{{{ $work->produced_link }}}
	</br></br>
	<h4>Link</h4>
	{{{ $work->link }}}
	</br></br>
	<h4>Path</h4>
	{{{ $work->path }}}
	</br></br>	
	<h4>Thumb</h4>
	{{{ $work->thumb }}}
	</br>
	<img src="{{{ $work->thumb }}}"/>
	</br></br>
	<h4>Swf</h4>
	{{{ $work->swf }}}
	@if ($work->swf)
	</br>	
	<div id="flashcontent"></div>
	<script type="text/javascript">
		var pathSWF 	= "{{{ $work->swf }}}";
		var flashvars 		= {};
		var attributes 		= {};
		var params 		= {};
		var version		= "9";

		params.allowscriptaccess 		= "always";
		params.menu 					= "false";
		params.scale 					= "noscale";

		if (swfobject.hasFlashPlayerVersion(version)) {
		  swfobject.embedSWF(pathSWF, "flashcontent", "{{{ $work->swf_width }}}", "{{{ $work->swf_height }}}", version, false, flashvars, params, attributes);
		} else {
		  document.getElementById("flashcontent").innerHTML = 'Para voce visualizar este trabalho voce precisa da versao mais recente do Flash Player. Faca o download abaixo.<br><a href="http://get.adobe.com/br/flashplayer/" alt="Download Flash Player" title="Download Flash Player" target="_blank"><img src="http://www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png"></a>';
		}
	</script>
	@endif
	</br></br>
	<h4>Video</h4>
	{{{ $work->video }}}
	@if ($work->video)
	<video controls>
		<source src="{{{ $work->video }}}" type="video/mp4">
	</video>
	@endif
	</br></br>
	<h4>Swf_width</h4>
	{{{ $work->swf_width }}}
	</br></br>
	<h4>Swf_height</h4>
	{{{ $work->swf_height }}}

	</br></br>

	{{ link_to_route('admin.works.edit', 'Edit', array($work->id), array('class' => 'btn btn-info', 'style'=>'float:left;margin-right:20px;')) }}    
	{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.works.destroy', $work->id), 'style'=>'width:80px;float:left;')) }}
	    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

	</br></br>

	@include('admin/works.pictures')

</div>

@stop
