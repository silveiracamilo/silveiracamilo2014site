@extends('admin/layouts.scaffold')

@section('main')

<h1>Create Work_picture</h1>

{{ Form::open(array('route' => 'admin.work_pictures.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


