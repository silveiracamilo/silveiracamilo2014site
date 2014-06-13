@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
	</ul>
@endif


{{ Form::open(array('class'=>'form-style', 'route' => 'admin.homes.store')) }}

	<h2>Create Home</h2>
	
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::text('description') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
	
{{ Form::close() }}

@stop


