@extends('admin/layouts.scaffold')

@section('main')

<h1>Edit Work_picture</h1>
{{ Form::model($work_picture, array('method' => 'PATCH', 'route' => array('admin.work_pictures.update', $work_picture->id))) }}
	<ul>
        <li>
            {{ Form::label('work_id', 'Work_id:') }}
            {{ Form::input('number', 'work_id') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('picture', 'Picture:') }}
            {{ Form::text('picture') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.work_pictures.show', 'Cancel', $work_picture->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
