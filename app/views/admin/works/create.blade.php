@extends('admin/layouts.scaffold')

@section('main')



{{ Form::open(array('class'=>'form-style', 'files'=>true, 'route' => 'admin.works.store')) }}
    <h2>Create Work</h2>
	
    {{ Form::label('work_type_id', 'Work Type Id:') }}
    {{ Form::select('Work Type Id', $selectWorkTypes) }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title') }}

    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}

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

    {{ Form::label('video', 'Video:') }}
    {{ Form::file('video') }}

    {{ Form::label('thumb', 'Thumb:') }}
    {{ Form::file('thumb') }}

    {{ Form::label('swf', 'Swf:') }}
    {{ Form::file('swf') }}

    {{ Form::label('swf_width', 'Swf_width:') }}
    {{ Form::input('number', 'swf_width') }}

    {{ Form::label('swf_height', 'Swf_height:') }}
    {{ Form::input('number', 'swf_height') }}

    </br></br>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


