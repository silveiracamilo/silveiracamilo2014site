@extends('admin/layouts.scaffold')

@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error" style="color:#FFF;">:message</li>')) }}
    </ul>
@endif

{{ Form::model($work, array('class'=>'form-style', 'files'=>true, 'method' => 'PATCH', 'route' => array('admin.works.update', $work->id))) }}
    
    <h2>Edit Work</h2>    

    {{ Form::label('work_type_id', 'Work Type:') }}
    {{ Form::select('work_type_id', $selectWorkTypes) }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, array('style'=>'width:100%;')) }}

    {{ Form::label('date', 'Date:') }}
    {{ Form::text('date') }}

    {{ Form::label('technologies', 'Technologies:') }}
    {{ Form::text('technologies') }}

    {{ Form::label('produced_in', 'Produced_in:') }}
    {{ Form::text('produced_in') }}

    {{ Form::label('produced_link', 'Produced_link:') }}
    {{ Form::text('produced_link') }}

    {{ Form::label('link', 'Link:') }}
    {{ Form::text('link') }}

    {{ Form::label('path', 'Path:') }}
    {{ Form::text('path') }}

    {{ Form::label('thumbN', 'Thumb:') }}
    {{ Form::file('thumbN') }}

    {{ Form::label('swfN', 'Swf:') }}
    {{ Form::file('swfN') }}

    {{ Form::label('videoN', 'Video:') }}
    {{ Form::file('videoN') }}

    {{ Form::label('swf_width', 'Swf_width:') }}
    {{ Form::input('number', 'swf_width') }}

    {{ Form::label('swf_height', 'Swf_height:') }}
    {{ Form::input('number', 'swf_height') }}

    {{ Form::hidden('thumb') }}
    {{ Form::hidden('swf') }}
    {{ Form::hidden('video') }}
	
    </br></br>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	{{ link_to_route('admin.works.show', 'Cancel', $work->id, array('class' => 'btn')) }}
    
{{ Form::close() }}

@include('admin/works.pictures')

@stop
