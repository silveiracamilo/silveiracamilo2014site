@extends('admin/layouts.scaffold')

@section('main')

{{ Form::model($about, array('class'=>'form-style', 'files'=>true, 'method' => 'PATCH', 'route' => array('admin.abouts.update', $about->id))) }}
	<h2>Edit About</h2>
    
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}

    {{ Form::label('picture', 'Picture:') }}
    {{ Form::file('picture') }}
	
    </br></br>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.abouts.index', 'Cancel', null, array('class' => 'btn')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
