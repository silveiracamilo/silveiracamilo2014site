@extends('admin/layouts.scaffold')

@section('main')



{{ Form::open(array('class'=>'form-style', 'route' => 'admin.abouts.store', 'files'=>true)) }}
    <h2>Create About</h2>

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}

    {{ Form::label('picture', 'Picture:') }}
    {{ Form::file('picture') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


