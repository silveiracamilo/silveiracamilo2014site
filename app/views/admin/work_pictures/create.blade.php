@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('class'=>'form-style', 'files'=>'true', 'route' => 'admin.work_pictures.store')) }}
    
    <h2>Create Work_picture</h2>

    {{ Form::label('work_id', 'Work_id:') }}
    {{ Form::text('work_id', $work_id) }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('picture', 'Picture:') }}
    {{ Form::file('picture') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}

{{ Form::close() }}

@stop


