@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('class'=>'form-style', 'files'=>true, 'route' => 'admin.services.store')) }}
	<h2>Create Service</h2>

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, array('style'=>'width:100%;')) }}

    {{ Form::label('image', 'Image:') }}
    {{ Form::file('image') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@stop


