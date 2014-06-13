@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
	</ul>
@endif

{{ Form::model($home, array('class'=>'form-style', 'method' => 'PATCH', 'route' => array('admin.homes.update', $home->id))) }}
	<h2>Edit Home</h2>
	
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::text('description') }}

    </br>
	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.homes.index', 'Cancel', null, array('class' => 'btn')) }}
		
{{ Form::close() }}

@stop
