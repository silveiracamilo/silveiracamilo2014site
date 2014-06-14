@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($work_picture, array('class'=>'form-style', 'files'=>'true', 'method' => 'PATCH', 'route' => array('admin.work_pictures.update', $work_picture->id))) }}
	
    <h2>Edit Work_picture</h2>

    {{ Form::label('work_id', 'Work_id:') }}
    {{ Form::input('number', 'work_id') }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('pictureN', 'Picture:') }}
    {{ Form::file('pictureN') }}

    {{ Form::hidden('picture') }}

    </br></br>
	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.work_pictures.show', 'Cancel', $work_picture->id, array('class' => 'btn')) }}

{{ Form::close() }}

@stop
