@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($about, array('class'=>'form-style', 'files'=>true, 'method' => 'PATCH', 'route' => array('admin.abouts.update', $about->id))) }}
	<h2>Edit About</h2>
    
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, array('style'=>'width:100%;')) }}

    {{ Form::label('pictureN', 'Picture:') }}
    {{ Form::file('pictureN') }}

    {{ Form::hidden('picture') }}
	
    </br></br>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.abouts.index', 'Cancel', null, array('class' => 'btn')) }}
{{ Form::close() }}

@stop
