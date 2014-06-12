@extends('admin.layouts.scaffold')

@section('main')

{{ Form::open(array('class'=>'form-style', 'route' => 'admin.work_types.store')) }}
	<h2>Create Work_type</h2>

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}

	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


