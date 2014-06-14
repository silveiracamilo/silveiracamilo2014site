@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($service, array('class'=>'form-style', 'files'=>true, 'method' => 'PATCH', 'route' => array('admin.services.update', $service->id))) }}
	<h2>Edit Service</h2>

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, array('style'=>'width:100%;')) }}

    {{ Form::label('imageN', 'Image:') }}
    {{ Form::file('imageN') }}

    {{ Form::hidden('image') }}

    </br></br>
    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@stop
